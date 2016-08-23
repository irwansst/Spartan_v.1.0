<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_sKeluar/aksi_sKeluar.php";

switch($_GET[act]){
  
  default:
  
    echo "<h1>Surat Keluar periode $_SESSION[periode]</h1>";
    echo "<div align=right>
	<input type=button class='button' value='Surat Biasa' 	onclick=location.href='?op=sKeluar&pilih=B'>
	<input type=button class='button' value='Surat Rahasia' onclick=location.href='?op=sKeluar&pilih=R'>
	</div>";
	
    if($_GET[pilih]=='R'){
	echo "<input type=button class='button' value='Tambah Surat Rahasia' onclick=location.href='?op=sKeluar&pilih=R&act=tambahsKeluar'><br><br>";
	}else{
	echo "<input type=button class='button' value='Tambah Surat Biasa' onclick=location.href='?op=sKeluar&pilih=B&act=tambahsKeluar'><br><br>";
	}
	
	echo "
	<div class='demo_jui'>
	<table cellpadding='0' cellspacing='0' border='0' class='display' id='example'>
		<thead>
			<tr>
				<th width=20px align=center>No</th>
				<th >Nomor Surat</th>
				<th width=80px>Tanggal</th>
				<th>Perihal</th>
				<th >Kepada</th>
				<th>Keterangan</th>
				<th width=140px>Stamp</th>
				<th width=50px>Lihat/<br>Ubah</th>
			</tr>
		</thead>
		<tbody>";
		
	$no=1;
    $tgl	= tgl_indo($r[tglSurat]);
	
	if($_GET[pilih]=='R'){
	$tampil	= mysql_query("SELECT * FROM sKeluar WHERE sifat='R' AND periode='$_SESSION[periode]' ORDER BY stamp DESC");
	}else{
	$tampil	= mysql_query("SELECT * FROM sKeluar WHERE sifat='B' AND periode='$_SESSION[periode]' ORDER BY stamp DESC");
	}
	
    while ($r=mysql_fetch_array($tampil)){
	
	if($r[sifat]=='B'){$x = "B-";}else{$x = "R-";}
	$nomor = $x.$r[nSurat].'/'.$r[kdWil].'/'.$r[kdMas].$r[blnThn];
       echo "<tr>
			 <td align=center>$no</td>
             <td align=right>$nomor</td>
             <td align=center>$r[tglSurat]</td>
             <td>$r[hal]</td>
             <td>$r[kepada]</td>
		     <td>$r[ket]</td>
		     <td align=center>$r[stamp]</td>
             <td align=center>
			 <a href=?op=sKeluar&pilih=$_GET[pilih]&act=lihatsKeluar&id=$r[id_sKeluar]><img src='images/show.png' border='0'></a>
			 <a href=?op=sKeluar&pilih=$_GET[pilih]&act=editsKeluar&id=$r[id_sKeluar]><img src='images/edit.png' border='0'></a>
	         </td>
			 </tr>";
      $no++;
    }	
		echo"</tbody></table></div><div class='spacer'></div>";
	
  break;

  
  case "tambahsKeluar":
      echo "<h1>Tambah sKeluar</h1>
			<div class='line'></div>
			<div class='box'>";
	
	$count 	= mysql_query("SELECT count(*) as jml FROM skeluar WHERE sifat='$_GET[pilih]' AND periode='$_SESSION[periode]'");
	$rj		= mysql_fetch_array($count);
	$tn		= ($rj[jml]+1);
	$newNO  = sprintf("%04s", $tn);
    echo "	
	        <form method=POST action='$aksi?op=sKeluar&act=input'>
			<input type=hidden name='sifat' value='$_GET[pilih]'>
			<label><span>TANGGAL SURAT</span><input type='text' value='".tgl_indo(date("Y m d"))."' size='15' style='text-align:right;' disabled></label>
			<label><span>NOMOR SURAT</span><input type='text' name='nsurat' size='1' value='$newNO'  style='text-align:center;' disabled></label>
			<label><span>KODE WILAYAH</span><input type='text' name='kdwil' size='10' style='text-align:center;'></label>
			<label><span>KODE MASALAH</span><input type='text' name='kdmas' size='10' style='text-align:center;'></label>
			<label><span>PERIHAL</span><input type='text' name='hal' size='70'></label>
			<label><span>DITUJUKAN KEPADA</span><input type='text' name='kepada' size='50'></label>
			<label><span>KETERANGAN</span><input type='text' name='ket' size='70'></label>
		
		<input type=submit class=button value=Simpan>
		<input type=button value=Batal class=button onclick=self.history.back()>
          </form></div>";

    break;
  

  case "editsKeluar":
    $edit = mysql_query("SELECT * FROM sKeluar WHERE id_sKeluar='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
	
	if($r[sifat]=='B'){$x = "B-";}else{$x = "R-";}
	$nomor = $x.$r[nSurat].'/'.$r[kdWil].'/'.$r[kdMas].$r[blnThn];
	
	echo "<h1>Ubah sKeluar</h1>
			<div class='line'></div>
			<div class='box'>";
    echo "
        <form method=POST action=$aksi?op=sKeluar&act=update>
        <input type=hidden name=id value=$r[id_sKeluar]>
		<input type=hidden name='sifat' value='$_GET[pilih]'>
          
		<label><span>TANGGAL SURAT</span><input type='text' value='".tgl_indo($r[tglSurat])."' disabled size='30' style='text-align:right;' disabled></label>
		<label><span>NOMOR SURAT</span><input type='text' value=".$nomor." size='30' disabled style='text-align:right;'></label>
		
		
		<label><span>KODE WILAYAH</span><input type='text' name='kdwil' value='$r[kdWil]' size='10' style='text-align:center;'></label>
		<label><span>KODE MASALAH</span><input type='text' name='kdmas' value='$r[kdMas]' size='10' style='text-align:center;'></label>
		<label><span>PERIHAL</span><input type='text' name='hal' value='$r[hal]' size='70'></label>
		<label><span>DITUJUKAN KEPADA</span><input type='text' name='kepada' value='$r[kepada]' size='50'></label>
		<label><span>KETERANGAN</span><input type='text' name='ket' value='$r[ket]' size='70'></label>
		
		<input type=submit class=button value=Update>
        <input type=button class=button value=Batal onclick=self.history.back()></td></tr>
        </form></div>";
    break;
	
	case "lihatsKeluar":
    $edit = mysql_query("SELECT * FROM sKeluar WHERE id_sKeluar='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
	
	$tgl	= tgl_indo($r[tglSurat]);
	
	if($r[sifat]=='B'){$x = "B-";}else{$x = "R-";}
	$nomor = $x.$r[nSurat].'/'.$r[kdWil].'/'.$r[kdMas].$r[blnThn];
	
	echo "<h1>Detail Informasi</h1>
			<div class='line'></div>
			<div class='box'>";
			
	if($r[sifat]=='B'){$s = "Biasa (B)";}else{$s = "<font color=red>Rahasia (R)</font>";}
    echo "
          <form method=POST action=$aksi?op=sKeluar&act=update>
                   
		  <label><span>TERAKHIR DIBUAT/UPDATE</span>: <b>$r[stamp]</b></label>
		  <label><span>PERIODE</span>: <b>$r[periode]</b></label><br>
		  <label><span>TANGGAL SURAT</span>: $tgl</label>
		  <label><span>SIFAT</span>: <b>$s</b></label>
		  <label><span>NOMOR SURAT</span>: <b>".$nomor."</b></label>
		  <label><span>PERIHAL SURAT</span>: $r[hal]</label>
		  <label><span>SURAT DITUJUKAN KEPADA</span>: $r[kepada]</label>
		  <label><span>KETERANGAN SURAT</span>: $r[ket]</label>
		  
         

          <br><br><input type=button class=button value=Kembali onclick=self.history.back()></td></tr>
          </form></div>";
    break;  
}
}
?>
