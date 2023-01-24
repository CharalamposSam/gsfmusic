class Fetch {
  static fetchCont = document.querySelector("main")
  static copyBtns = Array.from(document.querySelectorAll(".copyBtn"))
  static openBtns = Array.from(document.querySelectorAll(".openBtns"))
  static openAll = document.querySelector(".openAll")
  static fetchBtn = document.querySelector("#fetchBtn")

  static openAllLinks() {
    this.openBtns.forEach(btn => {
      let link = btn.parentElement.parentElement.children[1].value
      if (link == null || link == "") return
      let url = "https://" + link
      window.open(url, "_blank").focus()
    })
  }

  static fetchTheData() {
    spotify.value = ""
    youtube.value = ""
    apple.value = ""
    amazon.value = ""
    deezer.value = ""
    tidal.value = ""
    cd.value = ""
    fetch("fetch.php?code=" + code.value)
      .then(res => res.json())
      .then(data => {
        console.log(data)
        data[0].spotify
          ? (spotify.value = "gsfmusic.gr/spotify/" + data[0].code)
          : (spotify.value = "")
        data[0].youtube
          ? (youtube.value = "gsfmusic.gr/youtube/" + data[0].code)
          : (youtube.value = "")
        data[0].apple
          ? (apple.value = "gsfmusic.gr/apple/" + data[0].code)
          : (apple.value = "")
        data[0].amazon
          ? (amazon.value = "gsfmusic.gr/amazon/" + data[0].code)
          : (amazon.value = "")
        data[0].deezer
          ? (deezer.value = "gsfmusic.gr/deezer/" + data[0].code)
          : (deezer.value = "")
        data[0].tidal
          ? (tidal.value = "gsfmusic.gr/tidal/" + data[0].code)
          : (tidal.value = "")
        data[0].cd
          ? (cd.value = "gsfmusic.gr/cd/" + data[0].code)
          : (cd.value = "")
      })
  }
}

class Create {
  static createCont = document.querySelector("form")
  static createTab = document.querySelector("nav .create")
}

const fetchTab = document.querySelector("nav .fetch"),
  spotify = document.querySelector("#spotify1"),
  youtube = document.querySelector("#youtube1"),
  apple = document.querySelector("#apple1"),
  amazon = document.querySelector("#amazon1"),
  deezer = document.querySelector("#deezer1"),
  tidal = document.querySelector("#tidal1"),
  cd = document.querySelector("#cd1"),
  code = document.querySelector("#code1")

document.querySelector("nav .create").addEventListener("click", () => {
  Create.createTab.classList.add("enable")
  fetchTab.classList.remove("enable")

  Create.createCont.style.display = "flex"
  Fetch.fetchCont.style.display = "none"
})

fetchTab.addEventListener("click", () => {
  fetchTab.classList.add("enable")
  Create.createTab.classList.remove("enable")

  Fetch.fetchCont.style.display = "flex"
  Create.createCont.style.display = "none"
})

code.addEventListener("keyup", e => {
  if (e.keyCode === 13) {
    fetchTheData()
  }
})

Fetch.fetchBtn.addEventListener("click", Fetch.fetchTheData)

Fetch.copyBtns.forEach(btn => {
  btn.addEventListener("click", function () {
    let link = this.parentElement.parentElement.children[1]
    link.select()
    link.setSelectionRange(0, 99999)
    document.execCommand("copy")
  })
})

Fetch.openBtns.forEach(btn => {
  btn.addEventListener("click", function () {
    let link = this.parentElement.parentElement.children[1].value
    let url = "https://" + link
    window.open(url, "_blank").focus()
  })
})

Fetch.openAll.addEventListener("click", function () {
  Fetch.openAllLinks()
})
