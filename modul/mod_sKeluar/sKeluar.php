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
    
	echo "<input type=button class='button' value='Tambah Data' onclick=location.href='?op=sKeluar&act=tambahsKeluar'><br><br>";
	
	echo "
	<div class='demo_jui'>
	<table cellpadding='0' cellspacing='0' border='0' class='display' id='example'>
		<thead>
			<tr>
				<th width=20px align=center>No</th>
				<th >Tanggal</th>
				<th >Nomor Agenda</th>
				<th >Jenis Surat</th>				
				<th >Sifat Surat</th>
				<th >Lampiran</th>
				<th >Penerbit</th>
				<th>Kepada</th>
				<th>Perihal</th>
				<th>Keterangan</th>
				<th width=100px>Lihat/<br>Ubah</th>
			</tr>
		</thead>
		<tbody>";
		
	$no=1;
    $tampil	= mysql_query("SELECT * FROM sKeluar WHERE  periode='$_SESSION[periode]' ORDER BY tKeluar DESC");
    while ($r=mysql_fetch_array($tampil)){
	$noagd=sprintf("%06d",$r[nAgenda]);
	
       echo "<tr>
			 <td align=center>$no</td>
			 <td align=center>$r[tKeluar]</td>
			 <td align=center><b>$noagd</b></td>
			 <td>$r[jSurat]</td>
             <td>$r[uSifat]</td>
             <td>$r[jLampiran]</td>
             <td>$r[penerbit]</td>
             <td>$r[kepada]</td>
             <td>$r[hal]</td>
             <td>$r[ket]</td>
             <td align=center>
			 <a href=?op=sKeluar&act=lihatsKeluar&id=$r[id_sKeluar]><img src='images/show.png' border='0'></a>
			 <a href=?op=sKeluar&act=editsKeluar&id=$r[id_sKeluar]><img src='images/edit.png' border='0'></a>
	         </td>
			 </tr>";
      $no++;
    }	
		echo"</tbody></table></div><div class='spacer'></div>";
	
  break;

  
  case "tambahsKeluar":
      echo "<h1>Tambah SURAT KELUAR</h1>
			<div class='line'></div>
			<div class='box'>";
    echo "	
	        <form method=POST action='$aksi?op=sKeluar&act=input'>
			<label><span>TANGGAL REKAM			</span><input type='text' value='".tgl_indo(date("Y m d"))."' size='15' style='text-align:right;' disabled></label>";	
			
				
			//dropdown jenis surat			
			echo "	<label><span>JENIS SURAT</span>";
		    echo  "<select name='jsurat'>
            <option value=0 selected>- JENIS SURAT -</option>";
            $tampil=mysql_query("SELECT * FROM jenis ORDER BY kodejenis ASC");
            while($t=mysql_fetch_array($tampil)){
            echo "<option value='$t[kodejenis]'>$t[kodejenis]</option>";
            }
			echo "</select></label>";
			
			//dropdown kontrol surat			
			echo "	<label><span>KONTROL SURAT</span>";
		    echo  "<select name='nkontrol'>
            <option value=0 selected>- KONTROL SURAT -</option>";
            $tampil=mysql_query("SELECT kontrol FROM rjabatan ORDER BY kode ASC");
            while($t=mysql_fetch_array($tampil)){
            echo "<option value='$t[kontrol]'>$t[kontrol]</option>";
            }
			echo "</select></label>";
			
			//dropdown sifat surat
			echo "	<label><span>SIFAT SURAT</span>";
		    echo  "<select name='usifat'>
            <option value=0 selected>- SIFAT SURAT -</option>";
            $metu=mysql_query("SELECT * FROM rSifat ORDER BY id ASC");
            while($m=mysql_fetch_array($metu)){
            echo "<option value='$m[sifat]'>$m[sifat]</option>";
            }
			echo "</select></label>
			
			<label><span>LAMPIRAN			</span><input type='text' name='jlampiran' size='10'></label>";			
			//dropdown bidang penerbit
			echo "	<label><span>PENERBIT SURAT</span>";
		    echo  "<select name='penerbit'>
            <option value=0 selected>- BIDANG ATAU SEKSI-</option>";
            $melu=mysql_query("SELECT * FROM rjabatan ORDER BY id ASC");
            while($ml=mysql_fetch_array($melu)){
            echo "<option value='$ml[jabatan]'>$ml[jabatan]</option>";
            }
			echo "</select></label>		
		
		<div class='autocomplete'><label for='kantor'><span>TUJUAN SURAT			</span><input type='text' name='kepada' size='70' id='kantor'></label></div>
			
			<label><span>PERIHAL SURAT			</span><input type='text' name='hal' size='70'></label>
			<label><span>KETERANGAN SURAT			</span><input type='text' name='ket' size='70'></label>	
							
		<input type=submit class=button value=Simpan>
		<input type=button value=Batal class=button onclick=self.history.back()>
          </form></div>";

    break;
  

  case "editsKeluar":
    $edit = mysql_query("SELECT * FROM skeluar WHERE id_sKeluar='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
	
	
	echo "<h1>Ubah Surat Keluar</h1>
			<div class='line'></div>
			<div class='box'>";
    echo "
        <form method=POST action=$aksi?op=sKeluar&act=update>
        <input type=hidden name=id value=$r[id_sKeluar]>
		
		<label><span>TANGGAL SURAT KELUAR	</span><input type='text' value='$r[tKeluar]' size='15' style='text-align:right;' id='datepicker' name='tkeluar'></label>
		<label><span>NOMOR AGENDA			</span><input type='text' name='nagenda' value='$r[nAgenda]' size='6'></label>
		<label><span>JENIS SURAT</span>";
		    echo  "<select name='jsurat'>
            <option value=$r[jSurat] selected>$r[jSurat]</option>";
            $tampil=mysql_query("SELECT * FROM jenis ORDER BY kodejenis ASC");
            while($t=mysql_fetch_array($tampil)){
            echo "<option value='$t[kodejenis]'>$t[kodejenis]</option>";
            }
		  echo "</select></label>";
		  
			//dropdown kontrol surat			
			echo "	<label><span>KONTROL SURAT</span>";
		    echo  "<select name='nkontrol'>
            <option value=$r[nKontrol] selected>$r[nKontrol]</option>";
            $tampil=mysql_query("SELECT kontrol FROM rjabatan ORDER BY kode ASC");
            while($t=mysql_fetch_array($tampil)){
            echo "<option value='$t[kontrol]'>$t[kontrol]</option>";
            }
			echo "</select></label>";

			//dropdown sifat surat
			echo "	<label><span>SIFAT SURAT</span>";
		    echo  "<select name='usifat'>
            <option value=$r[uSifat] selected>$r[uSifat]</option>";
            $metu=mysql_query("SELECT * FROM rSifat ORDER BY id ASC");
            while($m=mysql_fetch_array($metu)){
            echo "<option value='$m[sifat]'>$m[sifat]</option>";
            }
			echo "</select></label>
		
		<label><span>LAMPIRAN			</span><input type='text' name='jlampiran' value='$r[jLampiran]' size='40'></label>";
		
			//dropdown bidang penerbit
			echo "	<label><span>PENERBIT SURAT</span>";
		    echo  "<select name='penerbit'>
            <option value='$r[penerbit]' selected>$r[penerbit]</option>";
            $melu=mysql_query("SELECT * FROM rjabatan ORDER BY id ASC");
            while($ml=mysql_fetch_array($melu)){
            echo "<option value='$ml[jabatan]'>$ml[jabatan]</option>";
            }
			echo "</select></label>			
		
<div class='autocomplete'><label for='kantor'><span>DITUJUKAN KEPADA			</span><input type='text' name='kepada' size='70' id='kantor' value='$r[kepada]'></label></div>			
		
		<label><span>PERIHAL SURAT			</span><input type='text' name='hal' value='$r[hal]' size='70'></label>

		<label><span>KETERANGAN	</span><input type='text' name='ket' value='$r[ket]' size='70'></label>		
		
	 
		<input type=submit class=button value=Update>
        <input type=button class=button value=Batal onclick=self.history.back()></td></tr>
        </form></div>";
    break;
	
	case "lihatsKeluar":
    $edit = mysql_query("SELECT * FROM sKeluar as a left join jenis as b on a.jSurat=b.kodejenis WHERE id_sKeluar='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
	
	$tgl	= tgl_indo($r[tSurat]);
	$tgl1	= tgl_indo($r[tMasuk]);
	
	//memformat nomor agenda
	$noagd 	= sprintf("%06d",$r[nAgenda]);
	

	echo "<h1>Detail Informasi</h1>
			<div class='line'></div>
			<div class='box'>";
			
    echo "
          <form method=POST action=$aksi?op=sKeluar&act=update>
                   
		  <label><span>TERAKHIR DIBUAT/UPDATE</span>: <b>$r[stamp]</b></label>
		  <label><span>PERIODE</span>: <b>$r[periode]</b></label><br>

		  <label><span>NOMOR SURAT</span>: <b>$r[jSurat]-$noagd$r[nKontrol]$r[periode]</b></label>
		  <label><span>TANGGAL REKAM SURAT</span>: $r[tKeluar]</label><br>
		  
		  <label><span>JENIS SURAT</span>: $r[urjenis]</label>
		  <label><span>SIFAT SURAT </span>: $r[uSifat]</label>
		  <label><span>JUMLAH LAMPIRAN SURAT</span>: $r[jLampiran]</label>
		  <label><span>PENERBIT SURAT</span>: $r[penerbit]</label>
		  <label><span>TUJUAN SURAT</span>: $r[kepada]</label>
		  <label><span>PERIHAL SURAT</span>: $r[hal]</label>
		  <label><span>KETERANGAN TAMBAHAN</span>: $r[ket]</label>     

          <br><br><input type=button class=button value=Kembali onclick=self.history.back()></td></tr>
          </form></div>";
    break; 


}
}
?>
