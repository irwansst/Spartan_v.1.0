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

if ($op=='pengesahan' AND $act=='update'){
    mysql_query("UPDATE end SET  kota	= '$_POST[kota]',
                                 text 	= '$_POST[text]',
                                 sub   = '$_POST[sub]',  
                                 nsub  = '$_POST[nsub]',  
                                 tu    = '$_POST[tu]',  
                                 ntu    = '$_POST[ntu]',  
                                 ka    = '$_POST[ka]',  
                                 nka    = '$_POST[nka]'  
                           WHERE id_end = '$_POST[id]'");
  }
  header('location:pengesahan.php');
}
?>
