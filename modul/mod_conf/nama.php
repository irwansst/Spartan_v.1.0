<?php
session_start();
error_reporting(0);
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  header('location:../../logout.php');
}
else{

include "../../plugin/var.php";

$aksi="aksi_nama.php";
switch($_GET[act]){
  // Tampil User
  default:
    
    $edit=mysql_query("SELECT * FROM nama WHERE id_nama='1'");
    $r=mysql_fetch_array($edit);

	echo "<h1>Ubah Profil Instansi</h1>
			<div class='line'></div>
	<div id='ads' align=center>Setelah profil dirubah dihimau untuk keluar system kemudian masuk kembali agar perubahan dapat berpengaruh</div>
	<div class='box'>";


	echo "
          <form method=POST action=$aksi?op=nama&act=update>
          <input type=hidden name=id value='1'>
          <label><span>Nama Instansi</span><input type=text name='nama' size=60  value='$r[nama]'></label>
          <label><span>Alamat</span><input type=text name='alamat' size=60 value='$r[alamat]'></label>
          <label><span>No.Telp</span><input type=text name='telp' size=60 value='$r[telp]'></label>
          <label><span>Alamat E-mail</span><input type=text name='email' size=60 value='$r[email]'></label>
          <label><span>Alamat Website</span><input type=text name='web' size=60 value='$r[web]'></label>
          <br><input type=submit value='Update Profil' class=button >
          </table></form></div>";     
    
    break;  
}
}
?>
