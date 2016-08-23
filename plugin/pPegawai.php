<?php
include "../config/koneksi.php";
$q = strtolower($_GET["q"]);
if (!$q) return;

$sql = mysql_query("select nama from pegawai where nama LIKE '%$q%'");
while($r = mysql_fetch_array($sql)) {
	$pegawai = $r['nama'];
	echo "$pegawai \n";
}
?>
