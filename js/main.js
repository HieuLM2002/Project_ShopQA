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
  let parentSellingContent = document.querySelector(items.parent);
  let childSellingContents = parentSellingContent.querySelectorAll(items.child);
  parentSellingContent.appendChild(childSellingContents[0]);
};
let handleArrowMenuLeft = (items) => {
  let parentSellingContent = document.querySelector(items.parent);
  let childSellingContents = parentSellingContent.querySelectorAll(items.child);
  parentSellingContent.prepend(
    childSellingContents[childSellingContents.length - 1]
  );
};

let arrowMenuLeft = document.querySelector(".fa-angle-left");
arrowMenuLeft.addEventListener("click", () =>
  handleArrowMenuLeft({
    parent: ".selling-hot--content",
    child: ".shirt",
  })
);

let arrowMenuRight = document.querySelector(".fa-angle-right");
arrowMenuRight.addEventListener("click", () =>
  handleArrowMenuRight({
    parent: ".selling-hot--content",
    child: ".shirt",
  })
);

//xử lý trượt trái,phải phần product-items

let arrowDisplayProductLeft = document.querySelector(".arrow-product--left");
arrowDisplayProductLeft.addEventListener("click", () =>
  handleArrowMenuLeft({
    parent: ".product-select--items",
    child: ".product-set",
  })
);

let arrowDisplayProductRight = document.querySelector(".arrow-product--right");
arrowDisplayProductRight.addEventListener("click", () =>
  handleArrowMenuRight({
    parent: ".product-select--items",
    child: ".product-set",
  })
);

//xử lý trượt trái,phải sản phẩm khuyến mãi
let arrowProductPromotionalLeft = document.querySelector(".fa-chevron-left");
arrowProductPromotionalLeft.addEventListener("click", () =>
  handleArrowMenuLeft({
    parent: ".product-promotion--display",
    child: ".set-promotion",
  })
);

let arrowProductPromotionalRight = document.querySelector(".fa-chevron-right");
arrowProductPromotionalRight.addEventListener("click", () =>
  handleArrowMenuRight({
    parent: ".product-promotion--display",
    child: ".set-promotion",
  })
);
// sản phẩm nổi bật
let arrowProductHighlightLeft = document.querySelector(".left-product--highlight");
arrowProductHighlightLeft.addEventListener("click", () =>
  handleArrowMenuLeft({
    parent: ".product-highlights--display",
    child: ".set-highlight",
  })
);

let arrowProductHighlightRight = document.querySelector(".right-product--highlight");
arrowProductHighlightRight.addEventListener("click", () =>
  handleArrowMenuRight({
    parent: ".product-highlights--display",
    child: ".set-highlight",
  })
);
// sản phẩm mua nhiều
let arrowProductBuyLotLeft = document.querySelector(".arrowleft-buylot--product");
arrowProductBuyLotLeft.addEventListener("click", () =>
  handleArrowMenuLeft({
    parent: ".product-buylots--display",
    child: ".set-buylot",
  })
);

let arrowProductBuyLotRight = document.querySelector(".arrowright-buylot--product");
arrowProductBuyLotRight.addEventListener("click", () =>
  handleArrowMenuRight({
    parent: ".product-buylots--display",
    child: ".set-buylot",
  })
);
