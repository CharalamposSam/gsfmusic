<?php
require_once('conn.php');
if(isset($_GET['artist'])){
    $s = $_GET['artist'];
    $r = $_GET['range'];
    $l = $_GET['limit'];

$query = "SELECT connector.album_code, connector.art, connector.links, main.code, main.num_of_tracks, main.duration, main.cd,
main.spotify, main.youtube, main.apple, main.amazon, main.deezer, main.tidal,
main.soundcloud, main.tiktok, artists.type_of_page
FROM connector
INNER JOIN main ON connector.album_code=main.code
INNER JOIN artists ON connector.connect_codename = artists.artist_codename
where connect_codename = '$s' order by orderby DESC LIMIT $r,$l";
$result = mysqli_query($conn, $query);
$links = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo json_encode($links);
}


if(isset($_GET['artistprofile'])){
    $ap = $_GET['artistprofile'];
    $query = "SELECT artist_name FROM artists where artists.artist_codename = '$ap'";
    $result = mysqli_query($conn, $query);
    $artistprofile = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($artistprofile);
}

if(isset($_GET['artistHomePage']) && isset($_GET['ar'])){
    $r = $_GET['range'];
    $l = $_GET['limit'];

    $query = "SELECT artist_codename, artist_name, count(connector.connect_codename) as total, sum(main.num_of_tracks) as summary_tracks, sum(main.duration) as summary_duration
                FROM artists
                LEFT JOIN connector ON artists.artist_codename = connector.connect_codename
                INNER JOIN main ON connector.album_code=main.code
                GROUP BY artist_codename
                ORDER BY artist_name
                LIMIT $r,$l";
    $result = mysqli_query($conn, $query);
    $artistHomePage = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($artistHomePage);
}


if(isset($_GET['albumsPage']) && isset($_GET['ar'])){
    $ar = $_GET['ar'];
    $query = "SELECT artist_name FROM artists where artists.artist_codename = '$ar'";
    $result = mysqli_query($conn, $query);
    $artistprofile = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($artistprofile);
}




if(isset($_GET['eshop']) && isset($_GET['search'])) {
    
    $search = htmlspecialchars($_GET['search'], ENT_QUOTES, 'UTF-8');
    $searchTrim = trim($search);
    $searchFilterd = filter_var($searchTrim, FILTER_SANITIZE_STRING);

    $query = "SELECT DISTINCT * FROM albums WHERE artist_name LIKE '%$search%' OR title LIKE '%$search%' OR description LIKE '%$searchFilterd%';";
    $result = mysqli_query($conn, $query);
    $artistprofile = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($artistprofile);

} else if(isset($_GET['eshop'])) {
    
    $r = $_GET['range'];
    $l = $_GET['limit'];
    $query = "SELECT * FROM `albums` order by id DESC LIMIT $r,$l;";
    $result = mysqli_query($conn, $query);
    $artistprofile = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($artistprofile);

}




