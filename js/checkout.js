// Redirect in case no product exists in the cart
// if (!localStorage.getItem('cart')) {
//   window.location.assign('../home.php')
// }

const sumQuantity = document.querySelector(
  "main .container .cart .sum .sumQuantity span"
);
const sumAmount = document.querySelector(
  "main .container .cart .sum .sumAmount span"
);
const decrement = document.querySelectorAll(
  "main .container .cart .product .quantity .decrement"
);
const increment = document.querySelectorAll(
  "main .container .cart .product .quantity .increment"
);
const deleteProduct = document.querySelectorAll(
  "main .container .cart .product .delete img"
);

let myCart = JSON.parse(localStorage.getItem("cart"));

// Update sum quantity on page load
sumQuantity.textContent = myCart.length;

// Update sum amount on page load

console.log(myCart.length);

decrement.forEach((d) => {
  d.addEventListener("click", function () {
    let currentValue = +this.nextElementSibling.value;

    if (currentValue > 1) {
      currentValue--;

      // Decrease amount
      let a = parseInt(
        this.parentElement.parentElement.querySelector(".amount").textContent
      );
      a -=
        +this.parentElement.parentElement.previousElementSibling.getAttribute(
          "data-amount"
        );
      this.parentElement.parentElement.querySelector(".amount").textContent =
        a + "€";

      // Decrease sum quantity
      let sumQ = +sumQuantity.textContent;
      sumQ--;
      sumQuantity.textContent = sumQ;

      // Decrease sum amount
      let sumA = parseInt(sumAmount.textContent);
      sumA -=
        +this.parentElement.parentElement.previousElementSibling.getAttribute(
          "data-amount"
        );
      sumAmount.textContent = sumA + "€";
    }

    this.nextElementSibling.value = currentValue;
  });
});

increment.forEach((i) => {
  i.addEventListener("click", function () {
    let currentValue = +this.previousElementSibling.value;

    if (currentValue < 9) {
      // Increase quantity
      currentValue++;

      // Increase amount
      let a = parseInt(
        this.parentElement.parentElement.querySelector(".amount").textContent
      );
      a +=
        +this.parentElement.parentElement.previousElementSibling.getAttribute(
          "data-amount"
        );
      this.parentElement.parentElement.querySelector(".amount").textContent =
        a + "€";

      // Increase sum quantity
      let sumQ = +sumQuantity.textContent;
      sumQ++;
      sumQuantity.textContent = sumQ;

      // Increase sum amount
      let sumA = parseInt(sumAmount.textContent);
      sumA +=
        +this.parentElement.parentElement.previousElementSibling.getAttribute(
          "data-amount"
        );
      sumAmount.textContent = sumA + "€";
    }

    this.previousElementSibling.value = currentValue;
  });
});

deleteProduct.forEach((del) => {
  del.addEventListener("click", function () {
    // Update sum quantity
    let sumQ = +sumQuantity.textContent;
    sumQ -= 1 * +this.parentElement.parentElement.querySelector("input").value;
    sumQuantity.textContent = sumQ;

    // Update sum amount
    let sumA = parseInt(sumAmount.textContent);
    sumA -=
      +this.parentElement.parentElement.previousElementSibling.getAttribute(
        "data-amount"
      ) * +this.parentElement.parentElement.querySelector("input").value;
    sumAmount.textContent = sumA + "€";

    this.parentElement.parentElement.parentElement.remove();
  });
});
