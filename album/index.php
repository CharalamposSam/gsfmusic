<?php
  if ( isset( $_GET[ 'a' ] ) ) {
    require_once('../conn.php'); 
    $a = strtolower($_GET[ 'a' ]);
    $sql = "SELECT * from albums where album_code = '$a'";              
    $result = mysqli_query( $conn, $sql );

    if ( !$conn ) {
      die( "Connection failed: " . mysqli_connect_error() );
    }
          
    if ( mysqli_num_rows( $result ) == 1 ) { 

      

    $sql = "SELECT albums.title, albums.cd, albums.prize, albums.availability, albums.description, albums.embeddedLink, main.*
    FROM albums
    LEFT JOIN main ON albums.album_code = main.code
    WHERE albums.album_code = '$a';";              
    $result = mysqli_query( $conn, $sql );

    if ( mysqli_num_rows( $result ) == 1 ) {
      while ( $row = mysqli_fetch_assoc( $result ) ) { ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        

        <!-- Primary Meta Tags -->
        <title>GSF Music | <?php echo $row[ 'title' ]; ?></title>
        <meta name="title" content="GSF Music - Δισκογραφική Εταιρεία">
        <meta name="description" content="Ακούστε σε Spotify, Youtube Music, Apple Music, Amazon Music, Deezer, Tidal TikTok κ.α.">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="Music Album">
        <meta property="og:url" content="https://gsfmusic.gr/album/<?php echo $a; ?>">
        <meta property="og:title" content="<?php echo $row[ 'title' ]; ?>">
        <meta property="og:description" content="<?php echo $row[ 'title' ]; ?>. Ακούστε σε Spotify, Youtube Music, Apple Music, Amazon Music, Deezer, Tidal TikTok κ.α.">
        <!-- <meta property="og:image" content="https://gsfmusic.gr/images/share/<?php echo $a; ?>.jpg"> -->

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="https://gsfmusic.gr/album/<?php echo $a; ?>">
        <meta property="twitter:title" content="<?php echo $row[ 'title' ]; ?>">
        <meta property="twitter:description" content="<?php echo $row[ 'title' ]; ?>. Ακούστε σε Spotify, Youtube Music, Apple Music, Amazon Music, Deezer, Tidal TikTok κ.α.">
        <!-- <meta property="twitter:image" content="https://gsfmusic.gr/images/share/<?php echo $s; ?>.jpg"> -->

        <link rel="icon" type="image/png" href="../images/favicon.png" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/artist.css" />
        <link rel="stylesheet" href="style.css" />
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-KW2WQCM7C0"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-KW2WQCM7C0');
        </script>
        <script src="../js/common.js" defer></script>
    </head>

    <body>

        <main>
            <!-- Header -->
            <?php require_once('../header.php'); ?>

            <div class="albums">
        <div class="album">
          <div class="title"><?php echo $row[ 'title' ]; ?></div>
          <div class="cover">
            <img src="../images/covers/<?php echo $a; ?>.jpg" alt="" />
          </div>
          <!-- <div class="tags">
            <div class="tag">Νίκος Τζουκόπουλος</div>
          </div> -->
          <div class="tracksDuration"><?php echo $row[ 'num_of_tracks' ]; ?> tracks / <?php echo $row[ 'duration' ]; ?> min</div>

          <?php if ($row[ 'cd' ] == 1) ?>
            <div class="prize">
              <button <?php if ($row[ 'availability' ] == 0) echo 'class="unavailable"' ?> data-album="<?php echo $a; ?>">Αγορά CD &nbsp;<span>5.00€</span></button>
            </div>
          <?php ?>
        </div>
        <!-- <div class="players">
          <div class="player">
            <div class="triangle"></div>
            <iframe
              width="300px"
              height="168px"
              src="https://www.youtube.com/embed/<?php echo $row[ 'embeddedLink' ]; ?>"
              title="YouTube video player"
              frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
              allowfullscreen
            ></iframe>
          </div>
          <div class="buttons">
            <?php if ($row[ 'spotify' ] != null) { ?>
            <a target="_blank" href="<?php echo $row[ 'spotify' ]; ?>"><button class="spotifyBtn" title="Spotify"><img src="../icons/spotify.png" alt="spotify"></button></a>
            <?php } ?>
            <?php if ($row[ 'youtube' ] != null) { ?>
            <a target="_blank" href="<?php echo $row[ 'youtube' ]; ?>"><button class="youtubeBtn" title="YouTube Music"><img src="../icons/youtube.png" alt="youtube"></button></a>
            <?php } ?>
            <?php if ($row[ 'apple' ] != null) { ?>
            <a target="_blank" href="<?php echo $row[ 'apple' ]; ?>"><button class="appleBtn" title="Apple"><img src="../icons/apple.png" alt="apple"></button></a>
            <?php } ?>
            <?php if ($row[ 'amazon' ] != null) { ?>
            <a target="_blank" href="<?php echo $row[ 'amazon' ]; ?>"> <button class="amazonBtn" title="Amazon Music"><img src="../icons/amazon.png" alt="amazon"></button></a>
            <?php } ?>
            <?php if ($row[ 'deezer' ] != null) { ?>
            <a target="_blank" href="<?php echo $row[ 'deezer' ]; ?>"><button class="deezerBtn" title="Deezer"><img src="../icons/deezer.png" alt="deezer"></button></a>
            <?php } ?>
            <?php if ($row[ 'tidal' ] != null) { ?>
            <a target="_blank" href="<?php echo $row[ 'tidal' ]; ?>"><button class="tidalBtn" title="Tidal"><img src="../icons/tidal.png" alt="tidal"></button></a>
            <?php } ?>
          </div> 

          <div class="otherPlatforms">
            <div class="platform"><span>&#10003;</span>TikTok</div>
            <div class="platform"><span>&#10003;</span>Instagram</div>
            <div class="platform"><span>&#10003;</span>Facebook</div>
            <div class="platform"><span>&#10003;</span>iTunes</div>
          </div>-->
          <!-- <a href="" class="artistProfile"><button>Artist Profile</button></a href=""> -->
        <!--</div> -->
      </div> 
      <div class="description"><?php echo $row[ 'description' ]; ?></div>
        </main>
    </body>
</html>

<?php 
        }
      } else {
        header( "Location: ../" );
      }
    } else {
      header( "Location: ../" );
    }
  } else {
    header( "Location: ../" );
  }
?>