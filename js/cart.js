const buyButton = document.querySelector('main .albums .album .prize button')
// const cart = document.querySelector('main .cart')
// const cartQuantity = document.querySelector('main .cart .quantity')
// const cartItems = document.querySelector('main .cart .item')

// function addTocart(productCode) {
//   if (!localStorage.getItem('cart')) {
//     const cart = [{ product: productCode, quantity: 1 }]
//     cartQuantity.textContent = 1

//     localStorage.setItem('cart', JSON.stringify(cart))
//   } else {
//     const storedCart = localStorage.getItem('cart')
//     const cartArray = JSON.parse(storedCart)

//     cartArray.push({ product: productCode, quantity: 1 })

//     localStorage.setItem('cart', JSON.stringify(cartArray))
//     let currentItems = +cartQuantity.textContent
//     currentItems++
//     cartQuantity.textContent = currentItems
//     currentItems > 1 ? (cartItems.textContent = 'προϊόντα') : 'προϊόν'
//     buyButton.textContent = 'Προστέθηκε στο καλάθι'
//   }
// }

// buyButton.addEventListener('click', function () {
//   if (!this.classList.contains('buttonDisabled')) {
//     const album = this.getAttribute('data-album')
//     addTocart(album)
//     checkIfCartExists()
//   }
// })

// document.addEventListener('DOMContentLoaded', () => {
//   checkIfAlbumExistsInCart()
// })

// function checkIfCartExists() {
//   if (!localStorage.getItem('cart')) {
//     buyButton.classList.remove('buttonDisabled')
//     cart.style.height = 0
//   } else {
//     buyButton.classList.add('buttonDisabled')
//     cart.style.height = '40px'

//     // console.log(localStorage.getItem('cart'))
//   }
// }

// function checkIfAlbumExistsInCart() {
//   if (!localStorage.getItem('cart')) {
//     buyButton.classList.remove('buttonDisabled')
//     cart.style.height = 0
//     console.log('object')
//   } else {
//     const url = window.location.href
//     const match = /\ba=([^&]*)/.exec(url)
//     const album = match ? match[1] : null

//     const storedCart = localStorage.getItem('cart')
//     const cartArray = JSON.parse(storedCart)
//     cartArray.forEach(a => {
//       if (a.product === album) {
//         buyButton.classList.add('buttonDisabled')
//         buyButton.textContent = 'Προστέθηκε στο καλάθι'
//       }

//       let currentItems = +cartQuantity.textContent
//       currentItems++
//       cartQuantity.textContent = currentItems
//       currentItems > 1 ? (cartItems.textContent = 'προϊόντα') : 'προϊόν'
//     })

//     cart.style.height = '40px'
//   }
// }

let buyMsg

buyButton.addEventListener('click', () => {
  if (document.querySelector('.buyMsg') === null) {
    let div = document.createElement('div')
    div.classList.add('buyMsg')
    div.style.position = 'absolute'
    div.style.width = '300px'
    div.style.height = '300px'
    div.style.backgroundColor = 'rgba(0,0,0,0.9)'
    div.style.top = 0
    div.style.left = 0
    div.style.display = 'grid'
    div.style.placeItems = 'center'
    div.style.textAlign = 'center'
    div.style.fontSize = '18px'

    div.innerHTML = `<div>
                      Για να αποκτήσετε το CD επικοινωνήστε μαζί μας με τους ακόλουθους τρόπους:
                      <br>
                      <br>
                      1) Email: <b>info@gsfmusic.gr</b>
                      <br>
                      2) Τηλέφωνο: <b>210 7242221</b>
                     </div>`

    buyButton.parentElement.parentElement.querySelector('.cover').append(div)
    buyMsg = div
  } else {
    buyMsg.remove()
  }
})
