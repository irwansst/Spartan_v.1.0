<?php
session_start();
error_reporting(0);
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  header('location:../../logout.php');
}
else{
include "../../plugin/var.php";
$aksi="aksi_pemeriksa.php";
switch($_GET[act]){
  default:
	echo "<input type=button value='Tambah Data' class='button' onclick=\"window.location.href='?op=pemeriksa&act=tambahpemeriksa';\">";
	
	echo "<br><br>
	<div class='demo_jui'>
	<table cellpadding='0' cellspacing='0' border='0' class='display' id='example'>
		<thead>
			<tr>
				
				
				<th>Tgl Peneri<br>maan</th>
				<th>sumber Lapdu</th>
				<th>Terlapor</th>
				<th>Uraian Singkat Lapdu</th>
				<th>Telaahan</th>
				<th>Petunjuk kajari/ kajati/ inspektur/ jamwas</th>
				<th>Laporan Hasil klarifikasi</th>
				<th>Petunjuk kajari/ kajati/ inspektur/ jamwas</th>
				<th>laporan hasil inspeksi kasus</th>
				<th>Petunjuk kajari/ kajati/ inspektur/ jamwas</th>
				<th>Putusan</th>

				<th>Act</th>
			</tr>
		</thead>
		<tbody>";
    $no=1;
    $tampil	= mysql_query("SELECT * from pemeriksa WHERE  periode='$_SESSION[periode]' ORDER BY tgl desc");
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
			 <a href=?op=pemeriksa&act=editpemeriksa&id=$r[id_pemeriksa]><img src='../../images/edit.png' border='0'></a> 
	         <a href=$aksi?op=pemeriksa&act=hapus&id=$r[id_pemeriksa]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapus $r[nama]?')\"><img src='../../images/del.png' border='0'></a>
			 </td>
			 </tr>";
      $no++;
    }
		echo"</tbody></table></div><div class='spacer'></div>";
	
	
    break;
  case "tambahpemeriksa":
    echo "<h1>Tambah pemeriksa</h1>
			<div class='line'></div>
			<div class='box'>";
          echo "<form method=POST action='$aksi?op=pemeriksa&act=input'>
<label><span>TGL PENERIMAAN</span><input type='text' name='tgl' size='20' id=datepicker></label>
<label><span>SUMBER LAPDU</span><input type='text' name='sumber' size='70'></label>
<label><span>TERLAPOR</span><input type='text' name='terlapor' size='70'></label>
<label><span>URAIAN SINGKAT LAPDU</span><input type='text' name='uraian' size='70'></label>
<label><span>TELAAHAN</span><input type='text' name='telaahan' size='70'></label>
<label><span>PETUNJUK KAJARI/KAJATI</span><input type='text' name='petunjuk' size='70'></label>
<label><span>LAPORAN HASIL KLARIFIKASI</span><input type='text' name='lporan' size='70'></label>
<label><span>PETUNJUK KAJARI/KAJATI</span><input type='text' name='petunjuk1' size='70'></label>
<label><span>LPORAN HASIL INSPEKSI KASUS</span><input type='text' name='lporan2' size='70'></label>
<label><span>PETUNJUK KAJATI/INSPEKTUR</span><input type='text' name='petunjuk2' size='70'></label>
<label><span>PUTUSAN</span><input type='text' name='putusan' size='70'></label>
		<label><span>KETERANGAN</span><input type='text' name='ket' size='70'></label>
		  <input type=submit name=submit value=Simpan class='button'>
          <input type=button value=Batal onclick=self.history.back() class='button'>
          </form></div>";
     break;
  
  case "editpemeriksa":
    $edit=mysql_query("SELECT * FROM pemeriksa WHERE id_pemeriksa='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<h1>Edit pemeriksa</h1>
			<div class='line'></div>
			<div class='box'>";
          echo "<form method=POST action=$aksi?op=pemeriksa&act=update>
          <input type=hidden name=id value='$r[id_pemeriksa]'>
<label><span>TGL PENERIMAAN</span><input type='text' name='tgl' value='$r[tgl]' size='20' id=datepicker></label>
<label><span>SUMBER LAPDU</span><input type='text' name='sumber' value='$r[sumber]' size='70'></label>
<label><span>TERLAPOR</span><input type='text' name='terlapor' value='$r[terlapor]' size='70'></label>
<label><span>URAIAN SINGKAT LAPDU</span><input type='text' name='uraian' value='$r[uraian]' size='70'></label>
<label><span>TELAAHAN</span><input type='text' name='telaahan' value='$r[telaahan]' size='70'></label>
<label><span>PETUNJUK KAJARI/KAJATI</span><input type='text' name='petunjuk' value='$r[petunjuk]' size='70'></label>
<label><span>LAPORAN HASIL KLARIFIKASI</span><input type='text' name='lporan' value='$r[lporan]' size='70'></label>
<label><span>PETUNJUK KAJARI/KAJATI</span><input type='text' name='petunjuk1' value='$r[petunjuk1]' size='70'></label>
<label><span>LPORAN HASIL INSPEKSI KASUS</span><input type='text' name='lporan2' value='$r[lporan2]' size='70'></label>
<label><span>PETUNJUK KAJATI/INSPEKTUR</span><input type='text' name='petunjuk2' value='$r[petunjuk2]' size='70'></label>
<label><span>PUTUSAN</span><input type='text' name='putusan' value='$r[putusan]' size='70'></label>
		<label><span>KETERANGAN</span><input type='text' name='ket' value='$r[ket]' size='70'></label>
          <input type=submit value=Update class='button'>
          <input type=button value=Batal onclick=self.history.back() class='button'>
          </form></div>";
    break;  
}
}
?>
