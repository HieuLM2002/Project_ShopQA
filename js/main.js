// xử lý menu 2 cấp
let sidebarList = document.querySelector(".sidebar-list");
function handleShow(event) {
  let clicked = event.target;
  if (clicked.classList.contains("fa-caret-down")) {
    clicked.classList.toggle("icon-arrow");

    while (clicked.parentElement) {
      if (clicked.parentElement.matches(".sidebar-list-select")) {
        let perentList = clicked.parentElement;
        let showList = perentList.querySelector(".dropdow-menu");
        showList.classList.toggle("show");
      }
      clicked = clicked.parentElement;
    }
  }
}

if (sidebarList) {
  sidebarList.addEventListener("click", handleShow);
}
// xử lý xem thêm
let handleSeeMore = () => {
  let hideProduct = document.querySelector(".hide-product--sidebar");
  if (hideProduct) {
    hideProduct.classList.toggle("show");
    seeMore.innerHTML = "Thu gọn";
  }
  if (hideProduct.classList.contains("show") == true) {
    seeMore.innerHTML = "Xem thêm";
  }
};
let seeMore = document.querySelector(".see-more");
seeMore.addEventListener("click", handleSeeMore);

// chuyển động slide->mục main content
let imgList = ["imgSale1.jpg", "imgSale2.jpg", "imgSale3.jpg"];
let index = 0;
function changeImage() {
  index++;
  if (index == imgList.length) {
    index = 0;
  }
  let img = document.querySelector(".img-sale--move");
  img.setAttribute("src", `../imgs/imgSale/${imgList[index]}`);
}
changeImage();
setInterval(changeImage, 2500);




