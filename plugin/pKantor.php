<?php
include "../config/koneksi.php";

$q 			= $_GET["q"];
$my_data	= mysql_real_escape_string($q);
$sql=mysql_query("SELECT kantor FROM rKantor WHERE kantor like '%$my_data%' ORDER BY kantor");
while($data=mysql_fetch_array($sql)){
	echo $data['kantor']."\n";
	}
?>
