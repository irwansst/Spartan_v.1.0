<?php
session_start();
error_reporting(0);
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  header('location:../../logout.php');
}
else{
include "../../plugin/var.php";

$aksi="aksi_pegawai.php";
switch($_GET[act]){
  default:
	echo "<h1>Daftar Pegawai</h1>";
	echo "<input type=button value='Tambah Data' class='button' onclick=\"window.location.href='?op=pegawai&act=tambahpegawai';\">";
	
	echo "<br><br>
	<div class='demo_jui'>
	<table cellpadding='0' cellspacing='0' border='0' class='display' id='example'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama/Nip</th>
				<th>Pangkat/Jabatan</th>
				<th width=50px>Act</th>
			</tr>
		</thead>
		<tbody>";
	$tampil=mysql_query("SELECT * FROM pegawai ORDER BY nama ASC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr>
			 <td  align=center>$no</td>
             <td>$r[nama]<br>NIP : $r[nip]<br>NRP : $r[nrp]</td>
		     <td>$r[pangkat]<br>$r[jab]</td>
             <td>
			 <a href=?op=pegawai&act=editpegawai&id=$r[id_pegawai]><img src='../../images/edit.png' border='0'></a> 
	         <a href=$aksi?op=pegawai&act=hapus&id=$r[id_pegawai]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapus $r[nama]?')\"><img src='../../images/del.png' border='0'></a>
			 </td>
			 </tr>";
      $no++;
    }
		echo"</tbody></table></div><div class='spacer'></div>";
	
	
    break;
  case "tambahpegawai":
    echo "<h1>Tambah Pegawai</h1>
			<div class='line'></div>
			<div class='box'>";
          echo "<form method=POST action='$aksi?op=pegawai&act=input'>
		  <label><span>NAMA PEGAWAI</span><input type=text name='nama' size=40></label>
		  <label><span>PANGKAT</span><input type=text name='pangkat' size=30></label>
          <label><span>NIP</span><input type=text name='nip' size=15></label>
          <label><span>NRP</span><input type=text name='nrp' size=15></label>
          <label><span>JABATAN</span><input type=text name='jab' size=70></label>
          
		  <input type=submit name=submit value=Simpan class='button'>
          <input type=button value=Batal onclick=self.history.back() class='button'>
          </form></div>";
     break;
  
  case "editpegawai":
    $edit=mysql_query("SELECT * FROM pegawai WHERE id_pegawai='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<h1>Edit Pegawai</h1>
			<div class='line'></div>
			<div class='box'>";
          echo "<form method=POST action=$aksi?op=pegawai&act=update>
          <input type=hidden name=id value='$r[id_pegawai]'>
          <label><span>NAMA PEGAWAI</span><input type=text name='nama' value='$r[nama]' size=40></label>
          <label><span>PANGKAT</span><input type=text name='pangkat' value='$r[pangkat]' size=30></label>
          <label><span>NIP</span><input type=text name='nip' value='$r[nip]' size=15></label>
          <label><span>NRP</span><input type=text name='nrp' value='$r[nrp]' size=15></label>
          <label><span>JABATAN</span><input type=text name='jab' value='$r[jab]' size=70></label>
          <input type=submit value=Update class='button'>
          <input type=button value=Batal onclick=self.history.back() class='button'>
          </form></div>";
    break;  
}
}
?>
