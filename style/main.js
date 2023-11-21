var navbar = document.getElementById("navbar");
var menu = document.querySelector(".menu-repon");
var wrapper = document.getElementById("out-menu");

navbar.onclick = function () {
  menu.classList.toggle("active");
};
wrapper.onclick = function () {
  menu.classList.toggle("close");
  menu.classList.remove("active");
};
window.scrollbars = function () {
  menu.classList.toggle("close");
  menu.classList.remove("active");
};

var banner = document.getElementById("slide");
var imgArr = ["banner1.png", "banner2.png", "banner3.png", "banner4.png"];
var lengths = imgArr.length;
var index = 0;
function next() {
  index++;
  if (index >= lengths) {
    index = 0;
  }
  banner.src = "./image/" + imgArr[index];
}

function back() {
  index--;
  if (index < 0) {
    index = length - 1;
  }
  banner.src = "./image/" + imgArr[index];
}

setInterval(next, 2500);
const next_pro = document.querySelector(".next-product");
const pre_pro = document.querySelector(".pre-product");
const product = document.querySelector(".list-product-sell");

next_pro.addEventListener("click", () => {
  product.scrollLeft += 280;
});
pre_pro.addEventListener("click", () => {
  product.scrollLeft -= 280;
});


