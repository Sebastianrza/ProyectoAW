var audio = document.getElementById('audio');
var playBTN = document.getElementById('playBTN');
var mute = document.getElementById("mute");
var barra = document.getElementById("volumen");
var progressed = document.getElementById("progressed");

function play(){
	audio.play();
}

function pause(){
	audio.pause();
}

function volumeUp(){
	var vid = document.getElementById("audio");
	vid.volume = vid.volume + 0.1;
}

function volumeDown(){
	var vid = document.getElementById("audio");
	vid.volume = vid.volume - 0.1;
}

function back(){
	var vid = document.getElementById("audio")
	vid.currentTime = vid.currentTime - 2;
}

function advance(){
	var vid = document.getElementById("audio")
	vid.currentTime = vid.currentTime + 2;
}

function muted(){
	var vid = document.getElementById("audio")
	if(vid.muted == false){
		vid.muted = true;
	} else{
		vid.muted = false;
	}
}


audio.ontimeupdate = function(e){
	progressed.style.width = Math.floor(audio.currentTime*100/audio.duration) + "%";
}
