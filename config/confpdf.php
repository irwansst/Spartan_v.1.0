<?php
define("server", "127.0.0.1");
define("user", "root");
define("pass", "k124t05");
define("db", "db_spartan");

$id_mysql = mysql_connect(server,user,pass);
if(!$id_mysql)
	die("Gagal1");
	
	$db_ku = mysql_select_db(db, $id_mysql);
	if(!$db_ku)
	die("Gagal2");
?>
