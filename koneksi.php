<?php
$host      = "localhost";
$user      = "root";
$pass      = "";
$db        = "trashgrab";

$koneksi   = mysqli_connect($host, $user, $pass, $db);
if(!$koneksi){
    die("Tidak bisa connect");
} 
// else {
//     echo "Koneksi berhasil";
// }
?>