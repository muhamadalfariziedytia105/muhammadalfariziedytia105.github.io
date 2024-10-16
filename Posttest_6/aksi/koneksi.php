<?php

$host = "localhost";
$user = "root";
$pass = "";
$bb = "bitebox";

$conn = mysqli_connect($host, $user, $pass, $bb);

if (!$conn) {
	die("gagal terhubung" . mysqli_connect_error());
}
?>