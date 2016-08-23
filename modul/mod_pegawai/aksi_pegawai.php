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

if ($op=='pegawai' AND $act=='hapus'){
  mysql_query("DELETE FROM pegawai WHERE id_pegawai='$_GET[id]'");
  header('location:pegawai.php');
}
elseif ($op=='pegawai' AND $act=='input'){
  mysql_query("INSERT INTO pegawai(nama,pangkat,nip,nrp,jab) VALUES('$_POST[nama]','$_POST[pangkat]','$_POST[nip]','$_POST[nrp]','$_POST[jab]')");
  header('location:pegawai.php');
}
elseif ($op=='pegawai' AND $act=='update'){
  mysql_query("UPDATE pegawai SET nama = '$_POST[nama]', pangkat = '$_POST[pangkat]', nip = '$_POST[nip]', nrp = '$_POST[nrp]', jab = '$_POST[jab]' WHERE id_pegawai = '$_POST[id]'");
  header('location:pegawai.php');
}
}
?>
