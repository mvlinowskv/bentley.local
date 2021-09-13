function changeInteriorCar() {
    document.getElementById('background-car').style.filter = "hue-rotate(30deg)";
    document.getElementById('background-car').style.transition = "all 0.4s linear";
}

function changeInteriorCarRed() {
    document.getElementById('background-car').style.filter = "hue-rotate(0deg)";
    document.getElementById('background-car').style.transition = "all 0.4s linear";
}


/*Open Menu mobile */

function OpenMenu() {
    var checkbox = document.getElementById("menu");
    var menu = document.getElementById("site-header-menu");
    var fall = document.getElementById('fall-white');
  
    if(checkbox.checked == true) {
      menu.style.left = 0;
      menu.style.top = "0rem";
    } else {
      menu.style.left="-110vw";
      menu.style.top = "0rem";
    }
}
