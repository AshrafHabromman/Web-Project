
let sawtooth = function( sketch ) {

    sketch.canvasPerant = "";
    sketch.diameter = 0;
    sketch.shift = 0.0;

    sketch.frequency = {value:0};
    sketch.yArray = [];
    sketch.prevX = 0;
    sketch.prevY = 0;
    sketch.x = 0;
    sketch.y = 0;
    sketch.radius=0;
    sketch.numberOfLoop = 2;

    sketch.setup = function() {

        sketch.canvasWidth = document.getElementById(sketch.canvasPerant).offsetWidth;
        let canvasHieght = document.getElementById(sketch.canvasPerant).offsetHeight;
        sketch.can = sketch.createCanvas(sketch.canvasWidth,canvasHieght);
        sketch.can.parent(sketch.canvasPerant);


    }
    sketch.draw = function() {


        console.log("ss"+sketch.canvasPerant);
        sketch.x = 0;
        sketch.y = 0;
        sketch.background('#edf2fb');

        sketch.translate(sketch.diameter/2,sketch.diameter*0.7);
        sketch.strokeWeight(4);
        sketch.noFill();
        sketch.stroke('black');    //color
        for(let i=1 ; i<sketch.numberOfLoop ; i++){
            sketch.prevX = sketch.x;
            sketch.prevY = sketch.y;
            sketch.radius = sketch.diameter*(1/ (i * Math.PI))

            sketch.x += sketch.radius*sketch.cos(i * sketch.frequency.value);      //cos = المجاور/الوتر
            sketch.y += sketch.radius*sketch.sin(i * sketch.frequency.value);


            sketch.ellipse(sketch.prevX,sketch.prevY, sketch.radius *2);

            sketch.line(sketch.prevX, sketch.prevY, sketch.x, sketch.y);

            //sketch.stroke(95, 168, 211);
            //sketch.ellipse(sketch.x+30, sketch.y+30, 10,10);

        }
        //center of circle is at (30,30) recording to (200,200)
        sketch.y = 0.5 - sketch.y;
        sketch.yArray.unshift(sketch.y);      //save last value of y in the top of array

        sketch.translate(100,0);      //shift the reference point to 400, 200

        sketch.beginShape();
        sketch.noFill();
        sketch.stroke(95, 168, 211);      //color
        sketch.line(sketch.x-100,0.5-sketch.y,0,0.5-sketch.y);
        let t=0

        for(let j=0; j< sketch.yArray.length; j+=.8){    // j means frequency

            sketch.vertex(j,sketch.yArray[t]*-1);
            t++;
        }
        sketch.endShape();

        if(sketch.yArray.length > 200){
            sketch.yArray.pop();
        }

        sketch.frequency.value -= sketch.shift;

    }
};
/////////////////////////////////////////////////////////////square
let square = function( sketch ) {

    sketch.canvasPerant = "";
    sketch.diameter = 0;
    sketch.shift = 0.0;

    sketch.frequency = {value:0};
    sketch.yArray = [];
    sketch.prevX = 0;
    sketch.prevY = 0;
    sketch.x = 0;
    sketch.y = 0;
    sketch.radius=0;
    sketch.numberOfLoop = 2;

    sketch.setup = function() {

        let canvasWidth = document.getElementById(sketch.canvasPerant).offsetWidth;
        let canvasHieght = document.getElementById(sketch.canvasPerant).offsetHeight;
        sketch.can = sketch.createCanvas(canvasWidth, canvasHieght);
        sketch.can.parent(sketch.canvasPerant);


    }
    sketch.draw = function() {


        sketch.x = 0;
        sketch.y = 0;
        sketch.background('#edf2fb');

        sketch.translate(sketch.diameter/2,sketch.diameter*0.7);
        sketch.strokeWeight(4);
        sketch.noFill();
        sketch.stroke('black');    //color
        for(let i=1 ; i<sketch.numberOfLoop ; i+=2){
            sketch.prevX = sketch.x;
            sketch.prevY = sketch.y;
            sketch.radius = sketch.diameter*(1/ (i * Math.PI))

            sketch.x += sketch.radius*sketch.cos(i * sketch.frequency.value);      //cos = المجاور/الوتر
            sketch.y += sketch.radius*sketch.sin(i * sketch.frequency.value);


            sketch.ellipse(sketch.prevX,sketch.prevY, sketch.radius *2);

            sketch.line(sketch.prevX, sketch.prevY, sketch.x, sketch.y);

            //sketch.stroke(95, 168, 211);
            //sketch.ellipse(sketch.x+30, sketch.y+30, 10,10);

        }
        //center of circle is at (30,30) recording to (200,200)
        sketch.yArray.unshift(sketch.y);      //save last value of y in the top of array

        sketch.translate(100,0);      //shift the reference point to 400, 200

        sketch.beginShape();
        sketch.noFill();
        sketch.stroke(95, 168, 211);      //color
        sketch.line(sketch.x-100,sketch.y,0,sketch.y);
        let t=0

        for(let j=0; j< sketch.yArray.length; j+=.8){    // j means frequency

            sketch.vertex(j,sketch.yArray[t]);
            t++;
        }
        sketch.endShape();

        if(sketch.yArray.length > 200){
            sketch.yArray.pop();
        }

        sketch.frequency.value -= sketch.shift;

    }
};
///////////////////////////////////////triangular


