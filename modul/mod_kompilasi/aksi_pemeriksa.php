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

if ($op=='pemeriksa' AND $act=='hapus'){
  mysql_query("DELETE FROM pemeriksa WHERE id_pemeriksa='$_GET[id]'");
  header('location:pemeriksa.php');
}
elseif ($op=='pemeriksa' AND $act=='input'){
  mysql_query("INSERT INTO pemeriksa(
				tgl,
				sumber,
				terlapor,
				uraian,
				telaahan,
				petunjuk,
				lporan,
				petunjuk1,
				lporan2,
				petunjuk2,
				putusan,
				ket,
				periode) 
			   VALUES(
				'$_POST[tgl]',
				'$_POST[sumber]',
				'$_POST[terlapor]',
				'$_POST[uraian]',
				'$_POST[telaahan]',
				'$_POST[petunjuk]',
				'$_POST[lporan]',
				'$_POST[petunjuk1]',
				'$_POST[lporan2]',
				'$_POST[petunjuk2]',
				'$_POST[putusan]',
				'$_POST[ket]',
				'$_SESSION[periode]'
			   )");
  header('location:pemeriksa.php');
}
elseif ($op=='pemeriksa' AND $act=='update'){
  mysql_query("UPDATE pemeriksa SET 
				tgl = '$_POST[tgl]',
				sumber = '$_POST[sumber]',
				terlapor = '$_POST[terlapor]',
				uraian = '$_POST[uraian]',
				telaahan = '$_POST[telaahan]',
				petunjuk = '$_POST[petunjuk]',
				lporan = '$_POST[lporan]',
				petunjuk1 = '$_POST[petunjuk1]',
				lporan2 = '$_POST[lporan2]',
				petunjuk2 = '$_POST[petunjuk2]',
				putusan = '$_POST[putusan]',
				ket 		= '$_POST[ket]'
				WHERE id_pemeriksa = '$_POST[id]'");
  header('location:pemeriksa.php');
}
}
?>
