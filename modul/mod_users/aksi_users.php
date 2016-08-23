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

// Input user
if ($op=='user' AND $act=='input'){
  $pass=md5($_POST[password]);
  mysql_query("INSERT INTO users(username,
                                 password,
                                 nama_lengkap,
                                 email, 
                                 no_telp,
                                 id_session) 
	                       VALUES('$_POST[username]',
                                '$pass',
                                '$_POST[nama_lengkap]',
                                '$_POST[email]',
                                '$_POST[no_telp]',
                                '$pass')");
  header('location:users.php');
}

// Update user
elseif ($op=='user' AND $act=='update'){
  if (empty($_POST[password])) {
    mysql_query("UPDATE users SET nama_lengkap   = '$_POST[nama_lengkap]',
                                  email          = '$_POST[email]',
                                  blokir         = '$_POST[blokir]',  
                                  no_telp        = '$_POST[no_telp]'  
                           WHERE  id_session     = '$_POST[id]'");
  }
  // Apabila password diubah
  else{
    $pass=md5($_POST[password]);
    mysql_query("UPDATE users SET password        = '$pass',
                                 nama_lengkap    = '$_POST[nama_lengkap]',
                                 email           = '$_POST[email]',  
                                 blokir          = '$_POST[blokir]',  
                                 no_telp         = '$_POST[no_telp]'  
                           WHERE id_session      = '$_POST[id]'");
  }
  header('location:users.php');
}
}
?>