let triangular = function( sketch ) {

    sketch.canvasPerant = "";
    sketch.diameter = 0;
    sketch.shift = 0.0;

    sketch.frequency = {value:0};
    sketch.yArray = [];
    sketch.prevX = 0;
    sketch.prevY = 0;
    sketch.x = 0;
    sketch.y = 0;
    sketch.radius=0;
    sketch.numberOfLoop = 2;

    sketch.setup = function() {

        let canvasWidth = document.getElementById(sketch.canvasPerant).offsetWidth;
        let canvasHieght = document.getElementById(sketch.canvasPerant).offsetHeight;
        sketch.can = sketch.createCanvas(canvasWidth, canvasHieght);
        sketch.can.parent(sketch.canvasPerant);


    }
    sketch.draw = function() {


        sketch.x = 0;
        sketch.y = 0;
        sketch.background('#edf2fb');

        sketch.translate(sketch.diameter*1.2,sketch.diameter*1.8);
        sketch.strokeWeight(4);
        sketch.noFill();
        sketch.stroke('black');    //color
        for(let i=1 ; i<sketch.numberOfLoop ; i+=2){
            sketch.prevX = sketch.x;
            sketch.prevY = sketch.y;
            sketch.radius = sketch.diameter*((8 * ((-1) ** ((i-1)/2)))/((Math.PI ** 2)*(i ** 2)));

            sketch.x += sketch.radius*sketch.cos(i * sketch.frequency.value);      //cos = المجاور/الوتر
            sketch.y += sketch.radius*sketch.sin(i * sketch.frequency.value);

            sketch.ellipse(sketch.prevX,sketch.prevY, sketch.radius *2);

            sketch.line(sketch.prevX, sketch.prevY, sketch.x, sketch.y);

            //sketch.stroke(95, 168, 211);
            //sketch.ellipse(sketch.x+30, sketch.y+30, 10,10);

        }
        //center of circle is at (30,30) recording to (200,200)
        sketch.yArray.unshift(sketch.y);      //save last value of y in the top of array

        sketch.translate(100,0);      //shift the reference point to 400, 200

        sketch.beginShape();
        sketch.noFill();
        sketch.stroke(95, 168, 211);      //color
        sketch.line(sketch.x-100,sketch.y,0,sketch.y);
        let t=0

        for(let j=0; j< sketch.yArray.length; j+=.8){    // j means frequency

            sketch.vertex(j,sketch.yArray[t]);
            t++;
        }
        sketch.endShape();

        if(sketch.yArray.length > 200){
            sketch.yArray.pop();
        }

        sketch.frequency.value -= sketch.shift;

    }
};


console.log("hiii");

let sawCanvas = new p5(sawtooth);

sawCanvas.canvasPerant = "sawCanvas";
sawCanvas.shift = Math.PI / 50 ;
sawCanvas.diameter = 150;
sawCanvas.numberOfLoop = 9;


let squareCanvas = new p5(square);

squareCanvas.canvasPerant = "squareCanvas";
squareCanvas.shift = Math.PI / 50 ;
squareCanvas.diameter = 150;
squareCanvas.numberOfLoop = 15;

let triangularCanvas = new p5(triangular);

triangularCanvas.canvasPerant = "triCanvas";
triangularCanvas.shift = Math.PI / 50 ;
triangularCanvas.diameter = 60;
triangularCanvas.numberOfLoop = 7;

let frequencyAmplitudeCanvas = new p5(square);

frequencyAmplitudeCanvas.canvasPerant = "frequencyAmplitudeCanvas";
frequencyAmplitudeCanvas.shift = Math.PI / 50 ;
frequencyAmplitudeCanvas.diameter = 150;
frequencyAmplitudeCanvas.numberOfLoop = 2;