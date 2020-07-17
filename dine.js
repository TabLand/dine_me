enable_animation = true;

function proceed_with_sound(){
  document.getElementById("audio").play(); 
}

function proceed_without_sound(){
  document.getElementById("audio").pause(); 
}

function setup(){
  text_div = document.getElementById("text");
  animate_mask(text_div);
}

function animate_mask(text_div){
  setInterval(
    function() {
      if(enable_animation){
        new_clip = "circle(300px at 300px " + ((window.innerHeight/2) - ((window.innerHeight - 600) /2) + window.scrollY) + "px";
        text_div.style.clipPath = new_clip;
        text_div.style["margin-top"] = ((window.innerHeight - 600) /2);
      }
    } , 5);
}
