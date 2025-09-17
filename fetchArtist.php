<?php
require_once('conn.php');

header('Content-Type: application/json; charset=utf-8');

// ========== 1. Artist ==========
if (isset($_GET['artist'])) {
    $s = $_GET['artist'];
    $r = filter_input(INPUT_GET, 'range', FILTER_VALIDATE_INT);
    $l = filter_input(INPUT_GET, 'limit', FILTER_VALIDATE_INT);

    if ($r === false || $l === false) {
        http_response_code(400);
        echo json_encode(["error" => "Invalid parameters."]);
        exit;
    }

    $sql = "SELECT connector.album_code, connector.art, connector.links, 
                   main.code, main.num_of_tracks, main.duration, main.cd,
                   main.spotify, main.youtube, main.apple, main.amazon, main.deezer, 
                   main.tidal, main.soundcloud, main.tiktok, 
                   artists.type_of_page
            FROM connector
            INNER JOIN main ON connector.album_code = main.code
            INNER JOIN artists ON connector.connect_codename = artists.artist_codename
            WHERE connect_codename = ?
            ORDER BY orderby DESC
            LIMIT ?, ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $s, $r, $l);
    $stmt->execute();
    $result = $stmt->get_result();
    echo json_encode($result->fetch_all(MYSQLI_ASSOC), JSON_UNESCAPED_UNICODE);
}


// ========== 2. Artist Profile ==========
if (isset($_GET['artistprofile'])) {
    $ap = $_GET['artistprofile'];

    $sql = "SELECT artist_name 
            FROM artists 
            WHERE artists.artist_codename = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $ap);
    $stmt->execute();
    $result = $stmt->get_result();
    echo json_encode($result->fetch_all(MYSQLI_ASSOC), JSON_UNESCAPED_UNICODE);
}


// ========== 3. Artist Home Page ==========
if (isset($_GET['artistHomePage']) && isset($_GET['ar'])) {
    $r = filter_input(INPUT_GET, 'range', FILTER_VALIDATE_INT);
    $l = filter_input(INPUT_GET, 'limit', FILTER_VALIDATE_INT);

    if ($r === false || $l === false) {
        http_response_code(400);
        echo json_encode(["error" => "Invalid parameters."]);
        exit;
    }

    $sql = "SELECT artists.artist_codename, artists.artist_name, 
                   COUNT(connector.connect_codename) AS total, 
                   SUM(main.num_of_tracks) AS summary_tracks, 
                   SUM(main.duration) AS summary_duration
            FROM artists
            LEFT JOIN connector ON artists.artist_codename = connector.connect_codename
            INNER JOIN main ON connector.album_code = main.code
            GROUP BY artists.artist_codename
            ORDER BY artists.artist_name
            LIMIT ?, ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $r, $l);
    $stmt->execute();
    $result = $stmt->get_result();
    echo json_encode($result->fetch_all(MYSQLI_ASSOC), JSON_UNESCAPED_UNICODE);
}


// ========== 4. Albums Page ==========
if (isset($_GET['albumsPage']) && isset($_GET['ar'])) {
    $ar = $_GET['ar'];

    $sql = "SELECT artist_name 
            FROM artists 
            WHERE artists.artist_codename = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $ar);
    $stmt->execute();
    $result = $stmt->get_result();
    echo json_encode($result->fetch_all(MYSQLI_ASSOC), JSON_UNESCAPED_UNICODE);
}


// ========== 5. Eshop ==========
if (isset($_GET['eshop']) && isset($_GET['search'])) {
    // Καθαρισμός input
    $search = trim($_GET['search']);

    // Ασφάλεια: χρησιμοποιούμε prepared statements
    $sql = "SELECT DISTINCT * 
            FROM albums 
            WHERE artist_name LIKE CONCAT('%', ?, '%') 
               OR title LIKE CONCAT('%', ?, '%') 
               OR description LIKE CONCAT('%', ?, '%')";

    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("sss", $search, $search, $search);
        $stmt->execute();
        $result = $stmt->get_result();
        $artistprofile = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($artistprofile, JSON_UNESCAPED_UNICODE);
    } else {
        http_response_code(500);
        echo json_encode(["error" => "Database error."]);
    }

} elseif (isset($_GET['eshop'])) {
    // Validation για range & limit
    $r = filter_input(INPUT_GET, 'range', FILTER_VALIDATE_INT);
    $l = filter_input(INPUT_GET, 'limit', FILTER_VALIDATE_INT);

    if ($r === false || $l === false) {
        http_response_code(400);
        echo json_encode(["error" => "Invalid parameters."]);
        exit;
    }

    $sql = "SELECT * FROM albums ORDER BY id DESC LIMIT ?, ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ii", $r, $l);
        $stmt->execute();
        $result = $stmt->get_result();
        $artistprofile = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($artistprofile, JSON_UNESCAPED_UNICODE);
    } else {
        http_response_code(500);
        echo json_encode(["error" => "Database error."]);
    }
}




