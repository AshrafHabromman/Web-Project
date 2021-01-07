

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

        let canvasWidth = document.getElementById(sketch.canvasPerant).offsetWidth;
        //let canvasHieght = document.getElementById(sketch.canvasPerant).offsetHeight;
        sketch.can = sketch.createCanvas(canvasWidth, sketch.diameter + (sketch.diameter*0.4));
        sketch.can.parent(sketch.canvasPerant);

        if(sketch.canvasPerant == "canvas5"){
            sketch.fifthCanvasSlider = sketch.createSlider(2,100,7,1);
            sketch.fifthCanvasSlider.parent('sliderDiv');
            sketch.fifthCanvasSlider.style('width', '300px');

        }
    }
    sketch.draw = function() {

        if(sketch.canvasPerant == "canvas5"){
            sketch.numberOfLoop = sketch.fifthCanvasSlider.value();
            document.getElementById('sliderValue').innerText = sketch.fifthCanvasSlider.value();
        }
        //console.log("ss"+sketch.canvasPerant);
        sketch.x = 0;
        sketch.y = 0;
        sketch.background('white');

        sketch.translate(sketch.diameter/2,200);
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

        sketch.translate(200,0);      //shift the reference point to 400, 200

        sketch.beginShape();
        sketch.noFill();
        sketch.stroke(95, 168, 211);      //color
        sketch.line(sketch.x-200,0.5-sketch.y,0,0.5-sketch.y);
        let t=0

        for(let j=0; j< sketch.yArray.length; j+=.8){    // j means frequency

            sketch.vertex(j,sketch.yArray[t]*-1);
            t++;
        }
        sketch.endShape();

        if(sketch.yArray.length > 600){
            sketch.yArray.pop();
        }

        sketch.frequency.value -= sketch.shift;

    }
};

let firstCanvas = new p5(sawtooth);

firstCanvas.canvasPerant = "canvas1";
firstCanvas.shift = Math.PI / 150 ;
firstCanvas.diameter = 300;

let secondCanvas = new p5(sawtooth);

secondCanvas.canvasPerant = "canvas2";
secondCanvas.shift = Math.PI / 150 ;
secondCanvas.diameter = 300;
secondCanvas.numberOfLoop = 3;

let thirdCanvas = new p5(sawtooth);

thirdCanvas.canvasPerant = "canvas3";
thirdCanvas.shift = Math.PI / 150 ;
thirdCanvas.diameter = 300;
thirdCanvas.numberOfLoop = 4;

let fourthCanvas = new p5(sawtooth);

fourthCanvas.canvasPerant = "canvas4";
fourthCanvas.shift = Math.PI / 150 ;
fourthCanvas.diameter = 300;
fourthCanvas.numberOfLoop = 5;

let fifthCanvas = new p5(sawtooth);


fifthCanvas.canvasPerant = "canvas5";
fifthCanvas.shift = Math.PI / 150 ;
fifthCanvas.diameter = 300;
