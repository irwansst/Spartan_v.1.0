<?php
session_start();
error_reporting(0);
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  header('location:../../logout.php');
}
else{
include "../../plugin/var.php";
$aksi="aksi_hukuman.php";
switch($_GET[act]){
  default:
	echo "<input type=button value='Tambah Data' class='button' onclick=\"window.location.href='?op=hukuman&act=tambahhukuman';\">";
	
	echo "<br><br>
	<div class='demo_jui'>
	<table cellpadding='0' cellspacing='0' border='0' class='display' id='example'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Pangkat, NIP/NRP, Jabatan</th>
				<th>Melanggar Pasal</th>
				<th>Uraian Signkat Pengaduan</th>
				<th>Hukuman disiplin yang dijatuhkan</th>
				<th>Keputusan</th>
				<th>Tgl. Pelaksanaan Hukuman</th>
				<th>Keterangan</th>
				<th>Act</th>
			</tr>
		</thead>
		<tbody>";
    $no=1;
	$sqlQ =	"SELECT hukuman.id_hukuman, 
					hukuman.peg, 
					hukuman.pasal, 
					hukuman.pengaduan, 
					hukuman.hukuman, 
					hukuman.kep, 
					hukuman.tgl, 
					hukuman.ket, 
					hukuman.periode, 
					hukuman.stamp,
						pegawai.nama,
						pegawai.pangkat,
						pegawai.nip,
						pegawai.nrp,
						pegawai.jab
						FROM  hukuman 
							INNER JOIN  pegawai ON ( hukuman.peg = pegawai.id_pegawai)";
	
    $tampil	= mysql_query("$sqlQ WHERE  periode='$_SESSION[periode]' ORDER BY nama ASC");
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr>
			 <td  align=center>$no</td>
             <td>$r[10]</td>
		     <td>$r[11]<br>
			 $r[12]<br>
			 $r[13]<br>
			 $r[14]
			 </td>
		     <td>$r[2]</td>
		     <td>$r[3]</td>
		     <td>$r[4]</td>
		     <td>$r[5]</td>
		     <td>$r[6]</td>
		     <td>$r[7]</td>
		   
             <td align=center>
			 <a href=?op=hukuman&act=edithukuman&id=$r[id_hukuman]><img src='../../images/edit.png' border='0'></a> 
	         <a href=$aksi?op=hukuman&act=hapus&id=$r[id_hukuman]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapus $r[nama]?')\"><img src='../../images/del.png' border='0'></a>
			 </td>
			 </tr>";
      $no++;
    }
		echo"</tbody></table></div><div class='spacer'></div>";
	
	
    break;
  case "tambahhukuman":
    echo "<h1>Tambah hukuman</h1>
			<div class='line'></div>
			<div class='box'>";
          echo "<form method=POST action='$aksi?op=hukuman&act=input'>
		  <label><span>NAMA PEGAWAI</span>";
		    echo  "<select name='peg'>
            <option value=0 selected>- NAMA PEGAWAI -</option>";
            $tampil=mysql_query("SELECT * FROM pegawai ORDER BY nama ASC");
            while($t=mysql_fetch_array($tampil)){
            echo "<option value=$t[id_pegawai]>$t[nama]</option>";
            }
		  echo "</select></label>
		  <label><span>MELANGGAR PASAL</span><input type=text name='pasal' size=60></label>
		  <label><span>URAIAN SINGKAT PENGADUAN</span><input type=text name='pengaduan' size=90></label>
		  <label><span>HUKUMAN YANG DIJATUHKAN</span><input type=text name='hukuman' size=90></label>
		  <label><span>KEPUTUSAN</span><input type=text name='kep' size=90></label>
		  <label><span>TGL PELAKSANAAN HUKUMAN</span><input type=text name='tgl' size=15 id=datepicker></label>
		  <label><span>KETERANGAN</span><input type=text name='ket' size=90></label>
		  <input type=submit name=submit value=Simpan class='button'>
          <input type=button value=Batal onclick=self.history.back() class='button'>
          </form></div>";
     break;
  
  case "edithukuman":
    $edit=mysql_query("SELECT * FROM hukuman WHERE id_hukuman='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<h1>Edit hukuman</h1>
			<div class='line'></div>
			<div class='box'>";
          echo "<form method=POST action=$aksi?op=hukuman&act=update>
          <input type=hidden name=id value='$r[id_hukuman]'>
		  <label><span>NAMA PEGAWAI</span>";
			$peg 	= mysql_query("SELECT * FROM pegawai WHERE id_pegawai='$r[peg]'");
			$rt    	= mysql_fetch_array($peg);
		    echo  "<select name='peg'>
            <option value='$r[peg]' selected>- $rt[nama] -</option>";
            $tampil=mysql_query("SELECT * FROM pegawai ORDER BY nama ASC");
            while($t=mysql_fetch_array($tampil)){
            echo "<option value=$t[id_pegawai]>$t[nama]</option>";
            }
			echo "</select></label>
		  
		  <label><span>MELANGGAR PASAL</span><input type=text name='pasal' size=60  value='$r[pasal]'></label>
		  <label><span>URAIAN SINGKAT PENGADUAN</span><input type=text name='pengaduan' size=90  value='$r[pengaduan]'></label>
		  <label><span>HUKUMAN YANG DIJATUHKAN</span><input type=text name='hukuman' size=90  value='$r[hukuman]'></label>
		  <label><span>KEPUTUSAN</span><input type=text name='kep' size=90  value='$r[kep]'></label>
		  <label><span>TGL PELAKSANAAN HUKUMAN</span><input type=text name='tgl' size=15 id=datepicker  value='$r[tgl]'></label>
		  <label><span>KETERANGAN</span><input type=text name='ket' size=90  value='$r[ket]'></label>
          <input type=submit value=Update class='button'>
          <input type=button value=Batal onclick=self.history.back() class='button'>
          </form></div>";
    break;  
}
}
?>
