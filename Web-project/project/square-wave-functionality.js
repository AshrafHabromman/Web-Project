let time = 0;
let wave = [];
let path = [];

let slider;

let bossFrequency = Math.PI / 100;

let x=0;
let y=0;
let i=0 ;
let yS = [] ,yS2 = [] , yS3 = [];
let xS = [] , xS2 = [] , xS3 = [];

let frequency1 = {value:0};

let frequency2 = {value:0};

let frequency3 = {value:0};
let can ;

let counter =0;

let circle_diameter = 200 * Math.PI;

function setup() {

    // Create Canvas of given size 
    let canvasWidth = document.getElementById('squareWave').offsetWidth;
    let canvasHieght = document.getElementById('squareWave').offsetHeight;
    can = createCanvas(canvasWidth, canvasHieght);
    can.parent('squareWave');

    slider = createSlider(1, 100, 5, 1);
    slider.parent('sliderDiv');
    slider.style('width', '300px');

}

function draw() {

    background('white');

    translate(75,75);    //reference point is at (200,200)
    sine_wave(frequency1,bossFrequency,circle_diameter/Math.PI,yS,xS);

    translate(-275,-75);

    translate(75,250);
    sine_wave(frequency2,bossFrequency*3,circle_diameter/(3*Math.PI),yS2,xS2);

    translate(-275,-75);

    translate(75,200);

    sine_wave(frequency3,bossFrequency*5,circle_diameter/(5*Math.PI),yS3,xS3);


    translate(-275,-75);

    translate(75,250);

    stroke('black');
    ellipse(30, 30, circle_diameter/Math.PI, circle_diameter/Math.PI);
    line(30, 30, xS[0]+30, yS[0]);

    ellipse(xS[0]+30, yS[0], circle_diameter/(3*Math.PI), circle_diameter/(3*Math.PI));
    line(xS[0]+30, yS[0], xS[0]+xS2[0]+30, yS[0]+yS2[0]-30);

    ellipse(xS[0]+xS2[0]+30, yS[0]+yS2[0]-30, circle_diameter/(5*Math.PI), circle_diameter/(5*Math.PI));
    line(xS[0]+xS2[0]+30, yS[0]+yS2[0]-30, xS[0]+xS2[0]+xS3[0]+30, yS[0]+yS2[0]+yS3[0]-60);

    stroke(95, 168, 211);
    line(xS[0]+xS2[0]+xS3[0]+30, yS[0]+yS2[0]+yS3[0]-60, 200,  yS[0] + yS2[0]+ yS3[0]-60);


    ellipse(xS[0]+30, yS[0], 10, 10);          //small ellipse
    ellipse(xS[0]+xS2[0]+30, yS[0]+yS2[0]-30, 10, 10);          //small ellipse
    ellipse( xS[0]+xS2[0]+xS3[0]+30, yS[0]+yS2[0]+yS3[0]-60, 10, 10);          //small ellipse

    beginShape();
    translate(200,-60);
    noFill();
    strokeWeight(4);

    let t=0
    for(let j=0; j< yS2.length; j+=.8){    // j means frequency

        vertex(j, yS[t] + yS2[t]+ yS3[t]);
        t++;
    }
    endShape();
    /*counter++;
    if(counter == 1000)
        noLoop();*/


    let x = 0;
    let y = 0;

    translate(-275,-15);

    translate(100,400);
    document.getElementById('sliderValue').innerText = slider.value();

    for (let i = 0; i < slider.value(); i++) {
        let prevx = x;
        let prevy = y;

        let n = i * 2 + 1;
        let radius = 75 * (4 / (n * PI));
        x += radius * cos(n * time);
        y += radius * sin(n * time);

        stroke('black');
        noFill();
        ellipse(prevx, prevy, radius * 2);

        line(prevx, prevy, x, y);
        //ellipse(x, y, 8);
    }
    wave.unshift(y);
    stroke(95, 168, 211);
    translate(200, 0);
    line(x - 200, y, 0, wave[0]);
    beginShape();
    noFill();
    strokeWeight(1);
    for (let i = 0; i < wave.length; i++) {
        vertex(i, wave[i]);
    }
    endShape();

    time += 0.05;


    if (wave.length > 500) {
        wave.pop();
    }

}


/*


    translate(-75,-75); 

    translate(-200,0); 

    translate(75,300);    //reference point is at (200,200)
    noFill();
    stroke('black');    //color 
    ellipse(30,30,200,200);    //center of circle is at (30,30) recording to (200,200)

       
    xx = 100*cos(q);      //cos = المجاور/الوتر
    yy = 100*sin(q);
      
    line(30, 30, xx+30, yy+30);

    stroke(95, 168, 211);
    ellipse(xx+30, yy+30, 10,10);
    
    yS2.unshift(yy+30);      //save last value of y in the top of array
    translate(200,0);      //shift the reference point to 400, 200

    
    beginShape()
    noFill();
    stroke(95, 168, 211);      //color
    strokeWeight(4);
    line(xx-170,yy+30,0,yy+30);
    let tt=0
    for(let j=0; j< yS2.length; j+=.8){    // j means frequency
        
        vertex(j,yS2[tt]);
        tt++;
    }
    endShape();

    q += .05;


*/