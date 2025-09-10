const carousel = document.getElementById('carousel')
const track = document.getElementById('track') // === ΡΥΘΜΙΣΕΙΣ ===

const SPEED_PX_PER_SEC = 40 // === ΚΑΤΑΣΤΑΣΗ ===

let x = 0
let lastTs = 0
let isPaused = false
let isDragging = false
let isTouching = false // Νέα μεταβλητή για το touch
let startClientX = 0
let rafId = null

const applyTransform = () => {
  track.style.transform = `translate3d(${x}px, 0, 0)`
}

const recycle = () => {
  let first = track.firstElementChild
  if (!first) return

  while (first) {
    const firstWidth = first.getBoundingClientRect().width
    if (x <= -firstWidth) {
      x += firstWidth
      track.appendChild(first)
      first = track.firstElementChild
    } else {
      break
    }
  }

  let last = track.lastElementChild
  while (last && x > 0) {
    const lastWidth = last.getBoundingClientRect().width
    x -= lastWidth
    track.prepend(last)
    last = track.lastElementChild
  }
}

const tick = ts => {
  if (!lastTs) lastTs = ts
  const dt = (ts - lastTs) / 1000
  lastTs = ts

  if (!isPaused && !isDragging) {
    x -= SPEED_PX_PER_SEC * dt
    recycle()
    applyTransform()
  }

  rafId = requestAnimationFrame(tick)
} // Hover pause/resume

carousel.addEventListener('mouseenter', () => {
  isPaused = true
})

carousel.addEventListener('mouseleave', () => {
  // Αν δεν γίνεται drag ή touch, ξαναξεκινά
  if (!isDragging && !isTouching) {
    isPaused = false
  }
}) // Drag (mouse)

const onMouseDown = e => {
  isDragging = true
  isPaused = true
  startClientX = e.clientX
  document.addEventListener('mousemove', onMouseMove)
  document.addEventListener('mouseup', onMouseUp)
}

const onMouseMove = e => {
  if (!isDragging) return
  const dx = e.clientX - startClientX
  startClientX = e.clientX
  x += dx
  recycle()
  applyTransform()
}

const onMouseUp = () => {
  isDragging = false
  document.removeEventListener('mousemove', onMouseMove)
  document.removeEventListener('mouseup', onMouseUp) // Επαναφορά του animation
  isPaused = false
}

carousel.addEventListener('mousedown', onMouseDown) // Drag (touch)

const onTouchStart = e => {
  if (e.touches.length !== 1) return
  isDragging = false // Αρχικά θεωρούμε ότι δεν είναι drag
  isPaused = true
  startClientX = e.touches[0].clientX
  startClientY = e.touches[0].clientY
}

const onTouchMove = e => {
  const cx = e.touches[0].clientX
  const cy = e.touches[0].clientY

  const dx = cx - startClientX
  const dy = cy - startClientY

  // Ελέγχουμε αν η κίνηση είναι οριζόντια (πιο μεγάλη στο X από ό,τι στο Y)
  // και αν το drag έχει ξεκινήσει (isDragging)
  if (Math.abs(dx) > Math.abs(dy) && Math.abs(dx) > 10) {
    // Όριο 10px για να ξεκινήσει το drag
    isDragging = true
  }

  // Εάν η κίνηση είναι οριζόντια, εμποδίζουμε το κάθετο σκρολάρισμα
  if (isDragging) {
    e.preventDefault()
    startClientX = cx
    startClientY = cy // Ενημερώνουμε και το Y για να συνεχίσουμε τον έλεγχο
    x += dx
    recycle()
    applyTransform()
  }
}

const onTouchEnd = () => {
  isDragging = false
  isPaused = false
}

carousel.addEventListener('touchstart', onTouchStart, { passive: true })
carousel.addEventListener('touchmove', onTouchMove, { passive: false })
carousel.addEventListener('touchend', onTouchEnd) // Responsive

window.addEventListener('resize', () => {
  recycle()
  applyTransform()
}) // Εκκίνηση

rafId = requestAnimationFrame(tick) // Cleanup

window.addEventListener('beforeunload', () => cancelAnimationFrame(rafId))
