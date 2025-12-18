<?php
if ( isset( $_GET[ 's' ] ) ) {
    require_once('conn.php');
    $s = strtolower($_GET[ 's' ]);
    $artistExists = false;
    $sql = "SELECT * from artists where artist_codename = '$s'";              
    $result = mysqli_query( $conn, $sql );
        
    if ( mysqli_num_rows( $result ) > 0 ) { 
        $artistExists = true;
    }

    if ( $s == 'facebook' ) {
        header( "Location: https://www.facebook.com/gsfmusicofficial" );
    } else if ( $s == 'fb' ) {
        header( "Location: https://www.facebook.com/gsfmusicofficial" );
    } else if ( $s == 'ig' ) {
        header( "Location: https://www.instagram.com/gsfmusicofficial/" );
    } else if ( $s == 'eshop' ) {
        header( "Location: eshop/" );
    } else if ( $s == 'eshop' ) {
        header( "Location: https://gsfrecords.com" );
    } else if ( $s == 'instagram' ) {
        header( "Location: https://www.instagram.com/gsfmusicofficial/" );
    } else if ( $s == 'youtube' ) {
        header( "Location: https://www.youtube.com/channel/UCUTJlf84CFiq-eUU0M6Vf3A?sub_confirmation=1%C2%A8" );
    } else if ( $s == 'mavrantzas' ) {
        header( "Location: https://www.facebook.com/profile.php?id=100000635164405" );
    } else if ( $s == 'mitsiakis' ) {
        header( "Location: https://www.facebook.com/billmitsiakis" );
    } else if ( $s == 'karagiorgos' ) {
        header( "Location: https://www.facebook.com/stkaragiorgos" );
    } else if ($s == 'tiktok') {
         header( "Location: https://www.tiktok.com/@gsfmusic" );
    } else if ( $artistExists ) {
                    
        if ( !$conn ) {
            die( "Connection failed: " . mysqli_connect_error() );
        }

        $sql = "SELECT * from artists where artist_codename = '$s'";              
        $result = mysqli_query( $conn, $sql );
        
        if ( mysqli_num_rows( $result ) > 0 ) { ?>

            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <?php while ( $row = mysqli_fetch_assoc( $result ) ) { ?>
                <?php $typeOfPage = $row[ 'type_of_page' ] ?>

                <!-- Primary Meta Tags -->
                <title>GSF Music | <?php echo $row[ 'artist_name' ]; ?></title>
                <meta name="title" content="GSF Music - Δισκογραφική Εταιρεία">
                <meta name="description" content="Ακούστε σε Spotify, Youtube Music, Apple Music, Amazon Music, Deezer, Tidal TikTok κ.α.">

                <!-- Open Graph / Facebook -->
                <meta property="og:type" content="website">
                <meta property="og:url" content="https://gsfmusic.gr/<?php echo $s; ?>">
                <meta property="og:title" content="GSF Music - Δισκογραφική Εταιρεία">
                <meta property="og:description" content="Ακούστε σε Spotify, Youtube Music, Apple Music, Amazon Music, Deezer, Tidal TikTok κ.α.">
                <meta property="og:image" content="https://gsfmusic.gr/images/metadata/<?php echo $s; ?>.jpg">

                <!-- Twitter -->
                <meta property="twitter:card" content="summary_large_image">
                <meta property="twitter:url" content="https://gsfmusic.gr/<?php echo $s; ?>">
                <meta property="twitter:title" content="GSF Music - Δισκογραφική Εταιρεία">
                <meta property="twitter:description" content="Ακούστε σε Spotify, Youtube Music, Apple Music, Amazon Music, Deezer, Tidal TikTok κ.α.">
                <meta property="twitter:image" content="https://gsfmusic.gr/images/metadata/<?php echo $s; ?>.jpg">

                <link rel="icon" type="image/png" href="images/favicon.png" />
                <link rel="preconnect" href="https://fonts.gstatic.com">
                <link rel="preconnect" href="https://fonts.gstatic.com">
                <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">
                <link rel="stylesheet" href="css/artist.css">
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
                <div class="previewHero">
                    <div>
                        <img src="images/heros/<?php echo $s; ?>Hero.jpg" alt="hero">
                    </div>
                </div>
                <div class="loader">
                    <div></div>
                    <div class="loader2"></div>
                    <div class="loader3"></div>
                </div>
                <div class="preloader">
                    <div>
                        <img class="logo" src="icons/logo.png" alt="GSF Music">
                    </div>
                </div>

                <main>
                    <!-- Header -->
                    <?php require_once('header.php'); ?>
            
                    <!-- Hero -->
                    <div class="hero">
                        <div class="heroImg">
                            <img src="images/heros/<?php echo $s; ?>Hero.jpg" alt="hero">
                        </div>

                        <?php if ( $row[ 'artist_image' ] != '' ) { ?>
                        <div class="profileImg">
                            <div class="profileDiv">

                                <?php  if ( $row[ 'artist_image' ] != '' ) { ?>
                                    <img src="images/artists/<?php echo $row[ 'artist_image' ]; ?>" alt="<?php echo $row[ 'artist_name' ]; ?>">
                                <?php } else { ?>
                                    <img src="icons/user.png" alt="artist">
                                    <?php } ?>
                            
                            </div>
                        </div>
                        <?php } ?>


                    </div>
                    <div class="artist">
                        <div class="name"><?php echo $row[ 'artist_name' ]; ?></div>
                        <?php if ( !$row[ 'description' ] == '' ) { ?>
                            <div class="description"><?php echo $row[ 'description' ]; ?></div>
                        <?php } ?>
                        <div class="social">

                            <?php if ( $row[ 'artist_facebook' ] != '' ) { ?>
                            <a target="_blank" title="Facebook"
                             href="<?php echo $row[ 'artist_facebook' ]; ?>">
                                    <img src="icons/facebook.png" alt="facebook">
                            </a>
                            <?php } ?>

                            <?php if ( $row[ 'artist_spotify' ] != '' ) { ?>
                            <a target="_blank" title="Spotify"
                             href="<?php echo $row[ 'artist_spotify' ]; ?>">
                                    <img src="icons/spotify.png" alt="spotify">
                            </a>
                            <?php } ?>
                            
                            <?php if ( $row[ 'artist_instagram' ] != '' ) { ?>
                            <a target="_blank" title="Instagram"
                             href="<?php echo $row[ 'artist_instagram' ]; ?>">
                                <img src="icons/instagram.png" alt="instagram">
                            </a>
                            <?php } ?>
                                
                            <?php if ( $row[ 'artist_youtube' ] != '' ) { ?>
                            <a target="_blank" title="YouTube"
                             href="<?php echo $row[ 'artist_youtube' ]; ?>">
                                <img src="icons/youtube-icon.png" alt="youtube">
                            </a>
                            <?php } ?>

                        </div>
                        <?php } ?>

                           <div class="generalDetail">
                            <?php
                                $sql_count = "SELECT count(connector.id) as total, sum(main.num_of_tracks) as summary_tracks, sum(main.duration) as summary_duration FROM connector INNER JOIN main ON connector.album_code=main.code where connect_codename = '$s'";              
                                $result_count = mysqli_query( $conn, $sql_count );
                                
                                while ( $counter = mysqli_fetch_assoc( $result_count ) ) {
                                   
                                    $albums = $counter['total'];
                                                                
                                    $tracks = $counter['summary_tracks'];
                                    if ( empty($tracks) ) { $tracks = 0; }
                                   
                                    
                                    $duration = $counter['summary_duration'];
                                    if ( empty($duration) ) { $duration = 0; }
                                    if ( $duration > 60 ) {
                                        $hours = $duration / 60 | 0;
                                        $min = $duration % 60;
                                    } 
                                } 

                                echo $albums . ' albums / ' . $tracks . ' tracks / ';  if ( $duration > 60 ) { echo $hours . 'h '. $min . 'min'; } else { echo $duration .  ' min';  }
                            ?>  
                                
                                
                         </div>

                            
                        </div>
                    

                    
 
                    <div class="albums"></div>
                </main>

                <footer>&nbsp;</footer>
            </body>
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

                const albums = document.querySelector('.albums')
                const loader = document.querySelector('.loader')

                let range = 0
                let limit = 6
                fetch(
                `fetchArtist.php?artist=<?php echo $s; ?>&range=${range}&limit=${limit}`
                )
                .then(res => res.json())
                .then(data => {
                    if (data.length == 1) albums.style.gridTemplate = 'auto/repeat(1, 340px)'
                    if (data.length == 2) albums.style.gridTemplate = 'auto/repeat(2, 340px)'

                    data.forEach(album => {
                    let buttons = ''

                    if (album.cd != '')
                        buttons += `<a target="_blank" href="${album.cd}"><button class="cdBtn" title="CD"><img src="icons/e-shop.png" alt="cd"></button></a>`

                    if (album.spotify != '')
                        buttons += `<a target="_blank" href="${album.spotify}"><button class="spotifyBtn" title="Spotify"><img src="icons/spotify.png" alt="spotify"></button></a>`

                    if (album.youtube != '')
                        buttons += `<a target="_blank" href="${album.youtube}"><button class="youtubeBtn" title="YouTube Music"><img src="icons/youtube.png" alt="youtube"></button></a>`

                    if (album.apple != '')
                        buttons += `<a target="_blank" href="${album.apple}"><button class="appleBtn" title="Apple"><img src="icons/apple.png" alt="apple"></button></a>`

                    if (album.amazon != '')
                        buttons += `<a target="_blank" href="${album.amazon}"> <button class="amazonBtn" title="Amazon Music"><img src="icons/amazon.png" alt="amazon"></button></a>`

                    if (album.deezer != '')
                        buttons += `<a target="_blank" href="${album.deezer}"><button class="deezerBtn" title="Deezer"><img src="icons/deezer.png" alt="deezer"></button></a>`

                    if (album.tidal != '')
                        buttons += `<a target="_blank" href="${album.tidal}"><button class="tidalBtn" title="Tidal"><img src="icons/tidal.png" alt="tidal"></button></a>`

                    if (album.tiktok != '')
                    buttons += `<a target="_blank" href="${album.tiktok}"><button class="tiktokBtn" title="TikTok"><img src="icons/tiktok.png" alt="tiktok"></button></a>`

                    if (album.soundcloud != '')
                        buttons += `<a target="_blank" href="${album.soundcloud}"><button class="soundcloudBtn" title="Soundcloud"><img src="icons/soundcloud.png" alt="soundcloud"></button></a>`

                    const theAlbum = `<div class="cover"><div class="moreDetails"></div><img src="images/covers/${album.code}.jpg" alt="Cover"></div>
                                            <div class="details">
                                                <div id="${album.code}" class="tags">
                                                </div>
                                                <div class="tracksDuration">
                                                    ${album.num_of_tracks} tracks / ${album.duration} min
                                                </div>
                                                <div class="buttons">${buttons}</div>
                                            </div>`

                    let div = document.createElement('div')
                    div.classList.add('album')
                    div.innerHTML = theAlbum
                    albums.appendChild(div)
                    loader.style.opacity = '0'

                    let tags = album.art.split(','),
                        links = album.links.split(',')

                    if (album.type_of_page == 'selida') {

                        
                        links.forEach((link, i) => {
                        if (link != '') {
                            fetch(
                            `fetchArtist.php?&artistprofile=${link.trim()}`
                            )
                            .then(res => res.json())
                            .then(data => {
                                let tagakia = `<a href="https://www.gsfmusic.gr/${link.trim()}" target="_blank">${
                                data[0].artist_name
                                }</a>`
                                let div = document.createElement('div')
                                div.classList.add('tag')
                                div.classList.add('link')
                                
                                div.innerHTML = tagakia
                                const parentElement = document.getElementById(album.code)
                                parentElement.appendChild(div)
                                const allTags = parentElement.querySelectorAll('.link a')
                                
                                if ( allTags.length == links.length && allTags[0].parentNode.clientHeight > 20) {
                                    moreDetails(parentElement) 
                                } 
                            })
                        }
                        })
                    } else {
                        tags.forEach((tag, i) => {
                        if (tag != '') {
                            let tagakia = tag.trim()

                            let div = document.createElement('div')
                            div.classList.add('tag')
                            div.textContent = tagakia
                            document.getElementById(album.code).appendChild(div)
                        }
                        })
                    }
                    })
                })

                range = 6
                limit = 3
                let funCompleted = true
                function addAlbums() {
                fetch(
                    `fetchArtist.php?artist=<?php echo $s; ?>&range=${range}&limit=${limit}`
                )
                    .then(res => res.json())
                    .then(data => {
                    data.forEach((album, i) => {
                        let buttons = ''

                        if (album.cd != '')
                        buttons += `<a target="_blank" href="${album.cd}"><button class="cdBtn" title="CD"><img src="icons/e-shop.png" alt="cd"></button></a>`

                        if (album.spotify != '')
                        buttons += `<a target="_blank" href="${album.spotify}"><button class="spotifyBtn" title="Spotify"><img src="icons/spotify.png" alt="spotify"></button></a>`

                        if (album.youtube != '')
                        buttons += `<a target="_blank" href="${album.youtube}"><button class="youtubeBtn" title="YouTube Music"><img src="icons/youtube.png" alt="youtube"></button></a>`

                        if (album.apple != '')
                        buttons += `<a target="_blank" href="${album.apple}"><button class="appleBtn" title="Apple"><img src="icons/apple.png" alt="apple"></button></a>`

                        if (album.amazon != '')
                        buttons += `<a target="_blank" href="${album.amazon}"> <button class="amazonBtn" title="Amazon Music"><img src="icons/amazon.png" alt="amazon"></button></a>`

                        if (album.deezer != '')
                        buttons += `<a target="_blank" href="${album.deezer}"><button class="deezerBtn" title="Deezer"><img src="icons/deezer.png" alt="deezer"></button></a>`

                        if (album.tidal != '')
                        buttons += `<a target="_blank" href="${album.tidal}"><button class="tidalBtn" title="Tidal"><img src="icons/tidal.png" alt="tidal"></button></a>`

                        // if (album.tiktok != '')
                        // buttons += `<a target="_blank" href="${album.tiktok}"><button class="tiktokBtn" title="TikTok"><img src="icons/tiktok.png" alt="tiktok"></button></a>`

                        if (album.soundcloud != '')
                        buttons += `<a target="_blank" href="${album.soundcloud}"><button class="soundcloudBtn" title="Soundcloud"><img src="icons/soundcloud.png" alt="soundcloud"></button></a>`

                        const theAlbum = `<div class="cover"><div class="moreDetails"></div><img src="images/covers/${album.code}.jpg" alt="Cover"></div>
                                            <div class="details">
                                                <div id="${album.code}" class="tags">
                                                </div>
                                                <div class="tracksDuration">
                                                    ${album.num_of_tracks} tracks / ${album.duration} min
                                                </div>
                                                <div class="buttons">${buttons}</div>
                                            </div>`

                        let div = document.createElement('div')
                        div.classList.add('album')
                        div.classList.add('albumEntrace')
                        div.innerHTML = theAlbum

                        let tags = album.art.split(','),
                        links = album.links.split(',')

                        if (album.type_of_page == 'selida') {
                        links.forEach((link, i) => {
                            if (link != '') {
                            fetch(
                                `fetchArtist.php?&artistprofile=${link.trim()}`
                            )
                                .then(res => res.json())
                                .then(data => {
                                    let tagakia = `<a href="https://www.gsfmusic.gr/${link.trim()}" target="_blank">${
                                    data[0].artist_name
                                    }</a>`
                                    let div = document.createElement('div')
                                    div.classList.add('tag')
                                    div.classList.add('link')
                                    
                                    div.innerHTML = tagakia
                                    const parentElement = document.getElementById(album.code)
                                    parentElement.appendChild(div)
                                    const allTags = parentElement.querySelectorAll('.link a')
                                    
                                    if ( allTags.length == links.length && allTags[0].parentNode.clientHeight > 20) {
                                        moreDetails(parentElement) 
                                    }
                                })
                            }
                        })
                        } else {
                        tags.forEach(tag => {
                            
                            if (tag != '') {
                            let tagakia = tag.trim()

                            let div = document.createElement('div')
                            div.classList.add('tag')
                            div.textContent = tagakia
                            setTimeout(() => {
                                document.getElementById(album.code).appendChild(div)
                            }, 1000)
                            }
                        })
                        }

                        albums.appendChild(div)
                        setTimeout(() => {
                        div.style.opacity = '1'
                        }, 100)

                        range++
                    })
                    funCompleted = true
                    })
                }

                let numOfAlbums = document.querySelector('.generalDetail').textContent
                numOfAlbums = +numOfAlbums.trim().slice(0, 2)

                const footer = document.querySelector('footer')
                const cal = function (entries) {
                    if (entries[0].isIntersecting) {
                        if (albums.querySelectorAll('.album').length < numOfAlbums) {
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

                
                function moreDetails(album) {
                    const allTags = album.querySelectorAll('.link')
                    const moreDetails = allTags[0].parentNode.parentNode.parentNode.querySelector('.moreDetails')
                    
                    moreDetails.style.padding = '10px 0'
                    allTags.forEach(tag => {
                        tag.remove()
                        moreDetails.appendChild(tag)
                    })

                    let div = document.createElement('div')
                    div.innerHTML = `${allTags.length} Καλλιτέχνες <img src="icons/moreDetailsArrow.png" alt="arrow up">`
                    div.classList.add('tag')
                    div.classList.add('moreDetailsButton')
                    album.appendChild(div)

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

            </script>
            <script src="js/artist.js"></script>
            <script src="js/common.js"></script>

            </html>

    <?php }

    } else {
        header( "Location: https://www.gsfmusic.gr" );
    }
    
} else {
    require_once('home.php');
}

?>