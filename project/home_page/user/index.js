function carousel1() {
  document.getElementById("mySlides").src = "2.jpg";
}
function carousel2() {
  document.getElementById("mySlides").src = "3.jpg";
}
function carousel3() {
  document.getElementById("mySlides").src = "1.jpg";
}
setInterval(carousel1, 2000);
setInterval(carousel2, 4000);
setInterval(carousel3, 6000);
