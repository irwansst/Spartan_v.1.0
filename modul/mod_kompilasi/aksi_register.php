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

if ($op=='register' AND $act=='hapus'){
  mysql_query("DELETE FROM register WHERE id_register='$_GET[id]'");
  header('location:register.php');
}
elseif ($op=='register' AND $act=='input'){
  mysql_query("INSERT INTO register(
			   nos, 
			   tgl1, 
			   peg, 
			   pejabat, 
			   pasal, 
			   hukuman, 
			   tgl2, 
			   tgl3, 
			   ket, 
			   periode) 
			   VALUES(
			   '$_POST[nos]',
			   '$_POST[tgl1]',
			   '$_POST[peg]',
			   '$_POST[pejabat]',
			   '$_POST[pasal]',
			   '$_POST[hukuman]',
			   '$_POST[tgl2]',
			   '$_POST[tgl3]',
			   '$_POST[ket]',
			   '$_SESSION[periode]'
			   )");
  header('location:register.php');
}
elseif ($op=='register' AND $act=='update'){
  mysql_query("UPDATE register SET 
				nos 	= '$_POST[nos]', 
				tgl1 	= '$_POST[tgl1]', 
				peg 	= '$_POST[peg]', 
				pejabat = '$_POST[pejabat]', 
				pasal 	= '$_POST[pasal]', 
				hukuman = '$_POST[hukuman]', 
				tgl2 	= '$_POST[tgl2]', 
				tgl3	= '$_POST[tgl3]', 
				ket 	= '$_POST[ket]' 
				WHERE id_register = '$_POST[id]'");
  header('location:register.php');
}
}
?>
