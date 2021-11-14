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

// Slideshow for display banners//
var slideIndex = 1;
slides(slideIndex);

function nextslide(n) {
  slides(slideIndex += n);
}

function bannerslide(n) {
  slides(slideIndex = n);
}

function slides(n) {
  var i;
  var slides = document.getElementsByClassName("hpbannerslides");
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

function on() {
  document.getElementById("overlay").style.display = "block";
}

function off() {
  document.getElementById("overlay").style.display = "none";
}

