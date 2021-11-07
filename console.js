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

// Switch Tab
function opentab(tab_no){
    if (tab_no==1){
        document.getElementById("personal-info-form").style.display="flex";
        document.getElementById("change-password-form").style.display="none";
    }
    else if (tab_no==2){
        document.getElementById("personal-info-form").style.display="none";
        document.getElementById("change-password-form").style.display="block";

    }
}

//payment completion alert and redirect back to previous page
function payment_done() {
    alert("Payment is done successfully.")
    window.location.replace("homepage.html")
}
//password changed alert
function password_change(){
    alert("Password changed successfully.")
}

//personal information changed alert
function modify_details(){
    alert("Your personal information has been updated successfully.")
}

//xl//
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 2000);
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

window.onscroll = function() {myFunction()};

var header = document.getElementById("navbar");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}









//login//
function loginopen() {
    document.getElementById("loginform").style.width = "67%";
  }
  
  function loginclose() {
    document.getElementById("loginform").style.width = "0%";
  }

  function signupopen() {
    document.getElementById("signupform").style.width = "67%";
  }
  
  function signupclose() {
    document.getElementById("signupform").style.width = "0%";
  }

  function adminopen() {
    document.getElementById("adminform").style.width = "67%";
  }
  
  function adminclose() {
    document.getElementById("adminform").style.width = "0%";
  }
//xl//
