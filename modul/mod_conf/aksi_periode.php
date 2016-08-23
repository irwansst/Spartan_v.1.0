<?php
ob_start();
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  header('location:../../logout.php');
}
else{
include "../../config/koneksi.php";

$op=$_GET[op];
$act=$_GET[act];

if ($op=='periode' AND $act=='update'){

$periode = $_POST['periode'];
$_SESSION[periode]   = $periode;

header('location:periode.php');
}
}
?>
