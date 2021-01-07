

let diameter = 200*Math.PI;
let frequency = {value:0};
let shift1 = 0.05;
let yArray = [];
let xxS = [];
let s1 = function() {
    setup = function() {
        let canvasWidth = document.getElementById('sineWaveCanvas').offsetWidth;
        let canvasHieght = document.getElementById('sineWaveCanvas').offsetHeight;
        can = createCanvas(canvasWidth-100, 214);
        can.parent('sineWaveCanvas');

    }
    draw = function() {
        //for canvas 1
        background('white');
        translate(75,75);
        sine_wave(frequency,shift1,diameter/Math.PI,yArray,xxS);


    }
};

// create a new instance of p5 and pass in the function for sketch 1
new p5(s1);
