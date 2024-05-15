<?php 

session_start();
session_destroy();

header("Location: webku/main.php");

?>