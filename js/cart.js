const buyButton = document.querySelector("main .albums .album .prize button");
const cart = document.querySelector("main .cart");
const cartQuantity = document.querySelector("main .cart .quantity");
const cartItems = document.querySelector("main .cart .item");

function addTocart(productCode) {
  if (!localStorage.getItem("cart")) {
    const cart = [{ product: productCode, cost: 1 }];
    console.log(this);
    cartQuantity.textContent = 1;

    localStorage.setItem("cart", JSON.stringify(cart));
  } else {
    const storedCart = localStorage.getItem("cart");
    const cartArray = JSON.parse(storedCart);

    cartArray.push({ product: productCode, quantity: 1 });

    localStorage.setItem("cart", JSON.stringify(cartArray));
    let currentItems = +cartQuantity.textContent;
    currentItems++;
    cartQuantity.textContent = currentItems;
    currentItems > 1 ? (cartItems.textContent = "προϊόντα") : "προϊόν";
    buyButton.textContent = "Προστέθηκε στο καλάθι";
  }
}

buyButton.addEventListener("click", function () {
  if (!this.classList.contains("buttonDisabled")) {
    const album = this.getAttribute("data-album");
    addTocart(album);
    checkIfCartExists();
  }
});

document.addEventListener("DOMContentLoaded", () => {
  checkIfAlbumExistsInCart();
});

function checkIfCartExists() {
  if (!localStorage.getItem("cart")) {
    buyButton.classList.remove("buttonDisabled");
    cart.style.height = 0;
  } else {
    buyButton.classList.add("buttonDisabled");
    cart.style.height = "40px";

    // console.log(localStorage.getItem('cart'))
  }
}

function checkIfAlbumExistsInCart() {
  if (!localStorage.getItem("cart")) {
    buyButton.classList.remove("buttonDisabled");
    cart.style.height = 0;
  } else {
    const url = window.location.href;
    const match = /\ba=([^&]*)/.exec(url);
    const album = match ? match[1] : null;

    const storedCart = localStorage.getItem("cart");
    const cartArray = JSON.parse(storedCart);
    cartArray.forEach((a) => {
      if (a.product === album) {
        buyButton.classList.add("buttonDisabled");
        buyButton.textContent = "Προστέθηκε στο καλάθι";
      }

      let currentItems = +cartQuantity.textContent;
      currentItems++;
      cartQuantity.textContent = currentItems;
      currentItems > 1 ? (cartItems.textContent = "προϊόντα") : "προϊόν";
    });

    cart.style.height = "40px";
  }
}
