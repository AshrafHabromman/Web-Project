
function sine_wave(frequency,shift,diameter, yArray,xS){

    strokeWeight(4);
    noFill();
    stroke('black');    //color
    ellipse(30,30,diameter,diameter);    //center of circle is at (30,30) recording to (200,200)


    x = diameter*0.5*cos(frequency.value);      //cos = المجاور/الوتر
    y = diameter*0.5*sin(frequency.value);

    line(30, 30, x+30, y+30);

    stroke(95, 168, 211);
    ellipse(x+30, y+30, 10,10);

    xS.unshift(x);
    yArray.unshift(y+30);      //save last value of y in the top of array
    translate(200,0);      //shift the reference point to 400, 200

    beginShape();
    noFill();
    stroke(95, 168, 211);      //color

    line(x-170,y+30,0,y+30);
    let t=0
    for(let j=0; j< yArray.length; j+=.8){    // j means frequency

        vertex(j,yArray[t]);
        t++;
    }
    endShape();

    if(yArray.length > 600){
        yArray.pop();
    }

    frequency.value += shift;

}
