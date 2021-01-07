


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
        //let canvasHieght = document.getElementById(sketch.canvasPerant).offsetHeight;
        sketch.can = sketch.createCanvas(canvasWidth, sketch.diameter *2);
        sketch.can.parent(sketch.canvasPerant);

        if(sketch.canvasPerant == "canvas5"){
            sketch.fifthCanvasSlider = sketch.createSlider(2,100,10,1);
            sketch.fifthCanvasSlider.parent('sliderDiv');
            sketch.fifthCanvasSlider.style('width', '300px');

        }
    }
    sketch.draw = function() {

        if(sketch.canvasPerant == "canvas5"){
            sketch.numberOfLoop = sketch.fifthCanvasSlider.value();
            document.getElementById('sliderValue').innerText = sketch.fifthCanvasSlider.value();
        }
        sketch.x = 0;
        sketch.y = 0;
        sketch.background('white');

        sketch.translate(sketch.diameter,sketch.diameter);
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

        sketch.translate(200,0);      //shift the reference point to 400, 200

        sketch.beginShape();
        sketch.noFill();
        sketch.stroke(95, 168, 211);      //color
        sketch.line(sketch.x-200,sketch.y,0,sketch.y);
        let t=0

        for(let j=0; j< sketch.yArray.length; j+=.8){    // j means frequency

            sketch.vertex(j,sketch.yArray[t]);
            t++;
        }
        sketch.endShape();

        if(sketch.yArray.length > 700){
            sketch.yArray.pop();
        }

        sketch.frequency.value -= sketch.shift;

    }
};

let firstCanvas = new p5(triangular);

firstCanvas.canvasPerant = "canvas1";
firstCanvas.shift = Math.PI / 150 ;
firstCanvas.diameter = 100;
firstCanvas.numberOfLoop = 2;

let secondCanvas = new p5(triangular);

secondCanvas.canvasPerant = "canvas2";
secondCanvas.shift = Math.PI / 150 ;
secondCanvas.diameter = 100;
secondCanvas.numberOfLoop = 4;

let thirdCanvas = new p5(triangular);

thirdCanvas.canvasPerant = "canvas3";
thirdCanvas.shift = Math.PI / 150 ;
thirdCanvas.diameter = 100;
thirdCanvas.numberOfLoop = 6;

let fourthCanvas = new p5(triangular);

fourthCanvas.canvasPerant = "canvas4";
fourthCanvas.shift = Math.PI / 150 ;
fourthCanvas.diameter = 100;
fourthCanvas.numberOfLoop = 8;

let fifthCanvas = new p5(triangular);

fifthCanvas.canvasPerant = "canvas5";
fifthCanvas.shift = Math.PI / 150;
fifthCanvas.diameter = 100;
//fifthCanvas.numberOfLoop = 4;

