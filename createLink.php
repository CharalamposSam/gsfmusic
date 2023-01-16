<?php

if ( isset ($_POST[ 'submit' ]) ) {
    $code = $_POST[ 'code' ];
    $spotify = $_POST[ 'spotify' ];
    $youtube = $_POST[ 'youtube' ];
    $apple = $_POST[ 'apple' ];
    $amazon = $_POST[ 'amazon' ];
    $deezer = $_POST[ 'deezer' ];
    $tidal = $_POST[ 'tidal' ];
    $soundcloud = $_POST[ 'soundcloud' ];
    $cd = $_POST[ 'cd' ];


    require_once('conn.php');

    if ( !$conn ) {
        die( "Connection failed: " . mysqli_connect_error() );
    }

    $sql = "INSERT INTO main ( code, spotify, youtube, apple, amazon, deezer, tidal, soundcloud, cd, spotifyClicks, youtubeClicks, appleClicks, amazonClicks, deezerClicks, tidalClicks, soundcloudClicks, cdClicks )
        VALUES ( '$code', '$spotify', '$youtube' ,'$apple' ,'$amazon', '$deezer', '$tidal', '$soundcloud', '$cd', '0', '0', '0', '0', '0', '0', '0', '0' )";    

    mysqli_query( $conn, $sql );
    mysqli_close( $conn );

    header( "Location: add.php?private&admin&success" );
}