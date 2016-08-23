<?php
$server = "localhost";
$username = "root";
$password = "k124t05";
$database = "db_spartan";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
?>
