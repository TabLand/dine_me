function proceed_with_sound(){
  document.getElementById("audio").play(); 
}

function proceed_without_sound(){
  document.getElementById("audio").pause(); 
}

function animate_mask(){
  circle = document.getElementById("circle_mask");
  setInterval(function () {circle.setAttribute("cy", 50 + window.scrollY);}, 5);
}
