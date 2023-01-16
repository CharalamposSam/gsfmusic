//Preview Hero image
const previewHero = document.querySelector('.previewHero')
const heroImg = document.querySelector('.hero .heroImg')
let previewHeroIsOpen = false
previewHero.addEventListener('click', () => {
  closePreviewImage()
})

heroImg.addEventListener('click', () => {
  if (!previewHeroIsOpen) {
    previewHero.style.transform = 'scale(1)'
    previewHero.style.top = window.scrollY + 'px'

    setTimeout(() => {
      previewHero.style.opacity = '1'
    }, 0)
    previewHeroIsOpen = true
  } else {
  }
})

window.addEventListener('scroll', () => {
  if (previewHeroIsOpen) hideElementOnScroll(previewHero, previewHeroIsOpen)
})

function closePreviewImage() {
  previewHero.style.opacity = '0'
  setTimeout(() => {
    previewHero.style.transform = 'scale(0)'
  }, 0)
  previewHeroIsOpen = false
}

function hideElementOnScroll(elm, flag) {
  elm.style.opacity = '0'
  setTimeout(() => {
    elm.style.transform = 'scale(0)'
  }, 0)
  flag = false
}
