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
	$pilih	= $_POST[sifat];
	$count 	= mysql_query("SELECT count(*) as jml FROM skeluar WHERE sifat='$pilih' AND periode='$_SESSION[periode]'");
	$rj		= mysql_fetch_array($count);
	$tn		= ($rj[jml]+1);
	$date	= date("Y-m-d");
	$m 	 	= date("m");
	$y  	= date("Y");
	$b     	= getBulan($m);
	$newNO  = sprintf("%04s", $tn);
	$blnThn = '/'.$m.'/'.$y;
  mysql_query("INSERT INTO skeluar(
									sifat,
									nSurat,kdWil,kdMas,blnThn,
									tglSurat,
									hal,
									kepada,
									ket,
									periode) 
					                VALUES(
									'$pilih',
									'$newNO','$_POST[kdwil]','$_POST[kdmas]','$blnThn',
									'$date',
									'$_POST[hal]',
									'$_POST[kepada]',
									'$_POST[ket]',
									'$_SESSION[periode]'
									)");
  header('location:../../show.php?op='.$op.'&pilih='.$pilih);
}
elseif ($op=='sKeluar' AND $act=='update'){
  $pilih	= $_POST[sifat];
  mysql_query("UPDATE skeluar SET 
								 kdWil  = '$_POST[kdwil]',
								 kdMas  = '$_POST[kdmas]',
                                 hal   	= '$_POST[hal]',
                                 kepada = '$_POST[kepada]',
                                 ket    = '$_POST[ket]'
								 WHERE id_sKeluar   = '$_POST[id]'");
  header('location:../../show.php?op='.$op.'&pilih='.$pilih);
}
}
?>
