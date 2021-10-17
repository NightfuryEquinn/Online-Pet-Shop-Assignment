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

// Category Filter
function filter(f) {
    if (f == 'all') {
        var i = document.getElementsByClassName('furry');
        for (var x = 0; x < i.length; x++) {
            i[x].style.display = 'flex';
        }
        var j = document.getElementsByClassName('feathery');
        for (var y = 0; y < j.length; y++) {
            j[y].style.display = 'flex';
        }
        var k = document.getElementsByClassName('others');
        for (var z = 0; z < k.length; z++) {
            k[z].style.display = 'flex';
        }

    } else if (f == 'furry') {
        var i = document.getElementsByClassName('furry');
        for (var x = 0; x < i.length; x++) {
            i[x].style.display = 'flex';
        }
        var j = document.getElementsByClassName('feathery');
        for (var y = 0; y < j.length; y++) {
            j[y].style.display = 'none';
        }
        var k = document.getElementsByClassName('others');
        for (var z = 0; z < k.length; z++) {
            k[z].style.display = 'none';
        }

    } else if (f == 'feathery') {
        var i = document.getElementsByClassName('furry');
        for (var x = 0; x < i.length; x++) {
            i[x].style.display = 'none';
        }
        var j = document.getElementsByClassName('feathery');
        for (var y = 0; y < j.length; y++) {
            j[y].style.display = 'flex';
        }
        var k = document.getElementsByClassName('others');
        for (var z = 0; z < k.length; z++) {
            k[z].style.display = 'none';
        }

    } else if (f == 'others') {
        var i = document.getElementsByClassName('furry');
        for (var x = 0; x < i.length; x++) {
            i[x].style.display = 'none';
        }
        var j = document.getElementsByClassName('feathery');
        for (var y = 0; y < j.length; y++) {
            j[y].style.display = 'none';
        }
        var k = document.getElementsByClassName('others');
        for (var z = 0; z < k.length; z++) {
            k[z].style.display = 'flex';
        }
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
        document.getElementById("bank-card-form").style.display="none";
    }
    else if (tab_no==2){
        document.getElementById("personal-info-form").style.display="none";
        document.getElementById("bank-card-form").style.display="flex";

    }
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

