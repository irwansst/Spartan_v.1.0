<?php
session_start();
error_reporting(0);
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
    header('location:../../logout.php');
}
else{
include "../../config/koneksi.php";

$op=$_GET[op];
$act=$_GET[act];

if ($op=='pejabat' AND $act=='update'){
    mysql_query("UPDATE kompilasi SET  tempat	= '$_POST[tempat]',
                                 an 	= '$_POST[an]',
                                 nama   = '$_POST[nama]',  
                                 nip  	= '$_POST[nip]'
                           WHERE id_kompilasi = '$_POST[id]'");
  }
  header('location:pejabat.php');
}
?>
