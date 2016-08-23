<?php
session_start();
error_reporting(0);
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  header('location:../../logout.php');
}
else{

include "../../plugin/var.php";

$aksi="aksi_pengesahan.php";
switch($_GET[act]){
  // Tampil User
  default:
    
    $edit=mysql_query("SELECT * FROM end WHERE id_end='1'");
    $r=mysql_fetch_array($edit);

	echo "<h1>tetapkan data</h1>
			<div class='line'></div>
	<div id='ads' align=center><a href='c_pengesahan.php' class='button' target='_blank'>CETAK LEMBAR PENGESAHAN</a><br><br><br>.</div>
	<div class='box'>";


	echo "
          <form method=POST action=$aksi?op=pengesahan&act=update>
          <input type=hidden name=id value='1'>
          			<label><span>TANGGAL PENGESAHAN	</span><input type='text' value='".tgl_indo(date("Y m d"))."' size='15' style='text-align:right;' disabled></label>
		  <label><span>Kota </span><input type=text name='kota' size=30  value='$r[kota]'></label>
          <label><span>Isi Diskripsi</span><textarea name='text' cols=80 rows=6>$r[text]</textarea></label>
          <label><span>Kepala Urusan Tata Usaha</span><input type=text name='tu' size=60 value='$r[tu]'></label>
          <label><span>PANGKAT & NIP</span><input type=text name='ntu' size=30 value='$r[ntu]'></label>
          <label><span>Kepala Sub. Bagian Pembinaan</span><input type=text name='sub' size=60 value='$r[sub]'></label>
          <label><span>PANGKAT & NIP</span><input type=text name='nsub' size=30 value='$r[nsub]'></label>
		  <label><span>Kepala Kejaksaan Negeri</span><input type=text name='ka' size=60 value='$r[ka]'></label>
          <label><span>PANGKAT & NIP</span><input type=text name='nka' size=30 value='$r[nka]'></label>
          <br><input type=submit value='Perbaharui Data' class=button >
          </table></form></div>";     
    
    break;  
}
}
?>
