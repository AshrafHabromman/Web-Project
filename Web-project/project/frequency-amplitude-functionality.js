


let s1 = function( sketch ) {

    sketch.canvasPerant = "";
    sketch.diameter = 0;
    sketch.shift = 0.0;

    sketch.frequency = {value:0};
    sketch.yArray = [];

    sketch.setup = function() {
        let canvasWidth = document.getElementById(sketch.canvasPerant).offsetWidth;
        //let canvasHieght = document.getElementById(sketch.canvasPerant).offsetHeight;
        sketch.can = sketch.createCanvas(canvasWidth, 214);
        sketch.can.parent(sketch.canvasPerant);
    }
    sketch.draw = function() {
        //for canvas 1
        sketch.background('white');

        sketch.translate(75,75);

        sketch.strokeWeight(4);
        sketch.noFill();
        sketch.stroke('black');    //color
        sketch.ellipse(30,30,sketch.diameter,sketch.diameter);    //center of circle is at (30,30) recording to (200,200)


        sketch.x = sketch.diameter*0.5*sketch.cos(sketch.frequency.value);      //cos = المجاور/الوتر
        sketch.y = sketch.diameter*0.5*sketch.sin(sketch.frequency.value);

        sketch.line(30, 30, sketch.x+30, sketch.y+30);

        sketch.stroke(95, 168, 211);
        sketch.ellipse(sketch.x+30, sketch.y+30, 10,10);


        sketch.yArray.unshift(sketch.y+30);      //save last value of y in the top of array
        sketch.translate(200,0);      //shift the reference point to 400, 200

        sketch.beginShape();
        sketch.noFill();
        sketch.stroke(95, 168, 211);      //color

        sketch.line(sketch.x-170,sketch.y+30,0,sketch.y+30);
        let t=0
        for(let j=0; j< sketch.yArray.length; j+=.8){    // j means frequency

            sketch.vertex(j,sketch.yArray[t]);
            t++;
        }
        sketch.endShape();

        if(sketch.yArray.length > 600){
            sketch.yArray.pop();
        }

        sketch.frequency.value += sketch.shift;

    }
};

// create a new instance of p5 and pass in the function for sketch 1
let xFrecuency = Math.PI/100;
let xDiameter = Math.PI * 200;
let firstCanvas = new p5(s1);

firstCanvas.canvasPerant = "canvas1";
firstCanvas.shift = xFrecuency;
firstCanvas.diameter = xDiameter / Math.PI; // = 200 

let secondCanvas = new p5(s1);
secondCanvas.canvasPerant="canvas2";
secondCanvas.shift = xFrecuency*2;
secondCanvas.diameter =  xDiameter / Math.PI; // = 200 

let thirdCanvas = new p5(s1);
thirdCanvas.canvasPerant="canvas3";
thirdCanvas.shift = xFrecuency*4;
thirdCanvas.diameter = xDiameter / Math.PI; // = 200 

//amplitude
let fourthCanvas = new p5(s1);
fourthCanvas.canvasPerant="canvas4";
fourthCanvas.shift = xFrecuency*2;
fourthCanvas.diameter = xDiameter / Math.PI;

let fifthCanvas = new p5(s1);
fifthCanvas.canvasPerant="canvas5";
fifthCanvas.shift = xFrecuency*2;
fifthCanvas.diameter = (xDiameter / Math.PI)*0.5;

let sixthCanvas = new p5(s1);
sixthCanvas.canvasPerant="canvas6";
sixthCanvas.shift = xFrecuency*2;
sixthCanvas.diameter = (xDiameter / Math.PI)*0.25;

/*
let diameter = 200*Math.PI;
let frequency1 = {value:0};
let shift1 = 0.05;
let yArray = [];
let xxS = [];

let frequency2 = {value:0};
let shift2 = 0.05;
let yArray2 = [];
let xxxS = [];

let s1 = function(sketch ) {
    sketch.setup = function( ) {
        let canvasWidth = document.getElementById('canvas1').offsetWidth;
        //let canvasHieght = document.getElementById('sineWaveCanvas').offsetHeight;
        let canvas1 = sketch.createCanvas(canvasWidth, 250);
        canvas1.parent('canvas1');

    }
    sketch.draw = function() {
        //for canvas 1
        sketch.background('white');
        sketch.translate(75,75);
        sine_wave(frequency1,shift1,diameter/Math.PI,yArray,xxxS);


        xxS = [];

    }
};
// create a new instance of p5 and pass in the function for sketch 1
new p5(s1);

let s2 = function(sketch) {
    sketch.setup = function() {
        let canvasWidth = document.getElementById('canvas2').offsetWidth;
        //let canvasHieght = document.getElementById('sineWaveCanvas').offsetHeight;
        let canvas2 =sketch.createCanvas(canvasWidth, 250);
        canvas2.parent('canvas2');

    }
    sketch.draw = function() {
        //for canvas 1
        sketch.background('white');
        sketch.translate(75,75);
        sine_wave(frequency2,shift2,diameter/Math.PI,yArray2,xxS);

        xxS = [];
    }
};
// create a new instance of p5 and pass in the function for sketch 1
new p5(s2);
*/