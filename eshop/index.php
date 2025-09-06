<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="../images/favicon.png" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet" />
    <title>Eshop</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../css/artist.css" />
    <link rel="stylesheet" href="style.css" />

    <script src="../js/common.js" defer></script>
    <script src="js/eshop.js" defer></script>
  </head>
  <body>
    <div id="overlay"></div>
  <div class="albumsLoader loader">
      <div></div>
      <div class="loader2"></div>
      <div class="loader3"></div>
  </div>
  <div class="preloader">
      <div>
          <img class="logo" src="../icons/logo.png" alt="GSF Music">
      </div>
  </div>

    <main>
      
    <!-- Header -->
    <?php require_once('../header.php'); ?>

      <div class="searchContainer">
        <div class="error">&nbsp;</div>
        <div class="searchBar">
          <input type="text" name="" id="" placeholder="Search..." />
          <div class="resultsContainer">
            <div class="searchResults"></div>
            <div class="searchLoader loader">
              <div></div>
              <div class="loader2"></div>
              <div class="loader3"></div>
            </div>
          </div>
        </div>
        <!-- <div class="categories">
          <div class="category margin">Λαϊκά</div>
          <div class="category margin">Λαϊκά</div>
          <div class="category margin">Λαϊκά</div>
          <div class="category margin">Λαϊκά</div>
          <div class="category margin">Λαϊκά</div>
        </div> -->
      </div> 
      <div class="albums"></div>

      <script>
          const preloader = document.querySelector('.preloader')
          const loader = document.querySelector('.albumsLoader')
          
          window.addEventListener('load', () => {
          setTimeout(() => {
              preloader.style.opacity = '0'
              document.body.style.overflowY = 'auto'
          }, 500)

          setTimeout(() => {
              preloader.style.display = 'none'
          }, 800)
          })

          window.addEventListener('beforeunload', () => {
          document.body.style.opacity = '0'
          window.scrollTo(0, 0)
          })


        const albums = document.querySelector('.albums')
        let range = 0
        let limit = 6
        const displayedAlbums = [0]
        
        addAlbums()

      
        function addAlbums(firstTime = false) {

          fetch(
            `../fetchArtist.php?eshop&ar&range=${range}&limit=${limit}`
          )
          .then(res => res.json())
          .then(data => {

              data.forEach( album => {

                displayedAlbums.push(+album.album_code)
                
                const theAlbum = document.createElement('div')
                theAlbum.classList.add('album')
                theAlbum.setAttribute('data-code', album.album_code)


                // Handle title in case text is too long
                const currentTitleLength = album.title.length
                let first45Chars = ''
                if (currentTitleLength > 45) {
                  first45Chars = album.title.slice(0, 46)
                  first45Chars = first45Chars + "..."
                }
                

                  const albumDetails = `
                    <div class="title" title="${album.title}">${first45Chars ? first45Chars : album.title}</div>
                    <div class="cover"><div class="moreDetails"></div><img src="../images/covers/${album.album_code}.jpg" alt="" /></div>
                    <div class="tags"></div>
                    <div class="prize">${album.prize}.00€</div>
                    <div class="buttons">
                      <!-- <div class="details">Προσθήκη στο καλάθι</div> -->
                      <div class="openAlbumDetails" data-more="${album.album_code}">Περισσότερα</div>
                    </div>
                  `
                  theAlbum.innerHTML = albumDetails

                  albums.appendChild(theAlbum)

                  document.querySelector(`[data-more="${album.album_code}"]`).addEventListener('click', function() {
                    window.open(`../album/${this.attributes['data-more'].value}`, '_blank').focus();
                  })

                  
                  // If tags exist
                  if (album.artist_name) {

                    const tags = document.querySelector(`[data-code="${album.album_code}"] .tags`)

                    album.artist_name.split(", ").forEach((artist, i) => {

                      if (artist === '') return

                      let tagakia = `<a href="https://www.gsfmusic.gr/${album.artist_code.split(", ")[i]}" target="_blank">${artist}</a>`
                      let div = document.createElement('div')
                      div.classList.add('tag')
                      div.innerHTML = tagakia
                     tags.appendChild(div)
                    })

                    if (tags.querySelectorAll('.tag')[0].parentNode.clientHeight > 20) {

                      const allTags = tags.querySelectorAll('.tag')
                      const moreDetails = tags.parentElement.querySelector('.cover .moreDetails')
                      
                      moreDetails.style.padding = '10px 0'
                        allTags.forEach(tag => {
                            tag.remove()
                            moreDetails.appendChild(tag)
                        })


                      let div = document.createElement('div')
                      div.innerHTML = `${allTags.length} Καλλιτέχνες <img src="../icons/moreDetailsArrow.png" alt="arrow up">`
                      div.classList.add('tag')
                      div.classList.add('moreDetailsButton')
                      tags.appendChild(div)

                      let moreDetailsFlag = false
                      div.addEventListener('click', () => {

                          if (moreDetailsFlag) {
                              moreDetails.style.bottom = '-100%'
                              moreDetails.parentNode.style.boxShadow = '0 0 0 0 rgba(0, 0, 0, 0.5)'
                              moreDetailsFlag = false
                              div.querySelector('img').style.transform = 'rotate(0)'
                          } else {
                              moreDetails.style.bottom = '0'
                              moreDetailsFlag = true
                              setTimeout(() => {
                                moreDetails.parentNode.style.boxShadow = '0 0 10px 0 rgba(0, 0, 0, 0.5)' 
                              }, 200)
                              div.querySelector('img').style.transform = 'rotate(-180deg)'
                          }
                          
                      })
                    }

                  }
                  


              })
          })
          range += 6
          loader.style.opacity = 0
        }
      </script>
    </main>

    <footer>&nbsp;</footer>

    <script>
      const footer = document.querySelector('footer')

      const cal = function (entries) {
                if (entries[0].isIntersecting) {
                  loader.style.opacity = 1
                  addAlbums()
                } else {
                  loader.style.opacity = '0'
                }
            }
      const observer = new IntersectionObserver(cal)

      observer.observe(footer)



      // Search Bar
      const overlay = document.querySelector('#overlay')
      const searchError = document.querySelector('.searchContainer .error')
      const searchLoader = document.querySelector('.searchContainer .searchLoader')
      const serchInput = document.querySelector('.searchBar input')
      const resultsCont = document.querySelector('.searchContainer .searchBar .resultsContainer')
      const results = document.querySelector('.searchContainer .searchBar .resultsContainer .searchResults')

      overlay.addEventListener('click', () => {
          results.innerHTML = ''
          resultsCont.style.opacity = 0
          resultsCont.style.pointerEvents = 'none'
          overlay.style.opacity = 0 
          overlay.style.zIndex = 0 
          overlay.style.pointerEvents = 'none'
          serchInput.value = ''
          document.body.style.overflow = "scroll"
      })

      serchInput.addEventListener('input', function(e) {

        // Valid characters
        const validPattern = /^[a-zA-ZΑ-Ωα-ωΆ-Ώά-ώΪΫϊϋΐΰ0-9 ']*$/;
        if (!validPattern.test(this.value)) {
          e.target.value = this.value.slice(0, -1)
          searchError.style.opacity = 1
          searchError.textContent = 'Μη έγκυρος χαρακτήρας!'
          return
        } else {
          searchError.style.opacity = 0
        }

        // Do not proceed to search in case of second space
        if (e.target.value.endsWith("  ")) {
          // If two consecutive spaces are found, revert to the value without the second space
          e.target.value = e.target.value.slice(0, -1);  // Remove the extra space
          return;
        }

        // Maximum characters
        if (this.value.length > 70) {
          e.target.value = this.value.slice(0, -1)
          searchError.style.opacity = 1
          searchError.textContent = 'Μέγιστος αριθμός χαρακτήρων'
          return
        } else {
          searchError.style.opacity = 0
        }

        if (this.value.length > 2) {

          document.body.style.overflow = "hidden"

          overlay.style.zIndex = 1000
          overlay.style.opacity = .5
          overlay.style.pointerEvents = 'auto'
          overlay.style.width = "100vw"
          overlay.style.height = "100vh"
          overlay.style.top = window.scrollY + 'px'


          fetch(
            `../fetchArtist.php?eshop&search=${this.value}`
          )
          .then(res => res.json())
          .then(data => {

            results.innerHTML = ''
            resultsCont.style.opacity = 1
            resultsCont.style.pointerEvents = 'auto'

            searchLoader.style.display = ''

            if (data.length === 0)  {
              setTimeout(() => {
                const p = document.createElement('p')
                p.textContent = 'Δεν βρέθηκαν αποτελέσματα'
                results.appendChild(p)
                p.style.cssText = `
                  position: absolute;
                  top: 20%;
                  left: 50%;
                  transform: translate(-50%);
                `
                searchLoader.style.display = 'none'
              }, 500);

              return
              
            }

            setTimeout(() => {
              results.innerHTML = ''
              data.forEach( (album, i) => {
                if (i === 0) searchLoader.style.display = 'none'


                // displayedAlbums.push(+album.album_code)
                
                const theAlbum = document.createElement('div')
                theAlbum.classList.add('searchAlbum')
                theAlbum.setAttribute('data-search-code', album.album_code)

                // Handle title in case text is too long
                const currentTitleLength = album.title.length
                let first45Chars = ''
                if (currentTitleLength > 45) {
                  first45Chars = album.title.slice(0, 46)
                  first45Chars = first45Chars + "..."
                }

                  const albumDetails = `
                    <div class="searchTitle" title="${album.title}">${first45Chars ? first45Chars : album.title}</div>
                    <div class="searchCover"><img src="../images/covers/${album.album_code}.jpg" alt="" /></div>
                    <!--<div class="searchTags"></div>-->
                    <!--<div class="searchPrize">${album.prize}.00€</div>-->
                    <div class="searchButtons">
                      <!-- <div class="details">Προσθήκη στο καλάθι</div> -->
                      <div class="openAlbumSearchDetails" data-search-more="${album.album_code}">Περισσότερα</div>
                    </div>
                  `
                  theAlbum.innerHTML = albumDetails

                  results.appendChild(theAlbum)

                  document.querySelector(`[data-search-more="${album.album_code}"]`).addEventListener('click', function() {
                    window.open(`../album/${this.attributes['data-search-more'].value}`, '_blank').focus();
                  })

                  
                  // album.artist_name.split(", ").forEach((artist, i) => {
                    
                  //   if (artist === '') return

                  //   let tagakia = `<a href="https://www.gsfmusic.gr/${album.artist_code.split(", ")[i]}" target="_blank">${artist}</a>`
                  //   let div = document.createElement('div')
                  //   div.classList.add('searchTag')
                  //   div.innerHTML = tagakia
                  //   document.querySelector(`[data-search-code="${album.album_code}"] .searchTags`).appendChild(div)
                  // })
              })
            }, 500);

          })
        } else {
          results.innerHTML = ''
          resultsCont.style.opacity = 0
          resultsCont.style.pointerEvents = 'none'
          overlay.style.opacity = 0 
          overlay.style.zIndex = 0 
          overlay.style.pointerEvents = 'none' 

          document.body.style.overflow = "scroll"
        }
        
      })


    </script>
  </body>
</html>
