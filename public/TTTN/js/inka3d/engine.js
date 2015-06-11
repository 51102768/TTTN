var inka3dEngine = function()
{
    'use strict';
	var engine = {};

	// truncate fractional part of number, e.g. trunc(3.4) = 3, trunc(-3.4) = -3
	engine.trunc = function(x)
	{
		return x - x % 1;
	};    
	
	// matrix multiply fr = fa * fb (column-major Float32Array(16))
	engine.matrix4x4Mul = function(fa, fb, fr)
	{
		var a = fa[0];
		var b = fa[1];
		var c = fa[2];
		var d = fa[3];
		var e = fb[0];
		var f = fb[1];
		var g = fb[2];
		var h = fb[3];
		var i = fa[4];
		var j = fa[5];
		var k = fa[6];
		var l = fa[7];
		var m = fa[8];
		var n = fa[9];
		var o = fa[10];
		var p = fa[11];
		var q = fa[12];
		var r = fa[13];
		var s = fa[14];
		var t = fa[15];
		var u = fb[4];
		var v = fb[5];
		var w = fb[6];
		var x = fb[7];
		var y = fb[8];
		var z = fb[9];
		var A = fb[10];
		var B = fb[11];
		var C = fb[12];
		var D = fb[13];
		var E = fb[14];
		var F = fb[15];
		fr[0] = a * e + i * f + m * g + q * h;
		fr[1] = b * e + j * f + n * g + r * h;
		fr[2] = c * e + k * f + o * g + s * h;
		fr[3] = d * e + l * f + p * g + t * h;
		fr[4] = a * u + i * v + m * w + q * x;
		fr[5] = b * u + j * v + n * w + r * x;
		fr[6] = c * u + k * v + o * w + s * x;
		fr[7] = d * u + l * v + p * w + t * x;
		fr[8] = a * y + i * z + m * A + q * B;
		fr[9] = b * y + j * z + n * A + r * B;
		fr[10] = c * y + k * z + o * A + s * B;
		fr[11] = d * y + l * z + p * A + t * B;
		fr[12] = a * C + i * D + m * E + q * F;
		fr[13] = b * C + j * D + n * E + r * F;
		fr[14] = c * C + k * D + o * E + s * F;
		fr[15] = d * C + l * D + p * E + t * F;
	};
	
	// matrix invert fr = inv(fa) (column-major Float32Array(16))
	engine.matrix4x4Inv = function(fa, fr)
	{
		var a = fa[4];
		var b = fa[5];
		var c = fa[6];
		var d = fa[7];
		var e = fa[8];
		var f = fa[9];
		var g = fa[10];
		var h = fa[11];
		var i = fa[12];
		var j = fa[13];
		var k = fa[14];
		var l = fa[15];
		var m = e * l - h * i;
		var n = f * l - h * j;
		var o = g * l - h * k;
		var p = e * k - g * i;
		var q = f * i - e * j;
		var r = g * j - f * k;
		var s = b * o - c * n - d * r;
		var t = c * m - d * p - a * o;
		var u = q * -d + a * n - b * m;
		var v = a * r + b * p + c * q;
		var w = fa[0];
		var x = fa[1];
		var y = fa[2];
		var z = fa[3];
		var A = i * z - l * w;
		var B = j * z - l * x;
		var C = k * z - l * y;
		var D = i * y - k * w;
		var E = j * w - i * x;
		var F = k * x - j * y;
		var G = w * d - z * a;
		var H = x * d - z * b;
		var I = y * d - z * c;
		var J = w * c - y * a;
		var K = x * a - w * b;
		var L = y * b - x * c;
		var M = a * h - d * e;
		var N = b * h - d * f;
		var O = c * h - d * g;
		var P = a * g - c * e;
		var Q = b * e - a * f;
		var R = c * f - b * g;
		var S = 1.0 / (w * s + x * t + y * u + z * v);
		fr[0] = S * s;
		fr[1] = S * -(f * C - g * B - h * F);
		fr[2] = S * (j * I - k * H - l * L);
		fr[3] = S * -(x * O - y * N - z * R);
		fr[4] = S * t;
		fr[5] = S * -(g * A - h * D - e * C);
		fr[6] = S * (k * G - l * J - i * I);
		fr[7] = S * -(y * M - z * P - w * O);
		fr[8] = S * u;
		fr[9] = S * -(E * -h + e * B - f * A);
		fr[10] = S * (K * -l + i * H - j * G);
		fr[11] = S * -(Q * -z + w * N - x * M);
		fr[12] = S * v;
		fr[13] = S * -(e * F + f * D + g * E);
		fr[14] = S * (i * L + j * J + k * K);
		fr[15] = S * -(w * R + x * P + y * Q);
	};

	// calculate projection matrix fr (Float32Array(16)) from camera parameters fp
	// fp[0]:
	//   perspective fit mode: 1.0: fill, 2.0: horizontal, 3.0: vertical, 4.0: overscan
	//   orthographic fit mode: -1.0: fill, -2.0: horizontal, -3.0: vertical, -4.0: overscan
	// fp[1]:
	//   perspective: focal length
	//   orthographic: orthographic width
	// fp[2], fp[3]: film size
	// fp[4], fp[5]: film offset
	// fp[6]: near clipping plane
	// fp[7]: far clipping plane
	// aspect: aspect ratio of viewport (width/height)
	engine.matrix4x4Projection = function(fp, aspect, fr)
	{
		var a = fp[2];
		var b = fp[3];
		var c = fp[0];
		var d = c * c;
		var e;
		if (d < 2.0)
		{
			e = aspect * b > a;
		}
		else
		{
			var f;
			if (d < 5.0)
			{
				f = -1;
			}
			else
			{
				var g;
				if (d < 10.0)
				{
					g = 0;
				}
				else
				{
					g = aspect * b < a;
				}
				f = g;
			}
			e = f;
		}
		var h;
		var i;
		if (e != 0)
		{
			h = a;
			i = a / aspect;
		}
		else
		{
			h = b * aspect;
			i = b;
		}
		var j = fp[1] * 2.0;
		var k = fp[4] * 2.0 / h;
		var l = fp[5] * 2.0 / i;
		var m;
		var n;
		var o;
		var p;
		var q;
		var r;
		var s;
		var t;
		if (c < 0.0)
		{
			var u = fp[6];
			var v = fp[7];
			var w = 1.0 / (u - v);
			m = 0.0;
			n = 0.0;
			o = w * 2.0;
			p = 0.0;
			q = k;
			r = l;
			s = (v + u) * w;
			t = 1.0;
		}
		else
		{
			var x = fp[6];
			var y = fp[7];
			var z = 1.0 / (x - y);
			m = k;
			n = l;
			o = (y + x) * z;
			p = -1.0;
			q = 0.0;
			r = 0.0;
			s = y * 2.0 * x * z;
			t = 0.0;
		}
		fr[0] = j / h;
		fr[1] = 0.0;
		fr[2] = 0.0;
		fr[3] = 0.0;
		fr[4] = 0.0;
		fr[5] = j / i;
		fr[6] = 0.0;
		fr[7] = 0.0;
		fr[8] = m;
		fr[9] = n;
		fr[10] = o;
		fr[11] = p;
		fr[12] = q;
		fr[13] = r;
		fr[14] = s;
		fr[15] = t; 
	};
	
	// create a renderer with given number of pre-allocated render jobs (100 for small scenes, 10000 for large scenes)
	// new engine.Renderer(numRenderJobs) returns a renderer object with these methods:
	//   - createGroup(): create a render group. pass it to container.createScene() to create a scene in the group.
	//     createGroup() returns a group object with these methods:
	//     - update(): update group of scenes, recalculate dependent attributes
	//       render(viewMatrix, projectionMatrix, layerName): render a group of scenes using given view/projection matrix
	//       (both Float32Array[16]) and render layer name. default render state is assumed and left behind
	//     - pick(viewMatrix, projectionMatrix, x, y): pick an object in given group at device coordinates x, y which 
	//       range from -1 to 1. If an object was hit, return its handle. Handles to objects can be obtained with
	//       scene.getObjectId(). Only works if a 'pick' render layer was exported.
	//       Note: pick() changes clear color and viewport
	engine.Renderer = function(numRenderJobs)
	{
		// build render jobs
		var begin = {p: null, n: null, next: null, render: null, draw: null, instance: null, data: new Float32Array(18)};
		var end = begin;
		var n = numRenderJobs + 1;
		while (n > 1)
		{
			var rj = {p: end, n: null, next: null, render: null, draw: null, instance: null, data: new Float32Array(18)};
			end.n = rj;
			end = rj;
			--n;
		}
				
		// render queues
		this.iBegin = begin;
		this.iEnd = end;
		this.iResetShader = function () {};
		this.begin = null;
		this.end = null;
		//this.resetShader = null;
		this.alphaSort = null;
			
		// picking
		this.pickFBO = null;
		this.pickProjectionMatrix = new Float32Array(16);
		this.pickPixel = new Uint8Array(4);
		this.nextId = 1;
		this.idPool = [];

		var renderer = this;
		
		// add renderer methods
		renderer.createGroup = function()
		{
			var group = {renderer: renderer, scenes: []};
			
			group.update = function()
			{
				var scenes = group.scenes;
				var i;
				for (i = 0; i < scenes.length; ++i)
				{
					scenes[i].update();
				}
			};
			group.render = function(viewMatrix, projectionMatrix, layerName)
			{
				var rq = renderer;
				rq.begin = rq.iBegin;
				rq.end = rq.iEnd;
				rq.alphaSort = null;

				// two vertex attributes are enabled by default
				gl.enableVertexAttribArray(0);
				gl.enableVertexAttribArray(1);
				
				// render scenes. opaque shapes are rendered immediately,
				// transparent shapes are deferred
				var scenes = group.scenes;
				for (var i = 0; i < scenes.length; ++i)
				{
					scenes[i].render(viewMatrix, projectionMatrix, layerName, rq);
				}
				
				// render transparent shapes
				if (rq.alphaSort != null)
				{
					gl.depthMask(false);
					gl.enable(gl.BLEND);
					gl.blendFunc(gl.ONE, gl.ONE_MINUS_SRC_ALPHA);
					renderSorted(rq.alphaSort);
					gl.blendFunc(gl.ONE, gl.ZERO);
					gl.disable(gl.BLEND);
					gl.depthMask(true);
				}
				
				// reset vertex arrays
				gl.bindBuffer(gl.ARRAY_BUFFER, null);
				gl.bindBuffer(gl.ELEMENT_ARRAY_BUFFER, null);

				// reset cull mode
				gl.disable(gl.CULL_FACE);
				gl.cullFace(gl.BACK);
				
				// reset program 
				gl.useProgram(null);
				
				// reset vertex attributes
				gl.disableVertexAttribArray(1);
				gl.disableVertexAttribArray(0);
			};
			group.pick = function(viewMatrix, projectionMatrix, x, y)
			{
				// save viewport
				var viewport = gl.getParameter(gl.VIEWPORT);
				
				// save clear color
				var clearColor = gl.getParameter(gl.COLOR_CLEAR_VALUE);
				
				// pick area
				var fp = projectionMatrix;
				var fr = renderer.pickProjectionMatrix;
				var a = x * -10000.0;
				var b = y * -10000.0;
				var c = fp[3];
				var d = fp[7];
				var e = fp[11];
				var f = fp[15];
				fr[0] = fp[0] * 10000.0 + a * c;
				fr[1] = fp[1] * 10000.0 + b * c;
				fr[2] = fp[2];
				fr[3] = c;
				fr[4] = fp[4] * 10000.0 + a * d;
				fr[5] = fp[5] * 10000.0 + b * d;
				fr[6] = fp[6];
				fr[7] = d;
				fr[8] = fp[8] * 10000.0 + a * e;
				fr[9] = fp[9] * 10000.0 + b * e;
				fr[10] = fp[10];
				fr[11] = e;
				fr[12] = fp[12] * 10000.0 + a * f;
				fr[13] = fp[13] * 10000.0 + b * f;
				fr[14] = fp[14];
				fr[15] = f; 

				// set fbo (1x1 render target)
				if (!renderer.pickFBO)
					if (!(renderer.pickFBO = createPickBuffer()))
						alert('could not create frame buffer for picking');	
				gl.bindFramebuffer(gl.FRAMEBUFFER, renderer.pickFBO);

				// render
				gl.viewport(0, 0, 1, 1);
				gl.clearColor(0, 0, 0, 1);
				gl.clear(gl.COLOR_BUFFER_BIT | gl.DEPTH_BUFFER_BIT);
				group.render(viewMatrix, fr, 'pick');

				// get pixel
				var pixel = renderer.pickPixel;
				gl.readPixels(0, 0, 1, 1, gl.RGBA, gl.UNSIGNED_BYTE, pixel);

				// unset fbo
				gl.bindFramebuffer(gl.FRAMEBUFFER, null);	
				
				// restore viewport
				gl.viewport(viewport[0], viewport[1], viewport[2], viewport[3]);
				
				// restore clear color
				gl.clearColor(clearColor[0], clearColor[1], clearColor[2], clearColor[3]);
				
				return (pixel[0] >> 3) + (pixel[1] >> 2) * 32 + (pixel[2] >> 3) * 2048;
			};
			return group;
		}
	};
		
	// load scene container that is embedded via script tag. returns a loader object
	// container: scene container
	// url: url to data and texture files (e.g. '' or 'scenes/')
	// name: name of scene (gets extended by '.dat' do load data file)
	// textureSetIndex: index of texture set to use (0 or 1)
	// onload(container): gets called if container was loaded
	//   this.status has a value other than zero if some error occurred:
	//   3: maximum number of textures is exceeded
	//   4: maximum number of vertex textures is exceeded
	//   5: float textures are not supported
	//   4xx: HTTP error 
	//
	//   container has these methods:
	//   - done(): free all resources of scene container and remove from rendering groups
	//   - createScene(name, group): create a scene with given name in given rendering group.
	//     createScene() returns a scene object with these methods:
	//     - getAttributes(): returns a list of attributes and their properties
	//     - getIntVector(attributeName, length): returns an Int32Array for the attribute. length is 1 to 4
	//     - getIntArray(attributeName): returns an Int32Array for the attribute
	//     - getFloatVector(attributeName, length): returns an Float32Array for the attribute. length is 1 to 4
	//     - getFloatArray(attributeName): returns an Float32Array for the attribute
	//     - getTexture(attributeName, index): returns a webgl texture, optional index is for texture sequences
	//     - setTexture(attributeName, texture, index): set a webgl texture, optional index is for texture sequences
	//     - getObjectId(objectName): returns an id or the object
	//     - done(): free all resources of scene and remove from its rendering group
	//
	// loadEmbedded() returns a loader object with these callbacks/properties:
	//   - onprogress(progress): gets called on load progress. progress goes from 0 to 1
	//   - progress: current load progress from 0 to 1
	engine.loadEmbedded = function(container, url, name, textureSetIndex, onload)
	{
		var loader =
		{
			status: 0,
			onload: onload,
			onprogress: function(progress) {},
			progress: 0,
			numFiles: container.numFiles,
			numLoaded: 0
		};
		load(container, url, name, textureSetIndex, loader);
		return loader;
	};

	// load scene container from json file. returns a loader object
	// url: url to scene, data and texture files (e.g. '' or 'scenes/')
	// name: name of scene (gets extended by '.json' to load scene file and '.dat' do load data file)
	// textureSetIndex: index of texture set to use (0 or 1)
	// onload(container): gets called if container was loaded.
	//   this.status has a value other than zero if some error occurred:
	//   3: maximum number of textures is exceeded
	//   4: maximum number of vertex textures is exceeded
	//   5: float textures are not supported
	//   4xx: HTTP error 
	//
	//   container has these methods:
	//   - done(): free all resources of scene container and remove from rendering groups
	//   - createScene(sceneName, group): create a scene with given name in given rendering group.
	//     createScene() returns a scene object with these methods:
	//     - getAttributes(): returns a list of attributes and their properties
	//     - getIntVector(attributeName, length): returns an Int32Array for the attribute. length is 1 to 4
	//     - getIntArray(attributeName): returns an Int32Array for the attribute
	//     - getFloatVector(attributeName, length): returns an Float32Array for the attribute. length is 1 to 4
	//     - getFloatArray(attributeName): returns an Float32Array for the attribute
	//     - getTexture(attributeName, index): returns a webgl texture, optional index is for texture sequences
	//     - setTexture(attributeName, texture, index): set a webgl texture, optional index is for texture sequences
	//     - getObjectId(objectName): returns an id or the object
	//     - done(): free all resources of scene and remove from its rendering group
	//
	// loadJSON() returns a loader object with these callbacks/properties:
	//   - onprogress(progress): gets called on load progress. progress goes from 0 to 1
	//   - progress: current load progress from 0 to 1
	engine.loadJSON = function(url, name, textureSetIndex, onload)
	{
		var loader =
		{
			status: 0,
			onload: onload,
			onprogress: function(progress) {},
			progress: 0,
			numFiles: 1,
			numLoaded: 0
		};

		// start loading json file
		var xhr = new XMLHttpRequest();
		xhr.open('GET', url + name + '.json', true);
		xhr.onload = function (event)
		{
			if (this.status != 200 && this.status != 0)
			{
				loader.status = this.status;
				loader.onload(null);
			}
			else
			{
				var container = JSON.parse(this.response);
	
				// update number of files and call onprogress
				var n = loader.numFiles = 1 + container.numFiles;
				loader.onprogress(loader.progress = ++loader.numLoaded / n);
				
				// eval functions
				var textures = container.textures;
				for (var name in textures)
				{
					var texture = textures[name];
					texture.initGlobal = eval(texture.initGlobal);
					texture.doneGlobal = eval(texture.doneGlobal);			
					texture.copy = eval(texture.copy);			
				}
				var scenes = container.scenes;
				for (var name in scenes)
				{
					var scene = scenes[name];
					var shaders = scene.shaders;
					/*for (var s in shaders)
					{
						var shader = shaders[s];
						shader.setShader = eval(shader.setShader);
						shader.resetShader = eval(shader.resetShader);
					}*/			
					scene.initGlobal = eval(scene.initGlobal);
					scene.doneGlobal = eval(scene.doneGlobal);
					var render = scene.render;
					for (var r in render)
					{
						render[r] = eval(render[r]);
					}
					var draw = scene.draw;
					for (var d in draw)
					{
						draw[d] = eval(draw[d]);
					}
					scene.createInstance = eval(scene.createInstance);
					scene.doneInstance = eval(scene.doneInstance);
				}
				container.check = eval(container.check);
				
				// load data and textures
				load(container, url, name, textureSetIndex, loader);
			}
		};
		xhr.send();
				
		return loader;
	};
		
	// simplex noise
	engine.noise = function(x, y, z)
	{
		var l = arguments.length;
		if (l == 1)
			return engine.noise2f(x, 0);
		if (l == 2)
			return engine.noise2f(x, y);
		if (l == 3)
			return engine.noise3f(x, y, z);		
	};
	
// internal helper functions
		
	var load = function(container, url, name, textureSetIndex, loader)
	{
		var dataUrl = url + name + '.dat';
	
		var s = container.check();
		if (s != 0)
		{
			loader.status = s;
			loader.onload(null);
			return;
		}
		
		container.instances = [];

		// add methods to container
		container.done = function()
		{
			for (var i = 0; i < container.instances.length; ++i)
				conntainer.instances[i].done();			
			for (var name in container.textures)
				textures[name].doneGlobal(textures[name]);
			for (var name in container.scenes)
				scenes[name].doneGlobal(scenes[name]);
		};
		container.createScene = function(name, group)
		{
			var scene = container.scenes[name];
			if (DEBUG)
			{
				if (!scene)
				{
					var e = "scene '" + name + "' not found";
					console.log(e);
					alert(e);
					return null;
				}
			}
			
			var instance = scene.createInstance(scene, group.renderer);
			var textures = container.textures;
			var tb = scene.textureBindings;
			for (var i = 0; i < tb.length; ++i)
			{
				var texture = textures[tb[i].n];
				texture.copy(texture, instance.ostate, tb[i].b);
			}
			instance.inGroup = group.scenes.length;
			group.scenes.push(instance);
			instance.inContainer = container.instances.length;
			container.instances.push(instance);
			
			// add methods to scene
			instance.getAttributes = function()
			{
				return scene.attributes;
			};
			instance.getIntVector = function(name, length)
			{
				var a = scene.attributes[name];
				if (DEBUG)
				{
					if (!a)
					{
						console.log("attribute '" + name + "' not found");
						return new Int32Array(length);
					}
					if (a.t != 0)
					{
						console.log("attribute '" + name + "' ist not integer type");
						return new Int32Array(length);
					}
					if (length > a.e - a.b)
					{
						console.log("attribute '" + name + "' too short for requested length of " + length);
						return new Int32Array(length);
					}
				}
				return instance.istate.subarray(a.b, a.e);
			};
			instance.getIntArray = function(name)
			{
				var a = scene.attributes[name];
				if (DEBUG)
				{
					if (!a)
					{
						console.log("attribute '" + name + "' not found");
						return null;
					}
					if (a.t != 0)
					{
						console.log("attribute '" + name + "' ist not integer type");
						return null;
					}
				}
				return instance.istate.subarray(a.b, a.e);
			};
			instance.getFloatVector = function(name, length)
			{
				var a = scene.attributes[name];
				if (DEBUG)
				{
					if (!a)
					{
						console.log("attribute '" + name + "' not found");
						return new Float32Array(length);
					}
					if (a.t != 1)
					{
						console.log("attribute '" + name + "' ist not float type");
						return new Float32Array(length);
					}
					if (length > a.e - a.b)
					{
						console.log("attribute '" + name + "' too short for requested length of " + length);
						return new Float32Array(length);
					}
				}
				return instance.fstate.subarray(a.b, a.e);
			};
			instance.getFloatArray = function(name)
			{
				var a = scene.attributes[name];
				if (DEBUG)
				{
					if (!a)
					{
						console.log("attribute '" + name + "' not found");
						return null;
					}
					if (a.t != 1)
					{
						console.log("attribute '" + name + "' ist not float type");
						return null;
					}
				}
				return instance.fstate.subarray(a.b, a.e);
			};
			instance.getTexture = function(name, index)
			{
				var a = scene.attributes[name];
				var i = index || 0;
				if (DEBUG)
				{
					if (!a)
					{
						console.log("attribute '" + name + "' not found");
						return null;
					}
					if (a.t != 2)
					{
						console.log("attribute '" + name + "' ist not texture type");
						return null;
					}
					if (i < 0 || i >= a.l)
					{
						console.log("attribute '" + name + "' has length " + a.l + ", index " + index + " out of range");
						return null;
					}
				}
				return instance.ostate[a.b + i];
			};
			instance.setTexture = function(name, texture, index)
			{
				var a = scene.attributes[name];
				var i = index || 0;
				if (DEBUG)
				{
					if (!a)
					{
						console.log("attribute '" + name + "' not found");
						return;
					}
					if (a.t != 2)
					{
						console.log("attribute '" + name + "' ist not texture type");
						return;
					}
					if (i < 0 || i >= a.l)
					{
						console.log("attribute '" + name + "' has length " + a.l + ", index " + index + " out of range");
						return;
					}
				}
				instance.ostate[a.b + i] = texture;
			};
			instance.getObjectId = function(name)
			{
				var index = scene.objects[name];
				if (index == null)
				{
					if (DEBUG)
						console.log("object '" + name + "' not found");						
					return -1;
				}
				if (instance.ids[index] == 0)
				{
					if (group.renderer.idPool.length > 0)
						instance.ids[index] = group.renderer.idPool.pop();
					else
						instance.ids[index] = group.renderer.nextId++;
				}
				return instance.ids[index];
			};
			instance.done = function()
			{
				// remove from group
				var index = instance.inGroup;
				var scenes = group.scenes;
				scenes.splice(index, 1);
				for (var i = 0; i < scenes.length; ++i)
					if (scenes[i].inGroup > index) --scenes[i].inGroup;
				
				// remove from container
				index = instance.inContainer;
				scenes = container.instances;
				scenes.splice(index, 1);
				for (var i = 0; i < scenes.length; ++i)
					if (scenes[i].inContainer > index) --scenes[i].inContainer;
				
				// add ids to id pool
				for (var i = 0; i < instance.ids.length; ++i)
					if (instance.ids[i] != 0) group.renderer.idPool.push(instance.ids[i]);
				
				scene.doneInstance(instance);
			}
			
			return instance;
		};
		
		var loaded = function()
		{
			var n = loader.numFiles;
			loader.onprogress(loader.progress = ++loader.numLoaded / n); 
			if (loader.numLoaded == n)
				loader.onload(container);
		};

		// initialize textures and start loading image files
		var textures = container.textures;
		for (var name in textures)
			textures[name].initGlobal(textures[name], url, textureSetIndex, loaded);
		
		// start loading data file
		var xhr = new XMLHttpRequest();
		xhr.open('GET', dataUrl, true);
		xhr.responseType = 'arraybuffer';
		xhr.onload = function (event)
		{
			if (this.status != 200 && this.status != 0)
			{
				loader.status = this.status;
				loader.onload(null);
			}
			else
			{			
				// initialize scenes
				var scenes = container.scenes;
				for (var name in scenes)
					scenes[name].initGlobal(scenes[name], this.response);
				gl.bindBuffer(gl.ARRAY_BUFFER, null);
				gl.bindBuffer(gl.ELEMENT_ARRAY_BUFFER, null);
				gl.useProgram(null);
				
				loaded();
			}
		};
		xhr.send();
	};

	// create 1x1 frame buffer for picking
	var createPickBuffer = function()
	{
		var buffer0 = gl.createRenderbuffer();
		gl.bindRenderbuffer(gl.RENDERBUFFER, buffer0);
		gl.renderbufferStorage(gl.RENDERBUFFER, gl.RGB565, 1, 1);
		var buffer1 = gl.createRenderbuffer();
		gl.bindRenderbuffer(gl.RENDERBUFFER, buffer1);
		gl.renderbufferStorage(gl.RENDERBUFFER, gl.DEPTH_COMPONENT16, 1, 1);
		gl.bindRenderbuffer(gl.RENDERBUFFER, null);

		var fbo = gl.createFramebuffer();
		gl.bindFramebuffer(gl.FRAMEBUFFER, fbo);
		gl.framebufferRenderbuffer(gl.FRAMEBUFFER, gl.COLOR_ATTACHMENT0, gl.RENDERBUFFER, buffer0);
		gl.framebufferRenderbuffer(gl.FRAMEBUFFER, gl.DEPTH_ATTACHMENT, gl.RENDERBUFFER, buffer1);
		var status = gl.checkFramebufferStatus(gl.FRAMEBUFFER);
		gl.bindFramebuffer(gl.FRAMEBUFFER, null);
		
		// release render buffers, the framebuffer still holds a reference
		gl.deleteRenderbuffer(buffer0);
		gl.deleteRenderbuffer(buffer1);
		
		if (status == gl.FRAMEBUFFER_COMPLETE)
			return fbo;
			
		gl.deleteFramebuffer(fbo);
		return null;
	};

    // create a vertex shader. in DEBUG mode compile errors are checked
   	engine.createVertexShader = function(code, name)
	{
		var shader = gl.createShader(gl.VERTEX_SHADER);	
		gl.shaderSource(shader, code);
		gl.compileShader(shader);
		if (DEBUG && !gl.getShaderParameter(shader, gl.COMPILE_STATUS))
		{
			var e = "error in vertex shader '" + name + "': " + gl.getShaderInfoLog(shader);
			console.log(e);
			alert(e);
		}
		return shader;		
	};
	
    // create a pixel shader. in DEBUG mode compile errors are checked
	engine.createPixelShader = function(code, name)
	{
		var shader = gl.createShader(gl.FRAGMENT_SHADER);	
		gl.shaderSource(shader, code);
		gl.compileShader(shader);
		if (DEBUG && !gl.getShaderParameter(shader, gl.COMPILE_STATUS))
		{
			var e = "error in pixel shader '" + name + "': " + gl.getShaderInfoLog(shader);
			console.log(e);
			alert(e);
		}
		return shader;		
	};

	var renderSorted = function(list)
	{
		// list merge sort by Simon Tatham
		var insize = 1;
		while (true)
		{
			var p = list;
			list = null;
			var tail = null;
			var nmerges = 0;
			while (p != null)
			{
				nmerges++;
				var q = p;
				var psize = 0;
				var i;
				for (i = 0; i < insize; i++)
				{
					psize++;
					q = q.next;
					if (q == null)
						break;
				}
				var qsize = insize;
				var e;
				while (psize > 0 || (qsize > 0 && q != null))
				{
					if (psize == 0)
					{
						e = q; q = q.next; qsize--;
					}
					else if (qsize == 0 || q == null)
					{
						e = p; p = p.next; psize--;
					}
					else if (p.data[16] > q.data[16])
					{
						e = p; p = p.next; psize--;
					}
					else
					{
						e = q; q = q.next; qsize--;
					}
					if (tail != null)
						tail.next = e;
					else
						list = e;
					tail = e;
				}
				p = q;
			}
			tail.next = null;
			if (nmerges <= 1)
				break;
			insize *= 2;
		}
		while (list != null)
		{
			list.render(list);
			list = list.next;
		}
	};
	
	// evaluate step track	
	engine.eST = function (xValues, yValues, numKeys, x)
	{
		var low = 0;
		var high = numKeys; 		
		var a = (low + high) >> 1;
		while (low < high - 1)
		{
			if (xValues[a] > x)
				high = a;
			else
				low = a;			
			a = (low + high) >> 1;
		}

		return yValues[a];
	};
	
	// evaluate bezier track	
	engine.eBT = function(xValues, yValues, numKeys, x)
	{
		var low = 0;
		var high = numKeys - 1;
		var a = (low + high) >> 1;
		while (low < high - 1)
		{
			if (xValues[a] > x)
				high = a;
			else
				low = a;			
			a = (low + high) >> 1;
		}		

		var b = xValues[a];
		var c = a * 3;
		var d = (x - b) / (xValues[a + 1] - b);
		var e = d * d;
		var f = e * d;
		return (f * -1.0 + e * 3.0 + d * -3.0 + 1.0) * yValues[c] + (f * 3.0 + e * -6.0 + d * 3.0) * yValues[c + 1] + (f * -3.0 + e * 3.0) * yValues[c + 2] + f * yValues[c + 3];
	};
	
	// evaluate weighted bezier track	
	engine.eWBT = function(xValues, yValues, numKeys, x)
	{
		var low = 0;
		var high = numKeys - 1;
		var a = (low + high) >> 1;
		while (low < high - 1)
		{
			if (xValues[a * 3] > x)
				high = a;
			else
				low = a;			
			a = (low + high) >> 1;
		}

		var b = a * 3;
		var c = xValues[b];
		var d = xValues[b + 3];
		var e = b;
		var f = xValues[b + 1];
		var g = xValues[b + 2];
		var h = (x - c) / (d - c);
		var i = c * -3.0 + f * 3.0;
		var j = c * 3.0 + f * -6.0 + g * 3.0;
		var k = c * -1.0 + f * 3.0 + g * -3.0 + d;
		var l = h * h;
		var m = h - (l * h * k + l * j + h * i + c - x) / (l * 3.0 * k + h * 2.0 * j + i);
		var n = m * m;
		var o = m - (n * m * k + n * j + m * i + c - x) / (n * 3.0 * k + m * 2.0 * j + i);
		var p = o * o;
		var q = o - (p * o * k + p * j + o * i + c - x) / (p * 3.0 * k + o * 2.0 * j + i);
		var r = q * q;
		var s = r * q;
		return (s * -1.0 + r * 3.0 + q * -3.0 + 1.0) * yValues[e] + (s * 3.0 + r * -6.0 + q * 3.0) * yValues[e + 1] + (s * -3.0 + r * 3.0) * yValues[e + 2] + s * yValues[e + 3];
	};

	// evaluate equidistant sampled catmull rom track
	engine.eCT = function(yValues, x)
	{
		var a = x;
		var b = Math.floor(a);
		var c = a - b;
		var d = b;
		var e = c * c;
		var f = e * c;
		return (yValues[d] * (e * 2.0 - f - c) + yValues[d + 1] * (f * 3.0 - e * 5.0 + 2.0) + yValues[d + 2] * (f * -3.0 + e * 4.0 + c) + yValues[d + 3] * (f - e)) * 0.5;
	};
	
	var perm = new Uint8Array([
		151,160,137,91,90,15,
		131,13,201,95,96,53,194,233,7,225,140,36,103,30,69,142,8,99,37,240,21,10,23,
		190, 6,148,247,120,234,75,0,26,197,62,94,252,219,203,117,35,11,32,57,177,33,
		88,237,149,56,87,174,20,125,136,171,168, 68,175,74,165,71,134,139,48,27,166,
		77,146,158,231,83,111,229,122,60,211,133,230,220,105,92,41,55,46,245,40,244,
		102,143,54, 65,25,63,161, 1,216,80,73,209,76,132,187,208, 89,18,169,200,196,
		135,130,116,188,159,86,164,100,109,198,173,186, 3,64,52,217,226,250,124,123,
		5,202,38,147,118,126,255,82,85,212,207,206,59,227,47,16,58,17,182,189,28,42,
		223,183,170,213,119,248,152, 2,44,154,163, 70,221,153,101,155,167, 43,172,9,
		129,22,39,253, 19,98,108,110,79,113,224,232,178,185, 112,104,218,246,97,228,
		251,34,242,193,238,210,144,12,191,179,162,241, 81,51,145,235,249,14,239,107,
		49,192,214, 31,181,199,106,157,184, 84,204,176,115,121,50,45,127, 4,150,254,
		138,236,205,93,222,114,67,29,24,72,243,141,128,195,78,66,215,61,156,180,
		
		151,160,137,91,90,15,
		131,13,201,95,96,53,194,233,7,225,140,36,103,30,69,142,8,99,37,240,21,10,23,
		190, 6,148,247,120,234,75,0,26,197,62,94,252,219,203,117,35,11,32,57,177,33,
		88,237,149,56,87,174,20,125,136,171,168, 68,175,74,165,71,134,139,48,27,166,
		77,146,158,231,83,111,229,122,60,211,133,230,220,105,92,41,55,46,245,40,244,
		102,143,54, 65,25,63,161, 1,216,80,73,209,76,132,187,208, 89,18,169,200,196,
		135,130,116,188,159,86,164,100,109,198,173,186, 3,64,52,217,226,250,124,123,
		5,202,38,147,118,126,255,82,85,212,207,206,59,227,47,16,58,17,182,189,28,42,
		223,183,170,213,119,248,152, 2,44,154,163, 70,221,153,101,155,167, 43,172,9,
		129,22,39,253, 19,98,108,110,79,113,224,232,178,185, 112,104,218,246,97,228,
		251,34,242,193,238,210,144,12,191,179,162,241, 81,51,145,235,249,14,239,107,
		49,192,214, 31,181,199,106,157,184, 84,204,176,115,121,50,45,127, 4,150,254,
		138,236,205,93,222,114,67,29,24,72,243,141,128,195,78,66,215,61,156,180
	]);

	var grad = new Float32Array([
		 1,  1,  0,  1,
		-1,  1,  0,  1,
		 1, -1,  0,  1,
		-1, -1,  0,  1,
		 1,  0,  1,  1,
		-1,  0,  1,  1,
		 1,  0, -1,  1,
		-1,  0, -1,  1,
		 0,  1,  1,  1,
		 0, -1,  1,  1,
		 0,  1, -1,  1,
		 0, -1, -1,  1,
		 1,  1,  0, -1,
		-1,  1,  0, -1,
		 1, -1,  0, -1,
		-1, -1,  0, -1,
		 1,  0,  1, -1,
		-1,  0,  1, -1,
		 1,  0, -1, -1,
		-1,  0, -1, -1,
		 0,  1,  1, -1,
		 0, -1,  1, -1,
		 0,  1, -1, -1,
		 0, -1, -1, -1,
		 1,  1,  1,  0,
		 1,  1, -1,  0,
		 1, -1,  1,  0,
		 1, -1, -1,  0,
		-1,  1,  1,  0,
		-1,  1, -1,  0,
		-1, -1,  1,  0,
		-1, -1, -1,  0
	]);
	
	engine.noise2f = function(x, y)
	{
		var a = x;
		var b = y;
		var c = (a + b) * 0.366;
		var d = Math.floor(a + c);
		var e = Math.floor(b + c);
		var f = (d + e) * 0.2113;
		var g = a - (d - f);
		var h = b - (e - f);
		var i;
		var j;
		if (g > h)
		{
			i = 1;
			j = 0;
		}
		else
		{
			i = 0;
			j = 1;
		}
		var k = g - i + 0.2113;
		var l = h - j + 0.2113;
		var m = g + -0.5774;
		var n = h + -0.5774;
		var o = d & 255;
		var p = e & 255;
		var q = perm[o + perm[p]] % 12 << 2;
		var r = perm[o + i + perm[p + j]] % 12 << 2;
		var s = perm[o + 1 + perm[p + 1]] % 12 << 2;
		var t = Math.max(0.5 - (g * g + h * h), 0.0);
		var u = Math.max(0.5 - (k * k + l * l), 0.0);
		var v = Math.max(0.5 - (m * m + n * n), 0.0);
		var w = t * t;
		var x = u * u;
		var y = v * v;
		return (w * w * (grad[q] * g + grad[q | 1] * h) + x * x * (grad[r] * k + grad[r | 1] * l) + y * y * (grad[s] * m + grad[s | 1] * n)) * 70.0;
	};
	
	engine.noise3f = function(x, y, z)
	{
		var a = x;
		var b = y;
		var c = z;
		var d = (a + b + c) * 0.333333;
		var e = Math.floor(a + d);
		var f = Math.floor(b + d);
		var g = Math.floor(c + d);
		var h = (e + f + g) * 0.166666;
		var i = a - (e - h);
		var j = b - (f - h);
		var k = c - (g - h);
		var l;
		var m;
		var n;
		var o;
		var p;
		var q;
		if (i < j)
		{
			var r;
			var s;
			var t;
			var u;
			if (j < k)
			{
				r = 0;
				s = 1;
				t = 0;
				u = 1;
			}
			else
			{
				var v;
				var w;
				if (i < k)
				{
					v = 0;
					w = 1;
				}
				else
				{
					v = 1;
					w = 0;
				}
				r = 1;
				s = 0;
				t = v;
				u = w;
			}
			l = 0;
			m = r;
			n = s;
			o = t;
			p = 1;
			q = u;
		}
		else
		{
			var x;
			var y;
			var z;
			var A;
			if (j < k)
			{
				var B;
				var C;
				if (i < k)
				{
					B = 0;
					C = 1;
				}
				else
				{
					B = 1;
					C = 0;
				}
				x = B;
				y = C;
				z = 0;
				A = 1;
			}
			else
			{
				x = 1;
				y = 0;
				z = 1;
				A = 0;
			}
			l = x;
			m = 0;
			n = y;
			o = 1;
			p = z;
			q = A;
		}
		var D = i - l + 0.166666;
		var E = j - m + 0.166666;
		var F = k - n + 0.166666;
		var G = i - o + 0.333333;
		var H = j - p + 0.333333;
		var I = k - q + 0.333333;
		var J = i + -0.5;
		var K = j + -0.5;
		var L = k + -0.5;
		var M = e & 255;
		var N = f & 255;
		var O = g & 255;
		var P = perm[M + perm[N + perm[O]]] % 12 << 2;
		var Q = perm[M + l + perm[N + m + perm[O + n]]] % 12 << 2;
		var R = perm[M + o + perm[N + p + perm[O + q]]] % 12 << 2;
		var S = perm[M + 1 + perm[N + 1 + perm[O + 1]]] % 12 << 2;
		var T = Math.max(0.6 - (i * i + j * j + k * k), 0.0);
		var U = Math.max(0.6 - (D * D + E * E + F * F), 0.0);
		var V = Math.max(0.6 - (G * G + H * H + I * I), 0.0);
		var W = Math.max(0.6 - (J * J + K * K + L * L), 0.0);
		var X = T * T;
		var Y = U * U;
		var Z = V * V;
		var ab = W * W;
		return (X * X * (grad[P] * i + grad[P | 1] * j + grad[P | 2] * k) + Y * Y * (grad[Q] * D + grad[Q | 1] * E + grad[Q | 2] * F) + Z * Z * (grad[R] * G + grad[R | 1] * H + grad[R | 2] * I) + ab * ab * (grad[S] * J + grad[S | 1] * K + grad[S | 2] * L)) * 32.0;
	};

	// new Decompressor(compressed) returns a decompressor object working on given compressed data (Uint8Array) with these methods:
	//   - decompress8(size): decompress into new Uint8Array and return it
	//   - decompress16(size): decompress into new Uint16Array and return it
	//   - decompress32(size): decompress into new Uint32Array and return it
	//   - decompress(data): decompress 8, 16 or 32 bit quantities into given array of given length
	engine.Decompressor = function(compressed)
	{
		this.compressed = compressed;
		this.index = 4;
		
		// init range decoder with first 4 bytes
		this.range = 0xffffffff;
		this.code = compressed[0] * 0x1000000 + compressed[1] * 0x10000 + compressed[2] * 256 + compressed[3];

		// init weights
		this.typeWeight = new Uint16Array(1);
		this.offsetWeights = new Uint16Array(64);
		this.lengthWeights = new Uint16Array(64);
		this.literalWeights = new Uint16Array(64);
		this.typeWeight[0] = 0x800;
		for (var i = 0; i < 64; ++i)
		{
			this.offsetWeights[i] = 0x800;
			this.lengthWeights[i] = 0x800;
			this.literalWeights[i] = 0x800;
		}
	
		this.decompress8 = function(size)
		{
			var d = new Uint8Array(size);
			this.decompress(d);
			return d;
		};
		this.decompress16 = function(size)
		{
			var d = new Uint16Array(size);
			this.decompress(d);
			return d;
		}
		this.decompress32 = function(size)
		{
			var d = new Uint32Array(size);
			this.decompress(d);
			return d;
		}
		this.decompress = function(data)
		{
			// decompress
			var pos = 0;
			var size = data.length;
			while (pos < size)
			{
				if (this.readBitAndUpdateWeight(this.typeWeight, 0) == 0)
				{
					// literal
					data[pos++] = this.readUniversalCode(this.literalWeights);
				}
				else
				{
					// dictionary reference
					var offset = this.readUniversalCode(this.offsetWeights) + 1;
					var length = this.readUniversalCode(this.lengthWeights) + 3;
					for (var i = 0; i < length; ++i)
					{
						data[pos] = data[pos - offset];
						++pos;
					}
				}
			}
			
			// regenerate original values
			var sum = 0;
			for (pos = 0; pos < size; ++pos)
			{				
				// convert from signed magnitude to two's complement (0->0, 1->-1, 2->1, 3->-2, 4->2, 254->127, 255->-128)
				var d = data[pos];
				sum = data[pos] = sum + (d & 1 ? -(d >>> 1) - 1 : d >>> 1);
			}
		}
		
		this.readBitAndUpdateWeight = function(weight, i)
		{
			// normalize range decoder
			while (this.range < 0x1000000)
			{
				this.code = this.code * 256 + this.compressed[this.index];
				this.range = this.range * 256;
				
				++this.index;
			}
		
			var threshold = (this.range >>> 12) * weight[i];
			if (this.code < threshold)
			{
				this.range = threshold;
				weight[i] += (0x1000 - weight[i]) >> 4;
				return 0;
			}
			this.range -= threshold;
			this.code -= threshold;
			weight[i] -= weight[i] >> 4;
			return 1;		
		}
		
		this.readUniversalCode = function(weights)
		{
			// number of ones is number of bits
			var numBits = 0;
			while (this.readBitAndUpdateWeight(weights, numBits) == 1)
				++numBits;
			if (!numBits) {
				return 0;}
		
			// read value (msb first) without leading one
			var value = 1;
			for (var i = numBits - 2; i >= 0; --i)
				value = (value << 1) | this.readBitAndUpdateWeight(weights, 33 + i);
			return value;		
		}
	};

	return engine;
}();
