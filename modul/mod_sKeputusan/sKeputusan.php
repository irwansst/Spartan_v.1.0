<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_sKeputusan/aksi_sKeputusan.php";

switch($_GET[act]){
  
  default:
  
    echo "<h1>Surat Keputusan periode $_SESSION[periode]</h1>";
    
	echo "<input type=button class='button' value='Tambah Data' onclick=location.href='?op=sKeputusan&act=tambahsKeputusan'><br><br>";
	
	echo "
	<div class='demo_jui'>
	<table cellpadding='0' cellspacing='0' border='0' class='display' id='example'>
		<thead>
			<tr>
				<th width=20px align=center>No</th>
				<th >Nomor Surat</th>
				<th width=80px>Tanggal Surat</th>
				<th width=210px>Pelaksana</th>
				<th>Isi Keputusan & Keterangan</th>
				<th width=150px>Stamp</th>
				<th width=50px>Lihat/<br>Ubah</th>
			</tr>
		</thead>
		<tbody>";
		
	$no=1;
	$sqlQ =	"SELECT skeputusan.id_skeputusan, 
					skeputusan.nsurat, 
					skeputusan.kdwil, 
					skeputusan.kdmas, 
					skeputusan.blth, 
					skeputusan.tsurat, 
					skeputusan.pelaksana, 
						pegawai.nama,
						pegawai.pangkat,
						pegawai.nip,
						pegawai.nrp,
						pegawai.jab,
					skeputusan.isi, 
					skeputusan.ket,
					skeputusan.periode, 
					skeputusan.stamp
						FROM  skeputusan 
							INNER JOIN  pegawai ON ( skeputusan.pelaksana = pegawai.id_pegawai)";
	
    $tampil	= mysql_query("$sqlQ WHERE  periode='$_SESSION[periode]' ORDER BY tsurat DESC");
    while ($r=mysql_fetch_array($tampil)){
	
	$nomor = $x.$r[nsurat].'/'.$r[kdwil].'/'.$r[kdmas].$r[blth];
	
       echo "<tr>
			 <td align=center>$no</td>
             <td align=right>$nomor</td>
             <td align=center>$r[tsurat]</td>
             <td>$r[nama]<br>NIP : $r[nip]</td>
             <td><b>Isi surat : </b>$r[isi]<br><br><b>Keterangan : </b>$r[ket]</td>
             <td align=center>$r[stamp]</td>
             <td align=center>
			 <a href=?op=sKeputusan&act=lihatsKeputusan&id=$r[id_skeputusan]><img src='images/show.png' border='0'></a>
			 <a href=?op=sKeputusan&act=editsKeputusan&id=$r[id_skeputusan]><img src='images/edit.png' border='0'></a>
	         </td>
			 </tr>";
      $no++;
    }	
		echo"</tbody></table></div><div class='spacer'></div>";
	
  break;

  
  case "tambahsKeputusan":
      echo "<h1>Tambah surat perintah</h1>
			<div class='line'></div>
			<div class='box'>";
    $count 	= mysql_query("SELECT count(*) as jml FROM skeputusan WHERE periode='$_SESSION[periode]'");
	$rj		= mysql_fetch_array($count);
	$tn		= ($rj[jml]+1);
	$newNO  = sprintf("%04s", $tn);
    echo "	
	        <form method=POST action='$aksi?op=sKeputusan&act=input'>
			<input type=hidden name='sifat' value='$_GET[pilih]'>
			<label><span>TANGGAL SURAT</span><input type='text' value='".tgl_indo(date("Y m d"))."' size='15' style='text-align:right;' disabled></label>
			<label><span>NOMOR SURAT</span><input type='text' name='nsurat' size='1' value='$newNO'  style='text-align:center;' disabled></label>
			<label><span>KODE WILAYAH</span><input type='text' name='kdwil' size='10' style='text-align:center;'></label>
			<label><span>KODE MASALAH</span><input type='text' name='kdmas' size='10' style='text-align:center;'></label>
			<label><span>PETUGAS PELAKSANA</span>";
		    echo  "<select name='pelaksana'>
            <option value=0 selected>- PILIH PETUGAS PELAKSANA -</option>";
            $tampil=mysql_query("SELECT * FROM pegawai ORDER BY nama ASC");
            while($t=mysql_fetch_array($tampil)){
            echo "<option value=$t[id_pegawai]>$t[nama]</option>";
            }
		  echo "</select></label>
			<label><span>ISI KEPUTUSAN</span><textarea name='isi' cols=80 rows=7></textarea></label>
			<label><span>KETERANGAN</span><input type='text' name='ket' size='70'></label>
		
		<input type=submit class=button value=Simpan>
		<input type=button value=Batal class=button onclick=self.history.back()>
          </form></div>";

    break;
  

  case "editsKeputusan":
    $edit = mysql_query("SELECT * FROM skeputusan WHERE id_skeputusan='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
	
	$nomor = $x.$r[nsurat].'/'.$r[kdwil].'/'.$r[kdmas].$r[blth];
	
	echo "<h1>Ubah surat keputusan</h1>
			<div class='line'></div>
			<div class='box'>";
    echo "
        <form method=POST action=$aksi?op=sKeputusan&act=update>
        <input type=hidden name=id value=$r[id_skeputusan]>
		<label><span>TANGGAL SURAT</span><input type='text' value='".tgl_indo($r[tsurat])."' disabled size='30' style='text-align:right;' disabled></label>
		<label><span>NOMOR SURAT</span><input type='text' value=".$nomor." size='30' disabled style='text-align:right;'></label>
		
		
		<label><span>KODE WILAYAH</span><input type='text' name='kdwil' value='$r[kdwil]' size='10' style='text-align:center;'></label>
		<label><span>KODE MASALAH</span><input type='text' name='kdmas' value='$r[kdmas]' size='10' style='text-align:center;'></label>
		<label><span>PETUGAS PELAKSANA</span>";
		$peg = mysql_query("SELECT * FROM pegawai WHERE id_pegawai='$r[pelaksana]'");
		$rt    = mysql_fetch_array($peg);
		    echo  "<select name='pelaksana'>
            <option value='$r[pelaksana]' selected>- $rt[nama] -</option>";
            $tampil=mysql_query("SELECT * FROM pegawai ORDER BY nama ASC");
            while($t=mysql_fetch_array($tampil)){
            echo "<option value=$t[id_pegawai]>$t[nama]</option>";
            }
			echo "</select></label>
		<label><span>ISI KEPUTUSAN</span><textarea name='isi' cols=80 rows=7>$r[isi]</textarea></label>
		<label><span>KETERANGAN</span><input type='text' name='ket' value='$r[ket]' size='70'></label>
		
		<input type=submit class=button value=Update>
        <input type=button class=button value=Batal onclick=self.history.back()></td></tr>
        </form></div>";
    break;
	
	case "lihatsKeputusan":
	
	$sqlQ =	"SELECT skeputusan.id_skeputusan, 
					skeputusan.nsurat, 
					skeputusan.kdwil, 
					skeputusan.kdmas, 
					skeputusan.blth, 
					skeputusan.tsurat, 
					skeputusan.pelaksana, 
						pegawai.nama,
						pegawai.pangkat,
						pegawai.nip,
						pegawai.nrp,
						pegawai.jab,
					skeputusan.isi, 
					skeputusan.ket,
					skeputusan.periode, 
					skeputusan.stamp
						FROM  skeputusan 
							INNER JOIN  pegawai ON ( skeputusan.pelaksana = pegawai.id_pegawai)";
	
	$edit = mysql_query("$sqlQ WHERE id_skeputusan='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
	
	$tgl	= tgl_indo($r[tsurat]);
	$nomor = $x.$r[nsurat].'/'.$r[kdwil].'/'.$r[kdmas].$r[blth];
	
	echo "<h1>Detail Informasi</h1>
			<div class='line'></div>
			<div class='box'>";
			
    echo "
          <form>
                   
		  <label><span>TERAKHIR DIBUAT/UPDATE</span><b>$r[stamp]</b></label>
		  <label><span>PERIODE</span><b>$r[periode]</b></label><br>
		  <label><span>TANGGAL SURAT</span>$tgl</label>
		  
		  <label><span>NOMOR SURAT</span><b>".$nomor."</b></label>
		  <label><span align=right>PETUGAS PELAKSANA</span>$r[nama]</label>
		  <label><span></span>$r[pangkat] (Pangkat)</label>
		  <label><span></span>$r[nip] (NIP)</label>
		  <label><span></span>$r[nrp] (NRP)</label>
		  <label><span></span>$r[jab] (Jabatan)</label>
		  <label><span>ISI SURAT KEPUTUSAN</span>$r[isi]</label>
		  <label><span>KETERANGAN SURAT</span>$r[ket]</label>
		  
         

          <br><br><input type=button class=button value=Kembali onclick=self.history.back()></td></tr>
          </form></div>";
    break;  
}
}
?>
