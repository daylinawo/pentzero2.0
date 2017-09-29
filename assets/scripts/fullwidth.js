var container = document.getElementById('video-container');
var ratio = 9/16; //this is why the 56.25% padding hack exists

function resizer() {
    var width = parseInt(window.getComputedStyle(container).width, 10);
    var height = (width * ratio);
    
    video.style.width = width + 'px';
    video.style.height = height + 'px';
    video.style.marginTop = '-8%'; //~732px wide, the video border is about 24px thick (24/732)
    
    container.style.height = (height * 0.725) + 'px'; //0.88 was the magic number that you needed to shrink the height of the outer container with.
}

var vid, playbtn;

function initializePlayer(){
  // Set object references
  vid = document.getElementById('video');
  playbtn = document.getElementById('playpausebtn');

  // Add event listeners
  vid.addEventListener("click",playPause,false)
}

window.onload = initializePlayer;

function playPause(){

  if(vid.paused){
    vid.play();
    playbtn.childNodes[0].setAttribute('class', 'fa fa-pause');
  } else {
    vid.pause();
    playbtn.childNodes[0].setAttribute('class', 'fa fa-play');
  }
}

//attach event on resize
window.addEventListener('resize', resizer, false);

//call function for initial sizing
//no need for padding hack since we are setting the height based off of the width * aspect ratio
resizer();
//container.style.padding = 0;
