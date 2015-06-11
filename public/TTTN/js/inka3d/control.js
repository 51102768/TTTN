var inka3dControl = function()
{
    'use strict';    
    var control = {};

	// turntable like camera, y is up-vector
	// tx, ty and tz are camera target position
	// rx, ry and rz are camera rotation angles (rad)
	// di is camera distance from target
	// fr is an array where the resulting view matrix is written into (16 values, row major)
	control.cameraY = function(tx, ty, tz, rx, ry, rz, di, fr)
	{
		var a = rx * 0.5;
		var b = ry * 0.5;
		var c = rz * 0.5;
		var d = Math.cos(a);
		var e = Math.sin(a);
		var f = Math.cos(b);
		var g = Math.sin(b);
		var h = Math.cos(c);
		var i = Math.sin(c);
		var j = f * e * h + g * d * i;
		var k = f * -e * i + g * d * h;
		var l = f * d * i - g * e * h;
		var m = f * d * h - g * -e * i;
		var n = j * j;
		var o = k * k;
		var p = l * l;
		var q = m * m;
		var r = j * k;
		var s = k * l;
		var t = j * l;
		var u = m * j;
		var v = m * k;
		var w = m * l;
		var x = q + n - o - p;
		var y = (r + w) * 2.0;
		var z = (t - v) * 2.0;
		var A = (r - w) * 2.0;
		var B = q - n + o - p;
		var C = (s + u) * 2.0;
		var D = (t + v) * 2.0;
		var E = (s - u) * 2.0;
		var F = q - n - o + p;
		var G = di;
		var H = -(tx + D * G);
		var I = -(ty + E * G);
		var J = -(tz + F * G);
		fr[0] = x;
		fr[1] = A;
		fr[2] = D;
		fr[3] = 0.0;
		fr[4] = y;
		fr[5] = B;
		fr[6] = E;
		fr[7] = 0.0;
		fr[8] = z;
		fr[9] = C;
		fr[10] = F;
		fr[11] = 0.0;
		fr[12] = x * H + y * I + z * J;
		fr[13] = A * H + B * I + C * J;
		fr[14] = D * H + E * I + F * J;
		fr[15] = 1.0; 
	};
	
	// turntable like camera, z is up-vector
	// tx, ty and tz are camera target position
	// rx, ry and rz are camera rotation angles (rad)
	// di is camera distance from target
	// fr is an array where the resulting view matrix is written into (16 values, row major)
	control.cameraZ = function(tx, ty, tz, rx, ry, rz, di, fr)
	{
		var a = rx * 0.5;
		var b = rz * 0.5;
		var c = ry * 0.5;
		var d = Math.cos(a);
		var e = Math.sin(a);
		var f = Math.cos(b);
		var g = Math.sin(b);
		var h = Math.cos(c);
		var i = Math.sin(c);
		var j = h * e * f - i * d * g;
		var k = h * d * g + i * e * f;
		var l = h * e * g + i * d * f;
		var m = h * d * f - i * e * g;
		var n = m * 0.707107 + j * 0.707107;
		var o = k * 0.707107 + l * 0.707107;
		var p = l * 0.707107 - k * 0.707107;
		var q = m * 0.707107 - j * 0.707107;
		var r = n * n;
		var s = o * o;
		var t = p * p;
		var u = q * q;
		var v = n * o;
		var w = o * p;
		var x = n * p;
		var y = q * n;
		var z = q * o;
		var A = q * p;
		var B = u + r - s - t;
		var C = (v + A) * 2.0;
		var D = (x - z) * 2.0;
		var E = (v - A) * 2.0;
		var F = u - r + s - t;
		var G = (w + y) * 2.0;
		var H = (x + z) * 2.0;
		var I = (w - y) * 2.0;
		var J = u - r - s + t;
		var K = di;
		var L = -(tx + H * K);
		var M = -(ty + I * K);
		var N = -(tz + J * K);
		fr[0] = B;
		fr[1] = E;
		fr[2] = H;
		fr[3] = 0.0;
		fr[4] = C;
		fr[5] = F;
		fr[6] = I;
		fr[7] = 0.0;
		fr[8] = D;
		fr[9] = G;
		fr[10] = J;
		fr[11] = 0.0;
		fr[12] = B * L + C * M + D * N;
		fr[13] = E * L + F * M + G * N;
		fr[14] = H * L + I * M + J * N;
		fr[15] = 1.0;
	};

	// mouse and touch input handler
	// new control.Input(canvas) returns an input handler object with these properties:
	//   - positionX/Y: mouse/touch position in range [-1 1]
	//   - pressed: true if mouse button is pressed or touch is active
	//   - hover(dx, dy): function that is called when mouse moves while hovering (position may be accessed via this)
	//   - moveStart(): function that is called when move gesture starts (position may be accessed via this)
	//   - moveEnd(): function that is called when move gesture ends (position may be accessed via this)
	//   - move(dx, dy): function that is called when move by given delta occurs (position may be accessed via this)
	//   - scroll(dx, dy): function that is called when scroll by given delta occurs
	//   - zoomRotate(zoom, rotate): function that is called when zoom or rotate gesture occurs
	control.Input = function(canvas)
	{
		this.positionX = 0;
		this.positionY = 0;
		this.pressed = false;
		this.hover = function(dx, dy) {};
		this.moveStart = function(dx, dy) {};
		this.moveEnd = function(dx, dy) {};
		this.move = function(dx, dy) {};
		this.scroll = function(dx, dy) {};
		this.zoomRotate = function(zoom, rotate) {}

		
		var input = this;
		var mousePressed = false;
		var touching = false;
		var touchScale = 1;
	
		function mouseDown(e)
		{
			if (!touching)
			{
				input.positionX = (e.pageX - canvas.offsetLeft + 0.5) / canvas.offsetWidth * 2 - 1;
				input.positionY = (e.pageY - canvas.offsetTop + 0.5) / canvas.offsetHeight * -2 + 1;
				input.pressed = true;
				mousePressed = true;
				input.moveStart(0, 0);
			}
		}
		
		function mouseUp(e)
		{
			if (mousePressed)
			{
				input.pressed = false;			 
				mousePressed = false;
				input.moveEnd(0, 0);
			}
		}
		
		function mouseMove(e)
		{
			if (!touching)
			{
				var x = (e.pageX - canvas.offsetLeft + 0.5) / canvas.offsetWidth * 2 - 1;
				var y = (e.pageY - canvas.offsetTop + 0.5) / canvas.offsetHeight * -2 + 1;
				var dx = x - input.positionX;
				var dy = y - input.positionY;
				input.positionX = x;
				input.positionY = y;
				if (mousePressed)					
					input.move(dx, dy);
				else
					input.hover(dx, dy);
			}
			return true;
		}
		
		function mouseWheel(e)
		{
			var dy = e.wheelDelta ? e.wheelDelta / 120 : (e.detail ? e.detail / -3 : 0);
			input.scroll(0, dy);
			e.preventDefault();
			return true;
		}
				
		function touchChange(e)
		{
			if (touching = (e.touches.length > 0))
			{
				var t0 = e.touches[0];
				input.positionX = (t0.pageX - canvas.offsetLeft + 0.5) / canvas.offsetWidth * 2 - 1;
				input.positionY = (t0.pageY - canvas.offsetTop + 0.5) / canvas.offsetHeight * -2 + 1;
				input.pressed = true;
				input.moveStart(0, 0);			
			}
			else
			{
				input.moveEnd(0, 0);			
				input.positionValid = false;
			}

			if (e.touches.length == 2)
			{
				var t0 = e.touches[0];
				var t1 = e.touches[1];
				var x = t1.pageX - t0.pageX;
				var y = t1.pageY - t0.pageY;
				touchScale = Math.sqrt(x*x + y*y);
			}
		};
		
		function touchMove(e)
		{
			if (e.touches.length > 0)
			{
				var t0 = e.touches[0];
				var x = (t0.pageX - canvas.offsetLeft + 0.5) / canvas.offsetWidth * 2 - 1;
				var y = (t0.pageY - canvas.offsetTop + 0.5) / canvas.offsetHeight * -2 + 1;
				var dx = x - input.positionX;
				var dy = y - input.positionY;
				input.positionX = x;
				input.positionY = y;
				input.move(dx, dy);
			}
			
			if (e.touches.length == 2)
			{
				var t0 = e.touches[0];
				var t1 = e.touches[1];
				var x = t1.pageX - t0.pageX;
				var y = t1.pageY - t0.pageY;
				var s = Math.sqrt(x*x + y*y);
				input.zoomRotate(s / touchScale, 0);
				touchScale = s;
			}
			return false;
		};
	
		// install event listeners
		canvas.onmousedown = mouseDown;
		canvas.onmouseup = mouseUp;
		canvas.onselectstart = function (e) {return false;}
		canvas.onmousemove = mouseMove;
		if (canvas.addEventListener)
			canvas.addEventListener('DOMMouseScroll', mouseWheel, false);
		canvas.onmousewheel = mouseWheel;
		canvas.ontouchend = canvas.ontouchstart = touchChange;
		canvas.ontouchmove = touchMove;
	};
	
	return control;
}();
