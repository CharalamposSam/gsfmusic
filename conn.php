<?php
if(strpos($_SERVER["HTTP_HOST"], "localhost") !== false){
    $conn = mysqli_connect( 'localhost', 'root', '', 'test' );
} else {
    $conn = mysqli_connect( 'localhost', 'u174548577_charalampos', '386900072422211Le', 'u174548577_url_shortener' );
}



