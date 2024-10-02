<?php 


?>

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
    <main>
      
    <!-- Header -->
    <?php require_once('../header.php'); ?>

      <div class="searchContainer">
        <div class="searchBar">
          <input type="text" name="" id="" placeholder="Search..." />
        </div>
        <div class="categories">
          <div class="category margin">Λαϊκά</div>
          <div class="category margin">Λαϊκά</div>
          <div class="category margin">Λαϊκά</div>
          <div class="category margin">Λαϊκά</div>
          <div class="category margin">Λαϊκά</div>
        </div>
      </div>
      <div class="albums">

      <?php
            require_once('../conn.php');
            $sql = "SELECT album_code, title, artist, prize FROM `albums`";              
            $result = mysqli_query( $conn, $sql );

            while ( $row = mysqli_fetch_assoc( $result ) ) { ?>

                <div class="album" data-code="<?php echo $row['album_code']; ?>">
                <div class="title"><?php echo $row['title']; ?></div>
                <div class="cover"><img src="../images/covers/<?php echo $row['album_code']; ?>.jpg" alt="" /></div>
                <div class="tags" data-album="<?php echo $row['album_code']; ?>">
                  
                  <script>
                    '<?php echo $row['artist']; ?>'.split(", ").forEach(artist => {
                      if (artist !== '') {
                        fetch(`../fetchArtist.php?albumsPage&ar=${artist}`)
                          .then(res => res.json())
                          .then(data => {
                            let tagakia = `<a href="https://www.gsfmusic.gr/${artist.trim()}" target="_blank">${data[0].artist_name}</a>`
                            let div = document.createElement('div')
                            div.classList.add('tag')
                            div.innerHTML = tagakia
                            document.querySelector('[data-album="<?php echo $row['album_code']; ?>"]').appendChild(div)
                        })
                      } 
                    });
                  </script>
                  
                </div>
                <div class="prize"><?php echo $row['prize']; ?>.00€</div>
                <div class="buttons">
                    <!-- <div class="details">Προσθήκη στο καλάθι</div> -->
                    <div class="details" data-more="<?php echo $row['album_code']; ?>">Περισσότερα</div>
                    <script>
                      document.querySelector('[data-more="<?php echo $row['album_code']; ?>"]').addEventListener('click', function() {
                        
                        window.open(`../album/index.php?a=${this.attributes['data-more'].value}`, '_blank').focus();
                      })
                    </script>
                </div>
                </div>
        <?php } ?>
       
        
      </div>
    </main>
  </body>
</html>
