let waveNumber = 1;

function wavesAnimation(){

    let waveName = "wave-"+waveNumber.toString();

    let wavePositionElement = document.getElementById('wavePosition');

    let allWaves = document.getElementsByName("wave");
    //console.log(allWaves.length+ waveName);

    for(let i=0 ;i<allWaves.length; i++)
    {

        allWaves[i].style.display = "none";
    }

    document.getElementById(waveName).style.display = "block";
    wavePositionElement.innerHTML = document.getElementById(waveName).innerHTML;
    waveNumber++;
    if(waveNumber==allWaves.length){
        waveNumber = 1;
        //console.log("hi");
    }

}