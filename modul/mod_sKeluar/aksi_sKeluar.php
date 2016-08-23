<?php
session_start();
$timezone = "Asia/Jakarta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

include "../../config/koneksi.php";
include "../../config/fungsi_seo.php";
include "../../config/library.php";
include "../../config/fungsi_indotgl.php";

$op		=$_GET[op];  $act	=$_GET[act];

if ($op=='sKeluar' AND $act=='input'){
	$date	= date("Y-m-d");
	
	//membuat nomor agenda surat keluar
	$q = mysql_query("select MAX(nAgenda) as nAgenda from skeluar where jSurat='$_POST[jsurat]'");
	$r = mysql_fetch_array($q);
	if($r){
		$noagd=$r[nAgenda]+1;
	}else{
		$noagd=1;
	}
		
	mysql_query("INSERT INTO skeluar(
									tKeluar,
									nAgenda,
									jSurat,
									nKontrol,
									uSifat,
									jLampiran,
									penerbit,
									kepada,
									hal,
									ket,
									periode) 
					                VALUES(
									'$date',
									'$noagd',
									'$_POST[jsurat]',
									'$_POST[nkontrol]',
									'$_POST[usifat]',
									'$_POST[jlampiran]',
									'$_POST[penerbit]',
									'$_POST[kepada]',
									'$_POST[hal]',
									'$_POST[ket]',
									'$_SESSION[periode]'
									)");
	header('location:../../show.php?op='.$op);
}
elseif ($op=='sKeluar' AND $act=='update'){
  mysql_query("UPDATE skeluar SET 
								 tKeluar	= '$_POST[tkeluar]',
								 nAgenda	= '$_POST[nagenda]',
								 jSurat		= '$_POST[jsurat]',
								 nKontrol	= trim('$_POST[nkontrol]'),
								 uSifat		= '$_POST[usifat]',
								 jLampiran	= '$_POST[jlampiran]',
								 penerbit	= '$_POST[penerbit]',
								 kepada		= '$_POST[kepada]',
								 hal		= '$_POST[hal]',
								 ket		= '$_POST[ket]'
								 
 								 WHERE id_sKeluar   = '$_POST[id]'");
								 
  header('location:../../show.php?op='.$op);
}


}
?>
