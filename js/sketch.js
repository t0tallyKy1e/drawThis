/*
	Kyle Demers
	Web Dev 2
	drawThis - p5.js used to create canvas in a very similar way to processing
*/

function setup(){
	var windowWidth = 400;
	var windowHeight = 400;
	
	var canvas = createCanvas(windowWidth,windowHeight);
	canvas.parent('canvasSpace');
	
	background(240,240,240);
  
	var notey = 60;
	var noteInt = 0;
	var noteLine = color(26, 93, 234);
	
	stroke(noteLine);
	while(notey < windowWidth && noteInt < 40){
		rect(0, notey, windowWidth, 1);
		notey+=20;
		noteInt++;
	}
	
	stroke(255,0,0);
	rect(60, 0, 1, windowWidth);
	rect(65, 0, 1, windowWidth);
	
	stroke(0,0,0);
  
	strokeWeight(10);
	smooth();
	frameRate(frameRate());
}//close setup

function mouseDragged(){
	point(mouseX, mouseY);
}//close mousePressed

function mousePressed(){
	point(mouseX, mouseY);
}

function touchMoved(){
	point(touchX, touchY);
	return false;
}