var slideIndex = 1;
var autoSlide = null;
showSlides(slideIndex);

$(document).ready(function() {
	$("body").append(
		"<ul class='circles'><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li></ul>"
	);
	autoPlusSlides();
}); 

function plusSlides(n) {
  showSlides(slideIndex += n);
  clearStartSlides();
}

function autoPlusSlides(n) {
	autoSlide = setInterval(function(){ 
     plusSlides(1);
 }, 5000);
}

function clearStartSlides() {
	clearInterval(autoSlide);
	autoPlusSlides();
}

function currentSlide(n) {
  showSlides(slideIndex = n);
  clearStartSlides();
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