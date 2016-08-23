<?php
session_start();
$timezone = "Asia/Jakarta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
error_reporting(0);
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
    header('location:../../logout.php');
}
else{
include "../../config/koneksi.php";

$op=$_GET[op];
$act=$_GET[act];

if ($op=='hukuman' AND $act=='hapus'){
  mysql_query("DELETE FROM hukuman WHERE id_hukuman='$_GET[id]'");
  header('location:hukuman.php');
}
elseif ($op=='hukuman' AND $act=='input'){
  mysql_query("INSERT INTO hukuman(
			   peg,
			   pasal,
			   pengaduan,
			   hukuman,
			   kep,
			   tgl,
			   ket,
			   periode) 
			   VALUES(
			   '$_POST[peg]',
			   '$_POST[pasal]',
			   '$_POST[pengaduan]',
			   '$_POST[hukuman]',
			   '$_POST[kep]',
			   '$_POST[tgl]',
			   '$_POST[ket]',
			   '$_SESSION[periode]'
			   )");
  header('location:hukuman.php');
}
elseif ($op=='hukuman' AND $act=='update'){
  mysql_query("UPDATE hukuman SET 
				peg 	= '$_POST[peg]', 
				pasal 	= '$_POST[pasal]', 
				pengaduan 	= '$_POST[pengaduan]', 
				hukuman = '$_POST[hukuman]', 
				kep 	= '$_POST[kep]', 
				tgl 	= '$_POST[tgl]', 
				ket 	= '$_POST[ket]' 
				WHERE id_hukuman = '$_POST[id]'");
  header('location:hukuman.php');
}
}
?>
