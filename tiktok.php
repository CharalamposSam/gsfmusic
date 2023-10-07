<?php

if ( isset ($_GET[ 'c' ]) ) {
    $code = $_GET[ 'c' ];
    require_once('conn.php');

    if ( !$conn ) {
        die( "Connection failed: " . mysqli_connect_error() );
    }

    $sql = "SELECT tiktok, tiktokClicks FROM `main` WHERE code='$code'";              
    $result = mysqli_query( $conn, $sql );

    if ( mysqli_num_rows( $result ) > 0 ) {
    
        while ( $row = mysqli_fetch_assoc( $result ) ) {
            $direction = $row[ 'tiktok' ];
            $clicks = $row[ 'tiktokClicks' ];
        }
        $clicks++;
        $sql2 = "UPDATE main SET tiktokClicks = $clicks where code='$code'";
        mysqli_query( $conn, $sql2 );
        header( "Location: " . $direction );

    } else {
        header( "Location: https://www.gsfmusic.gr" );
    }

    mysqli_close( $conn );

} else {
    header( "Location: https://www.gsfmusic.gr" );
}

