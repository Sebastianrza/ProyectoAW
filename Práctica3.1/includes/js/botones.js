var audio = document.getElementById('audio');
var playBTN = document.getElementById('playBTN');
var mute = document.getElementById("mute");
var barra = document.getElementById("volumen");
var img = '<?php echo $sql;?>'

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

function mute(){
	var vid = document.getElementById("audio")
	vid.muted = true;
}

list.onclick = function(e) {
	e.preventDefault();
  
	var elm = e.target;
	var audio = document.getElementById('audio');
  
	var source = document.getElementById('audioSource');
	source.src = elm.getAttribute('data-value');
  
	audio.load(); //call this to just preload the audio without playing
	audio.play(); //call this to play the song right away
  };