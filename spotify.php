<?php

if ( isset ($_GET[ 'c' ]) ) {
    $code = $_GET[ 'c' ];
    require_once('conn.php');

    if ( !$conn ) {
        die( "Connection failed: " . mysqli_connect_error() );
    }

    $sql = "SELECT spotify, spotifyClicks FROM `main` WHERE code='$code'";              
    $result = mysqli_query( $conn, $sql );

    if ( mysqli_num_rows( $result ) > 0 ) {
    
        while ( $row = mysqli_fetch_assoc( $result ) ) {
            $direction = $row[ 'spotify' ];
            $clicks = $row[ 'spotifyClicks' ];
        }
        $clicks++;
        $sql2 = "UPDATE main SET spotifyClicks = $clicks where code='$code'";
        mysqli_query( $conn, $sql2 );
        header( "Location: " . $direction );

    } else {
        header( "Location: https://www.facebook.com/gsfmusicofficial" );
    }

    mysqli_close( $conn );

} else {
    header( "Location: https://www.facebook.com/gsfmusicofficial" );
}

