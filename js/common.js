// Copy Mail
const emailMenuIcon = document.querySelector('.emailMenuIcon')
const emailTag = document.querySelector('.emailTag')

let copyMailFlag = true
emailMenuIcon.addEventListener('click', e => {
  e.preventDefault()
  const textarea = document.createElement('textarea')
  textarea.textContent = 'csamouridis@gsfmusic.gr'
  document.body.appendChild(textarea)
  textarea.style.cssText = 'width: 0;height: 0;'
  textarea.select()
  textarea.setSelectionRange(0, 99999)
  document.execCommand('copy')
  textarea.remove()
  emailTag.innerText = 'Αντιγράφηκε'
  emailTag.style.color = '#84fe84'

  if (copyMailFlag) {
    copyMailFlag = false
    setTimeout(() => {
      emailTag.style.color = 'white'
      emailTag.innerText = 'csamouridis@gsfmusic.gr'
      copyMailFlag = true
    }, 1000)
  }
})

// window.addEventListener('scroll', () => {
//   if (window.scrollY == 0) {
//     emailTag.style.opacity = '1'
//   } else {
//     emailTag.style.opacity = '0'
//   }
// })

emailMenuIcon.addEventListener('mouseover', () => {
  emailTag.style.opacity = '1'
})

emailMenuIcon.addEventListener('mouseout', () => {
  emailTag.style.opacity = '0'
})
emailTag.style.opacity = '0'
