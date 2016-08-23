<?php
session_start();
error_reporting(0);
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  header('location:../../logout.php');
}
else{
include "../../plugin/var.php";
$aksi="aksi_register.php";
switch($_GET[act]){
  default:
	echo "<input type=button value='Tambah Data' class='button' onclick=\"window.location.href='?op=register&act=tambahregister';\">";
	
	echo "<br><br>
	<div class='demo_jui'>
	<table cellpadding='0' cellspacing='0' border='0' class='display' id='example'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nomor & <br>Tgl. Surat Keputusan</th>
				<th>Nama, Pangkat, NIP/NRP, Jabatan</th>
				<th>Pejabat yang menerbitkan Surat Keputusan</th>
				<th>Melanggar Pasal</th>
				<th>Hukuman disiplin yang dijatuhkan</th>
				<th>Tgl. Pelak. Hukuman</th>
				<th>Tgl. Berakhir menjalani Hukuman</th>
				<th>Keterangan</th>
				<th>Act</th>
			</tr>
		</thead>
		<tbody>";
    $no=1;
	$sqlQ =	"SELECT register.id_register, 
					register.nos, 
					register.tgl1, 
					register.peg, 
					register.pejabat, 
					register.pasal, 
					register.hukuman, 
					register.tgl2, 
					register.tgl3,
					register.ket, 
					register.periode, 
					register.stamp,
						pegawai.nama,
						pegawai.pangkat,
						pegawai.nip,
						pegawai.nrp,
						pegawai.jab
						FROM  register 
							INNER JOIN  pegawai ON ( register.peg = pegawai.id_pegawai)";
	
    $tampil	= mysql_query("$sqlQ WHERE  periode='$_SESSION[periode]' ORDER BY nama ASC");
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr>
			 <td  align=center>$no</td>
             <td>$r[1]<br>$r[2]</td>
		     <td>$r[12]<br>
			 $r[13]<br>
			 $r[14]<br>
			 $r[15]<br>
			 $r[16]<br>
			 </td>
		     <td>$r[4]</td>
		     <td>$r[5]</td>
		     <td>$r[6]</td>
		     <td>$r[7]</td>
		     <td>$r[8]</td>
		     <td>$r[9]</td>
		   
             <td align=center>
			 <a href=?op=register&act=editregister&id=$r[id_register]><img src='../../images/edit.png' border='0'></a> 
	         <a href=$aksi?op=register&act=hapus&id=$r[id_register]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapus $r[nama]?')\"><img src='../../images/del.png' border='0'></a>
			 </td>
			 </tr>";
      $no++;
    }
		echo"</tbody></table></div><div class='spacer'></div>";
	
	
    break;
  case "tambahregister":
    echo "<h1>Tambah register</h1>
			<div class='line'></div>
			<div class='box'>";
          echo "<form method=POST action='$aksi?op=register&act=input'>
		  <label><span>NOMOR SURAT</span><input type=text name='nos' size=40></label>
		  <label><span>TANGGAL SURAT</span><input type=text name='tgl1' size=15 id=datepicker></label>
		  <label><span>NAMA PEGAWAI</span>";
		    echo  "<select name='peg'>
            <option value=0 selected>- NAMA PEGAWAI -</option>";
            $tampil=mysql_query("SELECT * FROM pegawai ORDER BY nama ASC");
            while($t=mysql_fetch_array($tampil)){
            echo "<option value=$t[id_pegawai]>$t[nama]</option>";
            }
		  echo "</select></label>
		  <label><span>PEJABAT PENERBIT SK</span><input type=text name='pejabat' size=40></label>
		  <label><span>MELANGGAR PASAL</span><input type=text name='pasal' size=70></label>
		  <label><span>HUKUMAN YANG DIJATUHKAN</span><input type=text name='hukuman' size=90></label>
		  <label><span>TGL PELAKSANAAN HUKUMAN</span><input type=text name='tgl2' size=15 id=datepicker1></label>
		  <label><span>TGL BERAKHIR HUKUMAN</span><input type=text name='tgl3' size=15 id=datepicker2></label>
		  <label><span>KETERANGAN</span><input type=text name='ket' size=90></label>
		  <input type=submit name=submit value=Simpan class='button'>
          <input type=button value=Batal onclick=self.history.back() class='button'>
          </form></div>";
     break;
  
  case "editregister":
    $edit=mysql_query("SELECT * FROM register WHERE id_register='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<h1>Edit register</h1>
			<div class='line'></div>
			<div class='box'>";
          echo "<form method=POST action=$aksi?op=register&act=update>
          <input type=hidden name=id value='$r[id_register]'>
          <label><span>NOMOR SURAT</span><input type=text name='nos' size=40 value='$r[nos]'></label>
		  <label><span>TANGGAL SURAT</span><input type=text name='tgl1' size=15 id=datepicker value='$r[tgl1]'></label>
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
		  
		  <label><span>PEJABAT PENERBIT SK</span><input type=text name='pejabat' size=40 value='$r[pejabat]'></label>
		  <label><span>MELANGGAR PASAL</span><input type=text name='pasal' size=70 value='$r[pasal]'></label>
		  <label><span>HUKUMAN YANG DIJATUHKAN</span><input type=text name='hukuman' size=90 value='$r[hukuman]'></label>
		  <label><span>TGL PELAKSANAAN HUKUMAN</span><input type=text name='tgl2' size=15 id=datepicker1 value='$r[tgl2]'></label>
		  <label><span>TGL BERAKHIR HUKUMAN</span><input type=text name='tgl3' size=15 id=datepicker2 value='$r[tgl3]'></label>
		  <label><span>KETERANGAN</span><input type=text name='ket' size=90 value='$r[ket]'></label>
          <input type=submit value=Update class='button'>
          <input type=button value=Batal onclick=self.history.back() class='button'>
          </form></div>";
    break;  
}
}
?>
