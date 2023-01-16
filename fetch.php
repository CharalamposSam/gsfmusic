<?php
require_once('conn.php');
if(isset($_GET['code'])){
    $code = $_GET['code'];


$query = "SELECT code, spotify, youtube, apple, amazon, deezer, tidal, soundcloud, cd FROM main WHERE code='$code' ";
$result = mysqli_query($conn, $query);
$links = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo json_encode($links);

} 