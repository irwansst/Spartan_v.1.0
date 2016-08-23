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

if ($op=='sPerintah' AND $act=='input'){
	$count 	= mysql_query("SELECT count(*) as jml FROM sperintah WHERE periode='$_SESSION[periode]'");
	$rj		= mysql_fetch_array($count);
	$tn		= ($rj[jml]+1);
	$newNO  = sprintf("%04s", $tn);
	$date	= date("Y-m-d");
	$m 	 	= date("m");
	$y  	= date("Y");
	$b     	= getBulan($m);
	$blnThn = '/'.$m.'/'.$y;
	$pilih	= $_POST[sifat];
  mysql_query("INSERT INTO sperintah(
									nsurat,
									kdwil,
									kdmas,
									blth,
									tsurat,
									pelaksana,
									isi,
									ket,
									periode) 
					                VALUES(
									'$newNO',
									'$_POST[kdwil]',
									'$_POST[kdmas]',
									'$blnThn',
									'$date',
									'$_POST[pelaksana]',
									'$_POST[isi]',
									'$_POST[ket]',
									'$_SESSION[periode]'
									)");
	header('location:../../show.php?op='.$op);
}
elseif ($op=='sPerintah' AND $act=='update'){
  mysql_query("UPDATE sperintah SET 
								 kdwil  	= '$_POST[kdwil]',
								 kdmas  	= '$_POST[kdmas]',
                                 pelaksana 	= '$_POST[pelaksana]',
                                 isi 		= '$_POST[isi]',
                                 ket    	= '$_POST[ket]'
								 WHERE id_sperintah   = '$_POST[id]'");
  header('location:../../show.php?op='.$op);
}
}
?>
