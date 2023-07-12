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
// let counClick = 0
// function animationMenuSlideLeft(before, after, item) {
//   counClick ++;
//   let count = null;
//   let countPx = before;
//   if(counClick == 1){
//     count = setInterval(frameShirt, 0);
//     function frameShirt() {
//       if (countPx <= after) {
//         clearInterval(count);
//       } else {
//         countPx -= 2;
//         item.style.transform = `translateX(${countPx}px)`;
//       }
//     }
//   }else{
//     count = setInterval(frameShirt, 0);
//     function frameShirt() {
//       if (countPx <= after) {
//         clearInterval(count);
//       } else {
//         countPx = countPx*2 ;
//         item.style.transform = `translateX(${countPx}px)`;
//       }
//     }
//   }

// }

// hàm xử lý trượt trái,phải phần aside
let handleArrowMenuRight = (items) => {
  let count = 0;
  let parentSellingContent = document.querySelector(items.parent);
  let childSellingContents = document.querySelectorAll(items.child);
  parentSellingContent.appendChild(childSellingContents[0]);
  childSellingContents[count].classList.add(items.show);
  childSellingContents[++count].classList.remove(items.show);
};
let handleArrowMenuLeft = (items) => {
  let parentSellingContent = document.querySelector(items.parent);
  let childSellingContents = document.querySelectorAll(items.child);
  let count = childSellingContents.length - 1;
  parentSellingContent.prepend(
    childSellingContents[childSellingContents.length - 1]
  );
  childSellingContents[count].classList.remove(items.show);

  childSellingContents[0].classList.add(items.show);
};

let arrowMenuLeft = document.querySelector(".fa-angle-left");
arrowMenuLeft.addEventListener("click", () =>
  handleArrowMenuLeft({
    parent: ".selling-hot--content",
    child: ".shirt",
    show: "show",
  })
);

let arrowMenuRight = document.querySelector(".fa-angle-right");
arrowMenuRight.addEventListener("click", () =>
  handleArrowMenuRight({
    parent: ".selling-hot--content",
    child: ".shirt",
    show: "show",
  })
);

//xử lý trượt trái,phải phần sản phẩm mới

let arrowDisplayProductLeft = document.querySelector(".arrow-product--left");
arrowDisplayProductLeft.addEventListener("click", () =>
  handleArrowMenuLeft({
    parent: ".product-select--items",
    child: ".product-set",
    show: "show-product",
  })
);

let arrowDisplayProductRight = document.querySelector(".arrow-product--right");
arrowDisplayProductRight.addEventListener("click", () =>
  handleArrowMenuRight({
    parent: ".product-select--items",
    child: ".product-set",
    show: "show-product",
  })
);

//xử lý trượt trái,phải sản phẩm khuyến mãi
let arrowProductPromotionalLeft = document.querySelector(".fa-chevron-left");
arrowProductPromotionalLeft.addEventListener("click", () =>
  handleArrowMenuLeft({
    parent: ".product-promotion--display",
    child: ".set-promotion",
    show: "show-promotion",
  })
);

let arrowProductPromotionalRight = document.querySelector(".fa-chevron-right");
arrowProductPromotionalRight.addEventListener("click", () =>
  handleArrowMenuRight({
    parent: ".product-promotion--display",
    child: ".set-promotion",
    show: "show-promotion",
  })
);

// sản phẩm nổi bật
let arrowProductHighlightLeft = document.querySelector(
  ".left-product--highlight"
);
arrowProductHighlightLeft.addEventListener("click", () =>
  handleArrowMenuLeft({
    parent: ".product-highlights--display",
    child: ".set-highlight",
    show: "show-highlight",
  })
);

let arrowProductHighlightRight = document.querySelector(
  ".right-product--highlight"
);
arrowProductHighlightRight.addEventListener("click", () =>
  handleArrowMenuRight({
    parent: ".product-highlights--display",
    child: ".set-highlight",
    show: "show-highlight",
  })
);

// sản phẩm mua nhiều
let arrowProductBuyLotLeft = document.querySelector(
  ".arrowleft-buylot--product"
);
arrowProductBuyLotLeft.addEventListener("click", () =>
  handleArrowMenuLeft({
    parent: ".product-buylots--display",
    child: ".set-buylot",
    show: "show-buylot",
  })
);

let arrowProductBuyLotRight = document.querySelector(
  ".arrowright-buylot--product"
);
arrowProductBuyLotRight.addEventListener("click", () =>
  handleArrowMenuRight({
    parent: ".product-buylots--display",
    child: ".set-buylot",
    show: "show-buylot",
  })
);

//ngăn sự kiện load
// let handleLoad = () =>{
//   console.log('>>>>>>');
//   // let clicked = event.target;

//    //clicked.
//    preventDefault();
// }
// let navListParent = document.querySelector('.nav-list');
// let navList = navListParent.querySelectorAll('a');
// console.log('>>>>>>123',navList);
//   navList.addEventListener('click',handleLoad);

//   item.addEventListener("click", handleLoad);
// })
