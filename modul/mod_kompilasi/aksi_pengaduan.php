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

if ($op=='pengaduan' AND $act=='hapus'){
  mysql_query("DELETE FROM pengaduan WHERE id_pengaduan='$_GET[id]'");
  header('location:pengaduan.php');
}
elseif ($op=='pengaduan' AND $act=='input'){
  mysql_query("INSERT INTO pengaduan(
				tgl,
				sumber,
				terlapor,
				uraian,
				telaah,
				klarifikasi,
				inspeksi,
				kajati,
				jamwas,
				jaksa,
				putusan,
				ket,
				periode) 
			   VALUES(
				'$_POST[tgl]',
				'$_POST[sumber]',
				'$_POST[terlapor]',
				'$_POST[uraian]',
				'$_POST[telaah]',
				'$_POST[klarifikasi]',
				'$_POST[inspeksi]',
				'$_POST[kajati]',
				'$_POST[jamwas]',
				'$_POST[jaksa]',
				'$_POST[putusan]',
				'$_POST[ket]',
				'$_SESSION[periode]'
			   )");
  header('location:pengaduan.php');
}
elseif ($op=='pengaduan' AND $act=='update'){
  mysql_query("UPDATE pengaduan SET 
				tgl 		= '$_POST[tgl]',
				sumber 		= '$_POST[sumber]',
				terlapor 	= '$_POST[terlapor]',
				uraian 		= '$_POST[uraian]',
				telaah 		= '$_POST[telaah]',
				klarifikasi = '$_POST[klarifikasi]',
				inspeksi 	= '$_POST[inspeksi]',
				kajati 		= '$_POST[kajati]',
				jamwas 		= '$_POST[jamwas]',
				jaksa 		= '$_POST[jaksa]',
				putusan 	= '$_POST[putusan]',
				ket 		= '$_POST[ket]'
				WHERE id_pengaduan = '$_POST[id]'");
  header('location:pengaduan.php');
}
}
?>
