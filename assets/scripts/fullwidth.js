var container = document.getElementById('fw-video-wrapper');
var ratio = 9/16; //this is why the 56.25% padding hack exists
var vid = document.getElementById('fw-video');  

function resizer() {
    var width = parseInt(window.getComputedStyle(container).width, 10);
    var height = (width * ratio);
    
    vid.style.width = width + 'px';
    vid.style.height = height + 'px';
    // video.style.marginTop = '-2%'; //~732px wide, the video border is about 24px thick (24/732)
    
    container.style.height = (height * 0.96) + 'px'; //0.88 was the magic number that you needed to shrink the height of the outer container with.
}

var control;

function initializePlayer(){
  // Set object references
  var overlay = document.getElementById('fw-video-overlay');
  control = document.getElementById('fw-video-player-control');
  // Add event listeners
  overlay.addEventListener("click",function(e){
   e.preventDefault(); // Cancel the native event
   e.stopPropagation();// Don't bubble/capture the event
   playPause(); // Run video play pause function
  }, false);
}

window.onload = initializePlayer;

function playPause(){

  if(vid.paused){
    vid.play();
    control.style.opacity = "0";
  } else {
    vid.pause();
    control.style.opacity = "1";
  }
} 

var breakPoint = 992;
var wasPlaying = false;

function stopVideo(){
  if (window.innerWidth < breakPoint){
    if(!vid.paused){
      vid.pause();
      wasPlaying = true;
    }
  } else {
    if(wasPlaying){
      vid.play();
      wasPlaying = false;
    }
  }
}
//attach event on resize
window.onresize = function(){
  resizer();
  stopVideo();
};

//call function for initial sizing
//no need for padding hack since we are setting the height based off of the width * aspect ratio
resizer();
stopVideo();

//container.style.padding = 0;
