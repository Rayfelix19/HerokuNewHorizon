

let slIndex = 1;
clickSlides(slIndex);

function plusSlides(n) {
  clickSlides(slIndex += n);
}

function currentSlide(n) {
  clickSlides(slIndex = n);
}

function clickSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slIndex = 1}    
  if (n < 1) {slIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slIndex-1].style.display = "block";  
  dots[slIndex-1].className += " active";
}

