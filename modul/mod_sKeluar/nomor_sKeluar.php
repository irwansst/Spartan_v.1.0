<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_sKeluar/nomor_sKeluar.php";

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
				<th >Nomor Agenda</th>
				<th >Jenis Surat</th>
				<th >Sifat Surat</th>				
				<th >Nomor Surat</th>
				<th width=80px>Tanggal Surat</th>
				<th width=80px>Tanggal <br>Surat Masuk</th>
				<th>Dari</th>
				<th>Perihal</th>
				<th>Disposisi</th>
				<th>Status</th>
				<th width=100px>Lihat/<br>Ubah</th>
			</tr>
		</thead>
		<tbody>";
		
	$no=1;
    $tampil	= mysql_query("SELECT * FROM sKeluar WHERE  periode='$_SESSION[periode]' ORDER BY tMasuk DESC");
    while ($r=mysql_fetch_array($tampil)){
	
       echo "<tr>
			 <td align=center>$no</td>
			 <td align=center>$r[nAgenda]</td>
			 <td align=center>$r[jSurat]</td>
			 <td align=center>$r[uSifat]</td>
             <td align=right>$r[nSurat]</td>
             <td align=center>$r[tSurat]</td>
             <td align=center>$r[tMasuk]</td>
             <td>$r[dari]</td>
             <td>$r[hal]</td>
             <td>$r[dispo]</td>
		     <td>$r[status]</td>
             <td align=center>
			 <a href='modul/mod_laporan/pdf_disposisi.php?id=$r[id_sKeluar]' target='_blank'><img src='images/printer.png' border='0'></a>
			 <a href=?op=sKeluar&act=lihatsKeluar&id=$r[id_sKeluar]><img src='images/show.png' border='0'></a>
			 <a href=?op=sKeluar&act=editsKeluar&id=$r[id_sKeluar]><img src='images/edit.png' border='0'></a>
	         </td>
			 </tr>";
      $no++;
    }	
		echo"</tbody></table></div><div class='spacer'></div>";
	
  break;

  
  case "tambahsKeluar":
      echo "<h1>Tambah SURAT MASUK</h1>
			<div class='line'></div>
			<div class='box'>";
    echo "	
	        <form method=POST action='$aksi?op=sKeluar&act=input'>
			<label><span>TANGGAL REKAM			</span><input type='text' value='".tgl_indo(date("Y m d"))."' size='15' style='text-align:right;' disabled></label>";	
			
			//membuat nomor agenda baru secara otomatis
			$nom = mysql_query("SELECT nAgenda from sKeluar ORDER BY id_sKeluar DESC LIMIT 1");
			while($t=mysql_fetch_array($nom)){
            $int=(float)$t[nAgenda];
			$agdbaru=$int+1;
			$noagd=sprintf("%06d", $agdbaru);
			echo "	<label><span>NOMOR AGENDA			</span><input type='text' value='$noagd' name='nagenda' size='6'></label>";
            }	
			
			//dropdown jenis surat			
			echo "	<label><span>JENIS SURAT</span>";
		    echo  "<select name='jsurat'>
            <option value=0 selected>- JENIS SURAT -</option>";
            $tampil=mysql_query("SELECT * FROM jenis ORDER BY kodejenis ASC");
            while($t=mysql_fetch_array($tampil)){
            echo "<option value='$t[kodejenis]'>$t[kodejenis]</option>";
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
			
			<label><span>NOMOR SURAT			</span><input type='text' name='nsurat' size='40'></label>
			<label><span>TANGGAL SURAT			</span><input type='text' name='tsurat' id='datepicker' size='15'></label>
			<label><span>LAMPIRAN			</span><input type='text' name='jlampiran' size='10'></label>					
		
		
		<div class='autocomplete'><label for='kantor'><span>SURAT TERIMA DARI			</span><input type='text' name='dari' size='70' id='kantor'></label></div>
			
			<label><span>PERIHAL SURAT			</span><input type='text' name='hal' size='70'></label>

			<label><span>DISPOSISI SURAT KEPADA	</span>";
			
			//dropdown disposisi surat
			echo "<select name='dispo'>
					<option value=0 selected>- DAFTAR PEJABAT -</OPTION>";
					$kueri=mysql_query("SELECT * FROM rJabatan ORDER BY kode ASC");
					while ($k=mysql_fetch_array($kueri)){
					echo "<option value='$k[jabatan]'>$k[jabatan]</option>";		
					}
			echo "</select></label>
			
			
			<label><span>STATUS			</span>";
			
			//dropdown status surat
			echo "<select name='status'>
					<option value=0 selected>- STATUS -</OPTION>";
					$status=mysql_query("SELECT * FROM rStatus ORDER BY id ASC");
					while ($st=mysql_fetch_array($status)){
					echo "<option value='$st[status]'>$st[status]</option>";		
					}
			echo "</select></label>
			
			
		
		<input type=submit class=button value=Simpan>
		<input type=button value=Batal class=button onclick=self.history.back()>
          </form></div>";

    break;
  

  case "editsKeluar":
    $edit = mysql_query("SELECT * FROM sKeluar WHERE id_sKeluar='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
	
	
	echo "<h1>Ubah sKeluar</h1>
			<div class='line'></div>
			<div class='box'>";
    echo "
        <form method=POST action=$aksi?op=sKeluar&act=update>
        <input type=hidden name=id value=$r[id_sKeluar]>
		
		<label><span>TANGGAL SURAT MASUK	</span><input type='text' value='".tgl_indo(date("Y m d"))."' size='15' style='text-align:right;' disabled></label>
		<label><span>NOMOR AGENDA			</span><input type='text' name='nagenda' value='$r[nAgenda]' size='6'></label>
		<label><span>JENIS SURAT</span>";
		    echo  "<select name='jsurat'>
            <option value=$r[jSurat] selected>$r[jSurat]</option>";
            $tampil=mysql_query("SELECT * FROM jenis ORDER BY kodejenis ASC");
            while($t=mysql_fetch_array($tampil)){
            echo "<option value='$t[kodejenis]'>$t[kodejenis]</option>";
            }
		  echo "</select></label>";
		  
			//dropdown sifat surat
			echo "	<label><span>SIFAT SURAT</span>";
		    echo  "<select name='usifat'>
            <option value='$r[uSifat]' selected>$r[uSifat]</option>";
            $metu=mysql_query("SELECT * FROM rSifat ORDER BY id ASC");
            while($m=mysql_fetch_array($metu)){
            echo "<option value='$m[sifat]'>$m[sifat]</option>";
            }
			echo "</select></label>
		
		<label><span>NOMOR SURAT			</span><input type='text' name='nsurat' value='$r[nSurat]' size='40'></label>
		<label><span>TANGGAL SURAT			</span><input type='text' name='tsurat' value='$r[tSurat]' id='datepicker' size='15'></label>
			<label><span>LAMPIRAN			</span><input type='text' name='jlampiran' value='$r[jLampiran]' size='10'></label>
		
		<div class='autocomplete'><label for='kantor'><span>SURAT TERIMA DARI			</span><input type='text' name='dari' size='70' id='kantor' value='$r[dari]'></label></div>		
					
		
		<label><span>PERIHAL SURAT			</span><input type='text' name='hal' value='$r[hal]' size='70'></label>
		
		<label><span>DISPOSISI SURAT KEPADA	</span>";
			
			//dropdown disposisi surat
			echo "<select name='dispo'>
					<option value='$r[dispo]' selected>$r[dispo]</OPTION>";
					$jabatan=mysql_query("SELECT * FROM rJabatan ORDER BY kode ASC");
					while ($jb=mysql_fetch_array($jabatan)){
					echo "<option value='$jb[jabatan]'>$jb[jabatan]</option>";		
					}
			echo "</select></label>
			
			<label><span>STATUS	</span>";
			
			//dropdown status surat
			echo "<select name='status'>
					<option value=$r[status] selected>$r[status]</OPTION>";
					$status=mysql_query("SELECT * FROM rStatus ORDER BY id ASC");
					while ($st=mysql_fetch_array($status)){
					echo "<option value='$st[status]'>$st[status]</option>";		
					}
			echo "</select></label>
	 
		<input type=submit class=button value=Update>
        <input type=button class=button value=Batal onclick=self.history.back()></td></tr>
        </form></div>";
    break;
	
	case "lihatsKeluar":
    $edit = mysql_query("SELECT * FROM sKeluar WHERE id_sKeluar='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
	
	$tgl	= tgl_indo($r[tSurat]);
	$tgl1	= tgl_indo($r[tMasuk]);
	
	
	echo "<h1>Detail Informasi</h1>
			<div class='line'></div>
			<div class='box'>";
			
    echo "
          <form method=POST action=$aksi?op=sKeluar&act=update>
                   
		  <label><span>TERAKHIR DIBUAT/UPDATE</span>: <b>$r[stamp]</b></label>
		  <label><span>PERIODE</span>: <b>$r[periode]</b></label><br>

		  <label><span>NOMOR SURAT</span>: <b>".$r[nSurat]."</b></label>
		  <label><span>TANGGAL SURAT</span>: $tgl</label><br>
		  
		  <label><span>TANGGAL SURAT DITERIMA</span>: $tgl1</label>
		  <label><span>SURAT DARI </span>: $r[dari]</label>
		  <label><span>PERIHAL SURAT</span>: $r[hal]</label>
		  <label><span>SURAT DITUJUKAN KEPADA</span>: $r[dispo]</label>
		  <label><span>STATUS SURAT</span>: $r[ket]</label>
		  
         

          <br><br><input type=button class=button value=Kembali onclick=self.history.back()></td></tr>
          </form></div>";
    break; 


}
}
?>
