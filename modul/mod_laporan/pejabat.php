<?php
session_start();
error_reporting(0);
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  header('location:../../logout.php');
}
else{

include "../../plugin/var.php";

$aksi="aksi_pejabat.php";
switch($_GET[act]){
  // Tampil User
  default:
    
    $edit=mysql_query("SELECT * FROM kompilasi WHERE id_kompilasi='1'");
    $r=mysql_fetch_array($edit);

	echo "<h1>tetapkan data</h1>
			<div class='line'></div><div class='box'>";


	echo "
          <form method=POST action=$aksi?op=pejabat&act=update>
          <input type=hidden name=id value='1'>
          <label><span>TANGGAL PENGESAHAN	</span><input type='text' value='".tgl_indo(date("Y m d"))."' size='15' style='text-align:right;' disabled></label>
		  <label><span>KOTA</span><input type=text name='tempat' size=30  value='$r[tempat]'></label>
          <label><span>JABATAN</span><input type=text name='an' size=60 value='$r[an]'></label>
          <label><span>NAMA PENANDA TANGAN</span><input type=text name='nama' size=60 value='$r[nama]'></label>
          <label><span>PANGKAT & NIP</span><input type=text name='nip' size=30 value='$r[nip]'></label>
                    <br><input type=submit value='Perbaharui Data' class=button >
		  </form></div>";     
    
    break;  
}
}
?>
