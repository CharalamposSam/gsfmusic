<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/favicon.png" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/home4.css">

    <!-- Primary Meta Tags -->
    <title>GSF Music | Αρχική</title>
    <meta name="title" content="GSF Music - Δισκογραφική Εταιρεία">
    <meta name="description" content="Spotify, Youtube Music, Apple Music, Amazon Music, Deezer, Tidal TikTok κ.α.">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://gsfmusic.gr/">
    <meta property="og:title" content="GSF Music - Δισκογραφική Εταιρεία">
    <meta property="og:description" content="Spotify, Youtube Music, Apple Music, Amazon Music, Deezer, Tidal TikTok κ.α.">
    <meta property="og:image" content="https://gsfmusic.gr/images/share/<?php echo $s; ?>.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://gsfmusic.gr">
    <meta property="twitter:title" content="GSF Music - Δισκογραφική Εταιρεία">
    <meta property="twitter:description" content="Spotify, Youtube Music, Apple Music, Amazon Music, Deezer, Tidal TikTok κ.α.">
    <meta property="twitter:image" content="https://gsfmusic.gr/images/share/<?php echo $s; ?>.jpg">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KW2WQCM7C0"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-KW2WQCM7C0');
    </script>
</head>

<body>
    <div class="preloader">
        <div>
            <img class="logo" src="icons/logo.png" alt="GSF Music">
        </div>
    </div>
    <nav>
        <a title="GSF Music">
            <img src="icons/logo.png" alt="Αρχική">
        </a>
        <a href="https://www.gsfrecords.com" title="e-shop">
            <img src="icons/nav-eshop.png" alt="eshop">
        </a>
        <a href="https://www.facebook.com/gsfmusicofficial" title="Facebook">
            <img src="icons/facebook.png" alt="facebook">
        </a>
        <a href="https://www.youtube.com/channel/UCUTJlf84CFiq-eUU0M6Vf3A?sub_confirmation=1%C2%A8" title="Facebook">
            <img src="icons/youtube-icon.png" alt="youtube">
        </a>
    </nav>
    <main>
        <!-- Header -->
        <?php require_once('header.php'); ?>

        <!-- Hero -->
        <div class="hero">
            <div class="heroImg">
                <a target="_blank" href="https://www.youtube.com/watch?v=-sL-9Ck1DCY&ab_channel=GSFMusicOfficial" alt="Ένα τσιγάρο δρόμος">
                    <img src="images/featured/homeHero.jpg" alt="hero">
                </a>
            </div>
        </div>

        <div class="sliderCont">
            <div class="slider">
                <div class="featured">

                <div>
                        <div>
                            <img src="images/featured/featured.jpg" alt="Δανιέλα Χατζή">
                        </div>
                        <a target="_blank" href="https://www.youtube.com/watch?v=2SU3r2Xqo54&ab_channel=GSFMusicOfficial">Περισσότερα <img src="icons/open.png" alt="open"></a>
                    </div>
                    
                    
                <div>
                        <div>
                            <img src="images/featured/feature2.jpg.jpg" alt="Το λαϊκο τραγούδι της Κύπρου">
                        </div>
                        <a target="_blank" href="https://youtu.be/kPrY5JbxNQc">Περισσότερα <img src="icons/open.png" alt="open"></a>
                    </div>


                    <div>
                        <div >
                            <img src="images/featured/featured3.jpg" alt="Γιώργος Χατζής - Γιώργος Κωτσίνης">
                        </div>
                        <a target="_blank" href="https://youtu.be/hB56qkHsIfQ">Περισσότερα <img src="icons/open.png" alt="open"></a>
                    </div>
                    
                    
                    
                    
                </div>
            </div>
        </div>    

        <div class="partners">
            <!-- <p>Ακούστε σε:</p> -->
            <div class="platforms">
                <img src="icons/Partners2.png" alt="Partners">
            </div>
        </div>


        <div class="artistsDetails">

            <?php
                require_once('conn.php');
                $sql = "SELECT COUNT(DISTINCT `album_code`) as albums, COUNT(DISTINCT `connect_codename`) as artists  FROM `connector`";              
                $result = mysqli_query( $conn, $sql );

                while ( $row = mysqli_fetch_assoc( $result ) ) { ?>
                    <span><?php echo $row['artists']; ?> Καλλιτέχνες / <?php echo $row['albums']; ?> albums</span>
            <?php } ?>
        
            
            
            <!-- <span class="slash">&nbsp;/&nbsp;</span>
            
            <span>20000 tracks / 1000 h 45 min</span> -->
        
        </div>

        <div class="artists"></div>

    </main>

    <footer>
        &nbsp;
        <div class="loader">
            <div></div>
            <div class="loader2"></div>
            <div class="loader3"></div>
        </div>
    </footer>

    <script>
        const preloader = document.querySelector('.preloader')
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



        const artists = document.querySelector('.artists')
        let range = 0
        let limit = 6
        

        fetch(
            `fetchArtist.php?artistHomePage&ar&range=${range}&limit=${limit}`
        )
            .then(res => res.json())
            .then(data => {
                
                data.forEach( artist => {
                    let a = document.createElement('a')
                    a.href = `https://www.gsfmusic.gr/${artist.artist_codename}`

                    let duration = artist.summary_duration, hours, min, setDuration
                    //if ( empty($duration) ) { $duration = 0; }
                    if ( duration > 60 ) {
                        hours = duration / 60 | 0;
                        min = duration % 60;
                        setDuration = `${hours} h ${min} min`
                    } else {
                        setDuration = `${duration} min`
                    }

                    const theAlbum = `<div class="artist">
                                            <div class="image">
                                                <img src="images/artists/${artist.artist_codename}.jpg" alt="Artist">
                                            </div>
                                            <div class="name">${artist.artist_name}</div>
                                            <div class="generalDetails">
                                                ${artist.total} albums / ${artist.summary_tracks} tracks / ${setDuration}
                                            </div>
                                        </div> `

                    a.innerHTML = theAlbum
                    artists.appendChild(a)
                })
            })

            range = 6
            limit = 6
            funCompleted = true

            function addAlbums() {
                fetch(
                    `fetchArtist.php?artistHomePage&ar&range=${range}&limit=${limit}`
                )
                .then(res => res.json())
                .then(data => {
                    
                    data.forEach( artist => {
                        let a = document.createElement('a')
                        a.href = `https://www.gsfmusic.gr/${artist.artist_codename}`

                        let duration = artist.summary_duration, hours, min, setDuration
                        //if ( empty($duration) ) { $duration = 0; }
                        if ( duration > 60 ) {
                            hours = duration / 60 | 0;
                            min = duration % 60;
                            setDuration = `${hours} h ${min} min`
                        } else {
                            setDuration = `${duration} min`
                        }

                        const theAlbum = `<div class="artist">
                                                <div class="image">
                                                    <img src="images/artists/${artist.artist_codename}.jpg" alt="Artist">
                                                </div>
                                                <div class="name">${artist.artist_name}</div>
                                                <div class="generalDetails">
                                                    ${artist.total} albums / ${artist.summary_tracks} tracks / ${setDuration}
                                                </div>
                                            </div> `

                        a.innerHTML = theAlbum
                        artists.appendChild(a)

                        range++
                    })
                    funCompleted = true
                })
            }


            

            const footer = document.querySelector('footer')
            const loader = footer.querySelector('.loader')
            let numOfArtists = document.querySelector('.artistsDetails span').textContent
            numOfArtists = +numOfArtists.split(' ')[0]
            let currentNumOfAlbums = 6

            const cal = function (entries) {
                if (entries[0].isIntersecting) {
                    currentNumOfAlbums = document.querySelectorAll('.artists .artist').length
                    console.log(numOfArtists <= currentNumOfAlbums)
                    if (numOfArtists > currentNumOfAlbums) {
                    loader.style.opacity = '1'
                    }
                    if (funCompleted) {
                    funCompleted = false
                    addAlbums()
                    }
                    
                } else {
                    loader.style.opacity = '0'
                }
            }

            const observer = new IntersectionObserver(cal)

            observer.observe(footer)

           // Slider Journalist
            const slider = document.querySelector('.sliderCont')
            const slider2 = document.querySelector('.slider')
            const featured = slider2.querySelector('.featured')

            let pressed = false,
            startX,
            x

            let windowSize = window.innerWidth
                window.addEventListener('resize', () => {
                windowSize = window.innerWidth
                slider2.style.left = '0px'
                windowSize > 1100 ? (slider.style.cursor = 'auto') : null
            })

            slider.addEventListener('mousedown', e => {
                windowSize < 1100 ? (pressed = true) : null
                startX = e.offsetX - slider2.offsetLeft
            })

            slider.addEventListener('touchstart', e => {
                windowSize < 1100 ? (pressed = true) : null
                startX = e.targetTouches[0].pageX - slider2.offsetLeft
            })

            slider.addEventListener('mouseenter', () => {
                if (windowSize < 1100) {
                    slider.style.cursor = 'grab'
                }
            })

            slider.addEventListener('mouseup', () => {
                if (windowSize < 1100) {
                    slider.style.cursor = 'grab'
                }
            })

            window.addEventListener('mouseup', () => {
                pressed = false
            })

            window.addEventListener('touchend', () => {
                pressed = false
            })

            slider.addEventListener('mousemove', e => {
                if (!pressed) return
                e.preventDefault()
                x = e.offsetX
                slider2.style.left = `${x - startX}px`
                checkBoundary()
            })

            slider.addEventListener('touchmove', e => {
                if (!pressed) return
                e.preventDefault()
                x = e.targetTouches[0].pageX
                slider2.style.left = `${x - startX}px`
                checkBoundary()
            })

            function checkBoundary() {
                let outer = slider.getBoundingClientRect()
                let inner = slider2.getBoundingClientRect()

                if (parseInt(slider2.style.left) > 0) {
                    slider2.style.left = '0px'
                } else if (inner.right < outer.right) {
                    slider2.style.left = `-${inner.width - outer.width}px`
                }
            }

            
    </script>
    <script src="js/common.js"></script>
</body>

</html>