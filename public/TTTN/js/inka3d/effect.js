var inka3dEffect = function()
{
    'use strict';
	var effect = {};
	
	// base class for effect
	effect.Effect = function()
	{
		// geometry
		this.x = 0;
		this.y = 0;
		this.width = 0;
		this.height = 0;	

		// output framebuffer
		this.output = null;

		// returns true if effect needs a depth buffer
		this.needsDepth = function()
		{
			return false;
		}

		// get output framebuffer (creates one on first call)
		this.getOutput = function()
		{
			if (this.output == null)
				this.output = new effect.Framebuffer(this.needsDepth());
			return this.output;
		};
	};

	// clear color and depth
	// options, e.g. {color: [0,0,0,1]}
	//   color: clear color 
	effect.ClearColorDepth = function(options)
	{
		effect.Effect.call(this);
		
		// clear color
		this.color = options && options.color ? options.color : [0, 0, 0, 1];
				
		// resize effect
		this.resize = function(x, y, width, height)
		{
			var w = width + 0.5 | 0;
			var h = height + 0.5 | 0;
			this.x = x;
			this.y = y;
			this.width = w;
			this.height = h;
			return width / height;
		};
		
		// apply effect on given framebuffer
		this.apply = function(framebuffer, sequence)
		{
			gl.bindFramebuffer(gl.FRAMEBUFFER, framebuffer);
			gl.viewport(this.x, this.y, this.width, this.height);
			gl.clearColor(this.color[0], this.color[1], this.color[2], this.color[3]);
			gl.enable(gl.SCISSOR_TEST);
			gl.scissor(this.x, this.y, this.width, this.height);
			gl.clear(gl.COLOR_BUFFER_BIT | gl.DEPTH_BUFFER_BIT);
			gl.disable(gl.SCISSOR_TEST);
		};
	};
	
	// get color from input and clear depth
	effect.ClearDepth = function(input)
	{
		effect.Effect.call(this);
						
		// resize effect
		this.resize = function(x, y, width, height)
		{
			var aspect = input.resize(x, y, width, height);
			this.x = x;
			this.y = y;
			this.width = input.width;
			this.height = input.height;
			return aspect;
		};
		
		// apply effect on given framebuffer
		this.apply = function(framebuffer, sequence)
		{
			input.apply(framebuffer, sequence);
			gl.enable(gl.SCISSOR_TEST);
			gl.scissor(this.x, this.y, this.width, this.height);
			gl.clear(gl.DEPTH_BUFFER_BIT);
			gl.disable(gl.SCISSOR_TEST);
		};
	};

	// render a scene
	effect.Render = function(input, group, layer)
	{
		effect.Effect.call(this);
		
		// render group
		this.group = group;

		// render layer
		this.layer = layer;
		
		// view and projection matrix
		this.viewMatrix = new Float32Array(16);
		this.projectionMatrix = new Float32Array(16);
				
		// resize effect
		this.resize = function(x, y, width, height)
		{
			var aspect = input.resize(x, y, width, height);
			this.x = x;
			this.y = y;
			this.width = input.width;
			this.height = input.height;			
			return aspect;
		};

		// apply effect on given framebuffer
		this.apply = function(framebuffer, sequence)
		{
			input.apply(framebuffer, sequence);
			gl.enable(gl.DEPTH_TEST);
			this.group.render(this.viewMatrix, this.projectionMatrix, this.layer);
			gl.disable(gl.DEPTH_TEST);
		};
		
		// needs a depth buffer
		this.needsDepth = function()
		{
			return true;
		};
	};

	// render a scene without writing to z-buffer
	effect.RenderNoDepth = function(input, group, layer)
	{
		effect.Render.call(this, input, group, layer);

		this.apply = function(framebuffer, sequence)
		{
			input.apply(framebuffer, sequence);
			gl.disable(gl.DEPTH_TEST);
			this.group.render(this.viewMatrix, this.projectionMatrix, this.layer);
		};
		
		this.needsDepth = function()
		{
			return input.needsDepth();
		};
	};

	// add two inputs
	effect.Add = function(input1, input2)
	{
		effect.Effect.call(this);

		// gain for the two inputs
		this.gain1 = 1;
		this.gain2 = 1;

		this.setGain = function(gain1, gain2)
		{
			this.gain1 = gain1;
			this.gain2 = gain2;
		}

		// resize effect
		this.resize = function(x, y, width, height)
		{
			var aspect = input1.resize(0, 0, width, height);
			input2.resize(0, 0, width, height);
			this.x = x;
			this.y = y;
			fb1.resize(this.width = input1.width, this.height = input1.height);
			fb2.resize(input1.width, input1.height);
			return aspect;
		};

		// apply effect on given framebuffer
		this.apply = function(framebuffer, sequence)
		{
			// render inputs onto framebuffers
			fb1.apply(input1, sequence);
			fb2.apply(input2, sequence);
		
			// add image and blur
			gl.bindFramebuffer(gl.FRAMEBUFFER, framebuffer);
			gl.viewport(this.x, this.y, this.width, this.height);
			gl.useProgram(program);
			gl.uniform2f(gain, this.gain1, this.gain2);
			fb1.draw2(fb2);
		};

		// framebuffers
		var fb1 = input1.getOutput();
		var fb2 = input2.getOutput();
		
		// shader
		var program = effect.createShader("\
precision highp float;\
uniform sampler2D img1;\
uniform sampler2D img2;\
varying vec2 uv;\
uniform vec2 gain;\
void main(){\n\
	gl_FragColor = vec4(gain.x * texture2D(img1, uv).xyz + gain.y * texture2D(img2, uv).xyz, 1.0);\
}", "add");
		effect.setTextureIndex(program, "img1", 0);
		effect.setTextureIndex(program, "img2", 1);
		var gain = gl.getUniformLocation(program, "gain");
	};

	// fast approximate anti-aliasing (FXAA)
	effect.FXAA = function(input)
	{
		effect.Effect.call(this);
				
		// resize effect
		this.resize = function(x, y, width, height)
		{
			var aspect = input.resize(0, 0, width, height);
			this.x = x;
			this.y = y;
			fb.resize(this.width = input.width, this.height = input.height);
			return aspect;
		};

		// apply effect on given framebuffer
		this.apply = function(framebuffer, sequence)
		{
			// render input onto framebuffer
			fb.apply(input, sequence);
					
			// fxaa
			gl.bindFramebuffer(gl.FRAMEBUFFER, framebuffer);
			gl.viewport(this.x, this.y, this.width, this.height);
			gl.useProgram(program);
			gl.uniform2f(scale, 1 / this.width, 1 / this.height);
			fb.draw();
		};


		// framebuffer
		var fb = input.getOutput();
		
		// shader
		var program = effect.createShader("\
#define FXAA_REDUCE_MIN   (1.0/128.0)\n\
#define FXAA_REDUCE_MUL   (1.0/8.0)\n\
#define FXAA_SPAN_MAX     8.0\n\
precision highp float;\
uniform sampler2D img;\
varying vec2 uv;\
uniform vec2 scale;\
void main(){\
	vec3 rgbNW = texture2D(img, uv - scale).xyz;\
	vec3 rgbNE = texture2D(img, uv + vec2(1.0,-1.0) * scale).xyz;\
	vec3 rgbSW = texture2D(img, uv + vec2(-1.0,1.0) * scale).xyz;\
	vec3 rgbSE = texture2D(img, uv + scale).xyz;\
	vec3 rgbM  = texture2D(img, uv).xyz;\
	vec3 luma = vec3(0.299, 0.587, 0.114);\
	float lumaNW = dot(rgbNW, luma);\
	float lumaNE = dot(rgbNE, luma);\
	float lumaSW = dot(rgbSW, luma);\
	float lumaSE = dot(rgbSE, luma);\
	float lumaM  = dot(rgbM,  luma);\
	float lumaMin = min(lumaM, min(min(lumaNW, lumaNE), min(lumaSW, lumaSE)));\
	float lumaMax = max(lumaM, max(max(lumaNW, lumaNE), max(lumaSW, lumaSE)));\
	\
	vec2 dir = vec2(-((lumaNW + lumaNE) - (lumaSW + lumaSE)),\
		(lumaNW + lumaSW) - (lumaNE + lumaSE));\
	\
	float dirReduce = max(\
        (lumaNW + lumaNE + lumaSW + lumaSE) * (0.25 * FXAA_REDUCE_MUL),\
        FXAA_REDUCE_MIN);\
	\
	float rcpDirMin = 1.0 / (min(abs(dir.x), abs(dir.y)) + dirReduce);\
	dir = min(vec2(FXAA_SPAN_MAX, FXAA_SPAN_MAX),\
		max(vec2(-FXAA_SPAN_MAX, -FXAA_SPAN_MAX), dir * rcpDirMin)) * scale;\
	\
	vec3 rgbA = 0.5 * (\
        texture2D(img, uv + dir * (1.0/3.0 - 0.5)).xyz +\
        texture2D(img, uv + dir * (2.0/3.0 - 0.5)).xyz);\
	\
	vec3 rgbB = rgbA * 0.5 + 0.25 * (\
		texture2D(img, uv + dir * -0.5).xyz +\
        texture2D(img, uv + dir * 0.5).xyz);\
	float lumaB = dot(rgbB, luma);\
	gl_FragColor = vec4(((lumaB < lumaMin) || (lumaB > lumaMax)) ? rgbA : rgbB, 1.0);\
}", "fxaa");
		effect.setTextureIndex(program, "img", 0);
		var scale = gl.getUniformLocation(program, "scale");
	};

	// gaussian blur with 13x13 kernel
	effect.Blur13 = function(input)
	{
		effect.Effect.call(this);
		
		// resize effect
		this.resize = function(x, y, width, height)
		{
			var aspect = input.resize(0, 0, width, height);
			var w = input.width;
			var h = input.height;
			fb1.resize(w, h);
			fb2.resize(w, h);
			this.x = x;
			this.y = y;
			this.width = w;
			this.height = h;
			return aspect;
		};

		// apply effect on given framebuffer
		this.apply = function(framebuffer, sequence)
		{
			// render input onto framebuffer
			fb1.apply(input, sequence);

			// blur horizontal
			gl.bindFramebuffer(gl.FRAMEBUFFER, fb2.fb);
			gl.viewport(this.x, this.y, this.width, this.height);
			gl.useProgram(program);
			gl.uniform2f(offset, 1 / this.width, 0);
			fb1.draw();

			// blur vertical
			gl.bindFramebuffer(gl.FRAMEBUFFER, framebuffer);
			gl.useProgram(program);
			gl.uniform2f(offset, 0, 1 / this.height);
			fb2.draw();
		};


		// framebuffer
		var fb1 = input.getOutput();
		var fb2 = new effect.Framebuffer(false);
		
		// shader
		var program = effect.createShader("\
precision highp float;\
uniform sampler2D img;\
varying vec2 uv;\
uniform vec2 offset;\
void main(){\
	gl_FragColor = (texture2D(img, uv) * 20.0\
		+ texture2D(img, uv + offset * 1.3) * 15.0\
		+ texture2D(img, uv - offset * 1.3) * 15.0\
		+ texture2D(img, uv + offset * 3.41) * 6.0\
		+ texture2D(img, uv - offset * 3.41) * 6.0\
		+ texture2D(img, uv + offset * 5.48)\
		+ texture2D(img, uv - offset * 5.48)) / 64.0;\
}", "blur");
		effect.setTextureIndex(program, "img", 0);
		var offset = gl.getUniformLocation(program, "offset");
	};
	
	// downsample by 2 and apply optional color transformation
	effect.Downsample2 = function(input, code, vars)
	{
		code = code || "";
		vars = vars || "";
		effect.Effect.call(this);
				
		// resize effect
		this.resize = function(x, y, width, height)
		{
			var aspect = input.resize(0, 0, width * 2, height * 2);
			var wi = input.width;
			var hi = input.height;
			var w = (wi + 1) * 0.5 | 0;
			var h = (hi + 1) * 0.5 | 0;
			fb.resize(wi, hi);
			this.x = x;
			this.y = y;
			this.width = w;
			this.height = h;			

			gl.useProgram(this.program);
			gl.uniform2f(scale, w * 2 / wi, h * 2 / hi);
			gl.useProgram(null);

			return aspect;
		};

		// apply effect on given framebuffer
		this.apply = function(framebuffer, sequence)
		{
			// render input onto framebuffer
			fb.apply(input, sequence);
		
			// downsample
			gl.bindFramebuffer(gl.FRAMEBUFFER, framebuffer);
			gl.viewport(this.x, this.y, this.width, this.height);
			gl.useProgram(this.program);
			fb.draw();
		};


		// framebuffer
		var fb = input.getOutput();
		
		// shader
		this.program = effect.createShader("\
precision highp float;\
uniform sampler2D img;\
varying vec2 uv;\
uniform vec2 scale;"
+ vars + 
"void main(){\
	vec2 t = uv * scale;\
	vec4 color = texture2D(img, t);"
	+ code +
	"gl_FragColor = color;\
}", "downsample4");

		effect.setTextureIndex(this.program, "img", 0);
		var scale = gl.getUniformLocation(this.program, "scale");
	};

	// downsample by 4 and apply optional color transformation
	effect.Downsample4 = function(input, code, vars)
	{
		code = code || "";
		vars = vars || "";
		effect.Effect.call(this);
				
		// resize effect
		this.resize = function(x, y, width, height)
		{
			var aspect = input.resize(0, 0, width * 4, height * 4);
			var wi = input.width;
			var hi = input.height;
			var w = (wi + 3) * 0.25 | 0;
			var h = (hi + 3) * 0.25 | 0;
			fb.resize(wi, hi);
			this.x = x;
			this.y = y;
			this.width = w;
			this.height = h;			

			gl.useProgram(this.program);
			gl.uniform2f(scale, w * 4 / wi, h * 4 / hi);
			gl.uniform2f(offset, 1 / wi, 1 / hi);
			gl.useProgram(null);

			return aspect;
		};

		// apply effect on given framebuffer
		this.apply = function(framebuffer, sequence)
		{
			// render input onto framebuffer
			fb.apply(input, sequence);
		
			// downsample
			gl.bindFramebuffer(gl.FRAMEBUFFER, framebuffer);
			gl.viewport(this.x, this.y, this.width, this.height);
			gl.useProgram(this.program);
			fb.draw();
		};


		// framebuffer
		var fb = input.getOutput();
		
		// shader
		this.program = effect.createShader("\
precision highp float;\
uniform sampler2D img;\
varying vec2 uv;\
uniform vec2 scale;\
uniform vec2 offset;"
+ vars + 
"void main(){\
	vec2 t = uv * scale;\
	vec4 color = (texture2D(img, t + offset)\
		+ texture2D(img, t + vec2(-offset.x, offset.y))\
		+ texture2D(img, t + vec2(offset.x, -offset.y))\
		+ texture2D(img, t - offset)) * 0.25;"
	+ code +
	"gl_FragColor = color;\
}", "downsample4");

		effect.setTextureIndex(this.program, "img", 0);
		var scale = gl.getUniformLocation(this.program, "scale");
		var offset = gl.getUniformLocation(this.program, "offset");
	};

	// glow: downsample by 4 and select bright areas, gaussian blur, add to input image
	effect.Glow = function(input)
	{
		effect.Effect.call(this);

		// bright area detection
		this.threshold1 = 0.1;
		this.threshold2 = 0.3;
		
		// image and glow gain
		this.imageGain = 1.0;
		this.glowGain = 1.0;

		// resize effect
		this.resize = function(x, y, width, height)
		{
			var aspect = input.resize(0, 0, width, height);
			blur.resize(0, 0, width * 0.25, height * 0.25);
			var iw = input.width;
			var ih = input.height;
			var gw = blur.width;
			var gh = blur.height;
			imageFB.resize(iw, ih);
			blurFB.resize(gw, gh);
			this.x = x;
			this.y = y;
			this.width = iw;
			this.height = ih;
			gl.useProgram(program);
			gl.uniform2f(scale, iw / (gw * 4), ih / (gh * 4));
			gl.useProgram(null);
			return aspect;
		};

		// apply effect on given framebuffer
		this.apply = function(framebuffer, sequence)
		{
			gl.useProgram(downsample.program);
			gl.uniform2f(threshold, this.threshold1, this.threshold2);
			gl.useProgram(null);

			// render image onto framebuffer
			imageFB.apply(input, sequence);
			
			// render glow onto framebuffer
			blurFB.apply(blur, sequence);
		
			// add image and blur
			gl.bindFramebuffer(gl.FRAMEBUFFER, framebuffer);
			gl.viewport(this.x, this.y, this.width, this.height);
			gl.useProgram(program);
			gl.uniform2f(gain, this.imageGain, this.glowGain);
			imageFB.draw2(blurFB);
		};


		var downsample = new effect.Downsample4(input,
			"float luminance = dot(color.xyz, vec3(0.3, 0.59, 0.11));\
color = vec4(color.xyz * smoothstep(threshold.x, threshold.y, luminance), color.w);",
			"uniform vec2 threshold;");
		var threshold = gl.getUniformLocation(downsample.program, "threshold");
		
		var blur = new effect.Blur13(downsample);		

		// framebuffer
		var imageFB = input.getOutput();
		var blurFB = blur.getOutput();
		
		// shader
		var program = effect.createShader("\
precision highp float;\
uniform sampler2D img;\
uniform sampler2D blur;\
varying vec2 uv;\
uniform vec2 scale;\
uniform vec2 gain;\
void main(){\
	gl_FragColor = vec4(gain.x * texture2D(img, uv).xyz + gain.y * texture2D(blur, uv * scale).xyz, 1.0);\
}", "glow");
		effect.setTextureIndex(program, "img", 0);
		effect.setTextureIndex(program, "blur", 1);
		var scale = gl.getUniformLocation(program, "scale");
		var gain = gl.getUniformLocation(program, "gain");
	};

	// side-by-side stereoscopic view
	effect.SideBySide = function(left, right)
	{
		effect.Effect.call(this);
				
		// resize effect
		this.resize = function(x, y, width, height)
		{		
			var w = width * 0.5 + 0.5 | 0;
			left.resize(x, y, w, height);
			right.resize(x + w, y, width - w, height);
			this.x = x;
			this.y = y;
			this.width = width + 0.5 | 0;
			this.height = height + 0.5 | 0;
			return width / height;
		};

		// apply effect on given framebuffer
		this.apply = function(framebuffer, sequence)
		{
			left.apply(framebuffer, sequence);
			right.apply(framebuffer, sequence);
		};
	};
	
	// head mounted display: side by side stereo with compensation for lens distortion (oculus rift)
	// options:
	//   warpParam: lens warp parameters 
	effect.HMD = function(left, right, options)
	{
		effect.Effect.call(this);
		
		// use to adjust to distance between your eyes
		this.lensCenter = new Float32Array(2);

		// lens warp parameters
		this.warpParam = options && options.warpParam ? options.warpParam : [0.3, 0.2, 0.2, 0.2];

		// render target resolution scale
		this.scale = 2.5;
				
		// resize effect
		this.resize = function(x, y, width, height)
		{
			// calc width and height of framebuffer for one eye
			var w = width * 0.5 * this.scale | 0;
			var h = height * this.scale | 0;

			var aspect = left.resize(0, 0, w, h);
			right.resize(0, 0, w, h);					
			fb.resize(w, h);
			this.x = x;
			this.y = y;
			this.width = width;
			this.height = height;

			gl.useProgram(program);
			var sx = 2.0 * Math.min(w / h, 1.0);
			var sy = 2.0 * Math.min(h / w, 1.0);
			gl.uniform2f(scale1, sx, sy);
			gl.uniform2f(scale2, 1.0 / sx, 1.0 / sy);
			gl.useProgram(null);			

			return aspect;
		};

		// apply effect on given framebuffer
		this.apply = function(framebuffer, sequence)
		{
			// width and height of one eye
			var w = this.width / 2 | 0;
			var h = this.height;
			
			// render left onto framebuffer
			left.apply(fb.fb, sequence);
			
			// set output framebuffer for left
			gl.bindFramebuffer(gl.FRAMEBUFFER, framebuffer);
			gl.viewport(this.x, this.y, w, h);

			// distort left
			gl.useProgram(program);
			gl.uniform2f(center, 0.5 + this.lensCenter[0], 0.5 + this.lensCenter[1]);
			gl.uniform4fv(warpParam, this.warpParam);
			fb.draw();

			// render right onto framebuffer
			right.apply(fb.fb, sequence);
			
			// set output framebuffer for right
			gl.bindFramebuffer(gl.FRAMEBUFFER, framebuffer);
			gl.viewport(this.x + w, this.y, w, h);

			// distort right
			gl.useProgram(program);
			gl.uniform2f(center, 0.5 - this.lensCenter[0], 0.5 + this.lensCenter[1]);
			fb.draw();
		};


		// framebuffer
		var fb = new effect.Framebuffer(false);
		
		// shader
		var program = effect.createShader("\
precision highp float;\
uniform sampler2D img;\
varying vec2 uv;\
uniform vec2 scale1;\
uniform vec2 scale2;\
uniform vec2 center;\
uniform vec4 warpParam;\
void main() {\
	vec2 theta = (uv - center) * scale1;\
	float rSq = theta.x * theta.x + theta.y * theta.y;\
	vec2 rVector = theta * (warpParam.x + warpParam.y * rSq + warpParam.z * rSq * rSq + warpParam.w * rSq * rSq * rSq);\
	vec2 wuv = center + rVector * scale2;\
	if (wuv.x < 0.0 || wuv.x > 1.0 || wuv.y < 0.0 || wuv.y > 1.0)\
		gl_FragColor = vec4(0.0, 0.0, 0.0, 1.0);\
	else\
		gl_FragColor = texture2D(img, wuv);\
}", "oculus rift");
		effect.setTextureIndex(program, "img", 0);
		var scale1 = gl.getUniformLocation(program, "scale1");
		var scale2 = gl.getUniformLocation(program, "scale2");
		var center = gl.getUniformLocation(program, "center");
		var warpParam = gl.getUniformLocation(program, "warpParam");
	};	

	// checker pattern for debugging purposes
	effect.Checker = function(size)
	{
		effect.Effect.call(this);
		
		// size of checker pattern
		this.size = size;
		
		// resize effect
		this.resize = function(x, y, width, height)
		{
			var w = width + 0.5 | 0;
			var h = height + 0.5 | 0;
			this.x = x;
			this.y = y;
			this.width = w;
			this.height = h;

			gl.useProgram(program);
			gl.uniform2f(scale, w / this.size, h / this.size);
			gl.useProgram(null);

			return w / h;
		};

		// apply effect on given framebuffer
		this.apply = function(framebuffer, sequence)
		{
			gl.bindFramebuffer(gl.FRAMEBUFFER, framebuffer);
			gl.viewport(this.x, this.y, this.width, this.height);
			gl.disable(gl.DEPTH_TEST);
			gl.useProgram(program);
			gl.enableVertexAttribArray(0);
			gl.bindBuffer(gl.ARRAY_BUFFER, vb);
			gl.vertexAttribPointer(0, 2, gl.FLOAT, false, 0, 0);
			gl.drawArrays(gl.TRIANGLES, 0, 3);
			gl.bindBuffer(gl.ARRAY_BUFFER, null);
			gl.disableVertexAttribArray(0);
			gl.useProgram(null);
		};
	
	
		var vb = effect.createTriangle();

		// shader
		var program = effect.createShader("\
precision highp float;\
varying vec2 uv;\
uniform vec2 scale;\
void main() {\
	vec2 s = step(0.5, fract(uv * scale * 0.5)) - 0.5;\
	gl_FragColor = vec4(vec3(s.x * s.y * 2.0 + 0.5), 1.0);\
}", "checker");
		var scale = gl.getUniformLocation(program, "scale");		
	};

// helpers	
	effect.createTexture = function()
	{
		var tex = gl.createTexture();
		gl.bindTexture(gl.TEXTURE_2D, tex);
		gl.texParameteri(gl.TEXTURE_2D, gl.TEXTURE_MIN_FILTER, gl.LINEAR);
		gl.texParameteri(gl.TEXTURE_2D, gl.TEXTURE_WRAP_S, gl.CLAMP_TO_EDGE);
		gl.texParameteri(gl.TEXTURE_2D, gl.TEXTURE_WRAP_T, gl.CLAMP_TO_EDGE);
		gl.bindTexture(gl.TEXTURE_2D, null);
		return tex;
	};
	effect.createTriangle = function()
	{
		var buffer = gl.createBuffer();
		gl.bindBuffer(gl.ARRAY_BUFFER, buffer);
		gl.bufferData(gl.ARRAY_BUFFER, new Float32Array([0,0,2,0,0,2]), gl.STATIC_DRAW);
		gl.bindBuffer(gl.ARRAY_BUFFER, null);
		return buffer;
	};
	effect.createShader = function(pixelShader, name)
	{
		var vs = gl.createShader(gl.VERTEX_SHADER);	
		gl.shaderSource(vs, "\
attribute vec2 pos;\
varying vec2 uv;\
void main(){\
	gl_Position = vec4(pos * 2.0 - 1.0, 0.0, 1.0);\
	uv = pos;\
}");
		gl.compileShader(vs);
		var ps = gl.createShader(gl.FRAGMENT_SHADER);	
		gl.shaderSource(ps, pixelShader);
		gl.compileShader(ps);
		if (DEBUG && !gl.getShaderParameter(ps, gl.COMPILE_STATUS))
		{
			console.log("error in shader '" + name + "': " + gl.getShaderInfoLog(ps));
		}
		var program = gl.createProgram();
		gl.attachShader(program, vs);
		gl.attachShader(program, ps);
		gl.bindAttribLocation(program, 0, "pos");
		gl.linkProgram(program);
		gl.deleteShader(vs);
		gl.deleteShader(ps);
		return program;
	};
	effect.setTextureIndex = function(program, name, index)
	{
		gl.useProgram(program);
		gl.uniform1i(gl.getUniformLocation(program, name), index);
		gl.useProgram(null);
	};
	effect.Framebuffer = function(withDepth)
	{
		this.width = 0;
		this.height = 0;
		this.colorBuffer = effect.createTexture();
		this.depthBuffer = withDepth ? gl.createRenderbuffer() : null;	
		this.fb = gl.createFramebuffer();
		this.vb = effect.createTriangle();
		this.seq = false;
	
		this.resize = function(width, height)
		{
			if (width != this.width || height != this.height)
			{
				this.width = width;
				this.height = height;
				
				gl.bindFramebuffer(gl.FRAMEBUFFER, this.fb);

				// color buffer
				gl.bindTexture(gl.TEXTURE_2D, this.colorBuffer);
				gl.texImage2D(gl.TEXTURE_2D, 0, gl.RGB, width, height, 0, gl.RGB, gl.UNSIGNED_BYTE, null);
				gl.framebufferTexture2D(gl.FRAMEBUFFER, gl.COLOR_ATTACHMENT0, gl.TEXTURE_2D, this.colorBuffer, 0);

				// depth buffer
				if (withDepth)
				{
					gl.bindRenderbuffer(gl.RENDERBUFFER, this.depthBuffer);
					gl.renderbufferStorage(gl.RENDERBUFFER, gl.DEPTH_COMPONENT16, width, height);
					gl.framebufferRenderbuffer(gl.FRAMEBUFFER, gl.DEPTH_ATTACHMENT, gl.RENDERBUFFER, this.depthBuffer);
				}

				var status = gl.checkFramebufferStatus(gl.FRAMEBUFFER);
				gl.bindFramebuffer(gl.FRAMEBUFFER, null);		
				return status == gl.FRAMEBUFFER_COMPLETE;
			}
			return true;
		};
		this.apply = function(input, seq)
		{
			if (this.seq != seq)
			{
				this.seq = seq;
				input.apply(this.fb, seq);
			}
		};
		this.draw = function()
		{			
			// fullscreen triangle
			gl.activeTexture(gl.TEXTURE0);
			gl.bindTexture(gl.TEXTURE_2D, this.colorBuffer);			
			gl.enableVertexAttribArray(0);
			gl.bindBuffer(gl.ARRAY_BUFFER, this.vb);
			gl.vertexAttribPointer(0, 2, gl.FLOAT, false, 0, 0);
			gl.drawArrays(gl.TRIANGLES, 0, 3);
			gl.bindBuffer(gl.ARRAY_BUFFER, null);
			gl.disableVertexAttribArray(0);
			gl.bindTexture(gl.TEXTURE_2D, null);
			gl.useProgram(null);
		};
		this.draw2 = function(fb1)
		{
			// fullscreen triangle
			gl.activeTexture(gl.TEXTURE0);
			gl.bindTexture(gl.TEXTURE_2D, this.colorBuffer);
			gl.activeTexture(gl.TEXTURE1);
			gl.bindTexture(gl.TEXTURE_2D, fb1.colorBuffer);
			gl.enableVertexAttribArray(0);
			gl.bindBuffer(gl.ARRAY_BUFFER, this.vb);
			gl.vertexAttribPointer(0, 2, gl.FLOAT, false, 0, 0);
			gl.drawArrays(gl.TRIANGLES, 0, 3);
			gl.bindBuffer(gl.ARRAY_BUFFER, null);
			gl.disableVertexAttribArray(0);
			gl.bindTexture(gl.TEXTURE_2D, null);
			gl.activeTexture(gl.TEXTURE0);
			gl.bindTexture(gl.TEXTURE_2D, null);
			gl.useProgram(null);
		};
	};	

	return effect;
}();
