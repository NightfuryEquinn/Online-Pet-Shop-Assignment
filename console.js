// Hamburger NBC 
window.addEventListener("resize", function() {changeFunction()});

function changeFunction() {
    var x = window.innerWidth;
    var a = document.getElementsByClassName('nav-btn-container');
    var b = document.getElementsByClassName('hamburger-nbc');
    if (x < 1200) {
        a[0].style.display = 'none';
        b[0].style.display = 'block';
    } else if (x > 1200) {
        a[0].style.display = 'flex';
        b[0].style.display = 'none';
    }
}

// Back to Top Button
window.onscroll = function() {back2topFunction()};

function back2topFunction() {
    var back2top = document.getElementById('back2top-btn');
    if (document.documentElement.scrollTop > 500) {
        back2top.style.display = 'block';
    } else {
        back2top.style.display = 'none';
    }
}

function scroll2Top() {
    document.documentElement.scrollTop = 0;
}

// Payment completion alert and redirect back to previous page
function payment_done() {
    alert("Payment is done successfully.")
    window.location.replace("homepage.html")
}
// Password changed alert
function password_change(){
    alert("Password changed successfully.")
}

// Personal information changed alert
function modify_details(){
    alert("Your personal information has been updated successfully.")
}

// Slideshow
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}

mybutton = document.getElementById("myBtn");

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

function on() {
  document.getElementById("overlay").style.display = "block";
}

function off() {
  document.getElementById("overlay").style.display = "none";
}

