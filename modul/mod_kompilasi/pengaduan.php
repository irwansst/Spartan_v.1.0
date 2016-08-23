<?php
session_start();
error_reporting(0);
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  header('location:../../logout.php');
}
else{
include "../../plugin/var.php";
$aksi="aksi_pengaduan.php";
switch($_GET[act]){
  default:
	echo "<input type=button value='Tambah Data' class='button' onclick=\"window.location.href='?op=pengaduan&act=tambahpengaduan';\">";
	
	echo "<br><br>
	<div class='demo_jui'>
	<table cellpadding='0' cellspacing='0' border='0' class='display' id='example'>
		<thead>
			<tr>
				
				<th>Tanggal Penerimaan Lapdu</th>
				<th>sumber Lapdu</th>
				<th>Terlapor</th>
				<th>Uraian Singkat Pengaduan</th>
				<th>Telaahan</th>
				<th>Laporan Hasil Klarifikasi</th>
				<th>Laporan Hasil Inspeksi Kasus</th>
				<th>Kajati/ Inspektur</th>
				<th>Jamwas</th>
				<th>Jaksa Agung/ Waja</th>
				<th>Putusan</th>
				<th>Act</th>
			</tr>
		</thead>
		<tbody>";
    $no=1;
    $tampil	= mysql_query("SELECT * from pengaduan WHERE  periode='$_SESSION[periode]' ORDER BY tgl desc");
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr>
             <td>$r[1]</td>
		     <td>$r[2]</td>
		     <td>$r[3]</td>
		     <td>$r[4]</td>
		     <td>$r[5]</td>
		     <td>$r[6]</td>
		     <td>$r[7]</td>
		     <td>$r[8]</td>
		     <td>$r[9]</td>
		     <td>$r[10]</td>
		     <td>$r[11]</td>
		     
		     <td align=center>
			 <a href=?op=pengaduan&act=editpengaduan&id=$r[id_pengaduan]><img src='../../images/edit.png' border='0'></a> 
	         <a href=$aksi?op=pengaduan&act=hapus&id=$r[id_pengaduan]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapus $r[nama]?')\"><img src='../../images/del.png' border='0'></a>
			 </td>
			 </tr>";
      $no++;
    }
		echo"</tbody></table></div><div class='spacer'></div>";
	
	
    break;
  case "tambahpengaduan":
    echo "<h1>Tambah pengaduan</h1>
			<div class='line'></div>
			<div class='box'>";
          echo "<form method=POST action='$aksi?op=pengaduan&act=input'>
        <label><span>TGL PENERIMAAN LAPDU</span><input type='text' name='tgl' size='20' id=datepicker></label>
		<label><span>SUMBER LAPDU</span><input type='text' name='sumber' size='50'></label>
		<label><span>TERLAPOR</span><input type='text' name='terlapor' size='50'></label>
		<label><span>URAIAN SINGKAT PENGADU</span><input type='text' name='uraian' size='90'></label>
		<label><span>TELAAHAN</span><input type='text' name='telaah' size='90'></label>
		<label><span>HASIL KLARIFIKASI</span><input type='text' name='klarifikasi' size='90'></label>
		<label><span>HASIL INSPEKSI KASUS</span><input type='text' name='inspeksi' size='70'></label>
		<label><span>KAJATI/INSPEKTUR</span><input type='text' name='kajati' size='70'></label>
		<label><span>JAMWAS</span><input type='text' name='jamwas' size='70'></label>
		<label><span>JAKSA AGUNG / WAJA</span><input type='text' name='jaksa' size='70'></label>
		<label><span>PUTUSAN</span><input type='text' name='putusan' size='70'></label>
		<label><span>KETERANGAN</span><input type='text' name='ket' size='70'></label>
		  <input type=submit name=submit value=Simpan class='button'>
          <input type=button value=Batal onclick=self.history.back() class='button'>
          </form></div>";
     break;
  
  case "editpengaduan":
    $edit=mysql_query("SELECT * FROM pengaduan WHERE id_pengaduan='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<h1>Edit pengaduan</h1>
			<div class='line'></div>
			<div class='box'>";
          echo "<form method=POST action=$aksi?op=pengaduan&act=update>
          <input type=hidden name=id value='$r[id_pengaduan]'>
		<label><span>TGL PENERIMAAN LAPDU</span><input type='text' name='tgl' value='$r[tgl]' size='20' id=datepicker></label>
		<label><span>SUMBER LAPDU</span><input type='text' name='sumber' value='$r[sumber]' size='50'></label>
		<label><span>TERLAPOR</span><input type='text' name='terlapor' value='$r[terlapor]' size='50'></label>
		<label><span>URAIAN SINGKAT</span><input type='text' name='uraian' value='$r[uraian]' size='90'></label>
		<label><span>TELAAHAN</span><input type='text' name='telaah' value='$r[telaah]' size='90'></label>
		<label><span>HASIL KLARIFIKASI</span><input type='text' name='klarifikasi' value='$r[klarifikasi]' size='90'></label>
		<label><span>HASIL INSPEKSI KASUS</span><input type='text' name='inspeksi' value='$r[inspeksi]' size='70'></label>
		<label><span>KAJATI/ INSPEKTUR</span><input type='text' name='kajati' value='$r[kajati]' size='70'></label>
		<label><span>JAMWAS</span><input type='text' name='jamwas' value='$r[jamwas]' size='70'></label>
		<label><span>JAKSA AGUNG / WAJA</span><input type='text' name='jaksa' value='$r[jaksa]' size='70'></label>
		<label><span>PUTUSAN</span><input type='text' name='putusan' value='$r[putusan]' size='70'></label>
		<label><span>KETERANGAN</span><input type='text' name='ket' value='$r[ket]' size='70'></label>
          <input type=submit value=Update class='button'>
          <input type=button value=Batal onclick=self.history.back() class='button'>
          </form></div>";
    break;  
}
}
?>
