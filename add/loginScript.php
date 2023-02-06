<?php
if ( isset( $_POST[ 'loginSubmit' ]) ) {

    require_once( '../conn.php' );

    $username = $_POST[ 'username' ];
    $password = $_POST[ 'password' ];

    
     
    $sql = "SELECT * FROM `users` WHERE username='$username'";              
    $result = mysqli_query( $conn, $sql );

    if ( mysqli_num_rows( $result ) > 0 ) {
    
        while ( $row = mysqli_fetch_assoc( $result ) ) {
            $psw = $row[ 'password' ];
            $id = $row[ 'id' ];
        }
        
        if ( $password == $psw ) {
            session_start();
            $_SESSION['userId'] = $id;
            $_SESSION['userUsername'] = $username;
            header("Location: index.php?private&admin");
            exit();
        } else {
            header( "Location: login.php?private&admin&error" );
        }

    } else {
        header( "Location: login.php?private&admin&error" );
        exit();
    }

    
} else {
     header( "Location: https://www.facebook.com/gsfmusicofficial" );
}