const decrement = document.querySelectorAll('main .container .cart .product .quantity .decrement')
const increment = document.querySelectorAll('main .container .cart .product .quantity .increment')
const deleteProduct = document.querySelectorAll('main .container .cart .product .delete img')

decrement.forEach(d => {
  d.addEventListener('click', function () {
    let currentValue = +this.nextElementSibling.value

    if (currentValue > 1) currentValue--

    this.nextElementSibling.value = currentValue
  })
})

increment.forEach(i => {
  i.addEventListener('click', function () {
    let currentValue = +this.previousElementSibling.value

    if (currentValue < 9) currentValue++

    this.previousElementSibling.value = currentValue
  })
})

deleteProduct.forEach(del => {
  del.addEventListener('click', function () {
    this.parentElement.parentElement.parentElement.remove()
  })
})
