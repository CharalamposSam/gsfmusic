<?php

if ( isset ($_POST[ 'submit' ]) ) {
    $code = $_POST[ 'code' ];
    $spotify = $_POST[ 'spotify' ];
    $youtube = $_POST[ 'youtube' ];
    $apple = $_POST[ 'apple' ];
    $amazon = $_POST[ 'amazon' ];
    $deezer = $_POST[ 'deezer' ];
    $tidal = $_POST[ 'tidal' ];
    $cd = $_POST[ 'cd' ];
    $tracks = $_POST[ 'tracks' ];
    $duration = $_POST[ 'duration' ];


    require_once('../conn.php');

    if ( !$conn ) {
        die( "Connection failed: " . mysqli_connect_error() );
    }

    $sql = "INSERT INTO main ( code, num_of_tracks, duration, spotify, youtube, apple, amazon, deezer, tidal, cd, spotifyClicks, youtubeClicks, appleClicks, amazonClicks, deezerClicks, tidalClicks, cdClicks )
        VALUES ( '$code', '$tracks', '$duration', '$spotify', '$youtube' ,'$apple' ,'$amazon', '$deezer', '$tidal', '$cd', '0', '0', '0', '0', '0', '0', '0')";    

    mysqli_query( $conn, $sql );
    mysqli_close( $conn );

    header( "Location: index.php?private&admin&success" );
}