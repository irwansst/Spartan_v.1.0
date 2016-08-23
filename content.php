<?php
include "config/koneksi.php";
include "config/library.php";
include "config/fungsi_indotgl.php";
include "config/fungsi_combobox.php";
include "config/class_paging.php";

if ($_GET['op']=='home'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){

include "dashboard.php";
 echo "<br><br>
	<table class=table width=100%>
	<tr height=30px>
	<th colspan=5 align center>
	control box
	</th>
	</tr>
	<tr height=80px>
		<td align=center valign=center>
		<a href=show.php?op=sMasuk>
		Surat Masuk<br>
		<img src='images/mail.png' border='0'></a>
		</td>
		<td align=center valign=center>
		<a href=show.php?op=sKeluar>
		Surat Keluar<br>
		<img src='images/mail_sent.png' border='0'></a>
		</td>
		<td align=center valign=center>
		<a href=show.php?op=sKeluar>
		Pengarsipan<br>
		<img src='images/archive.png' border='0'></a>
		</td>
		<td align=center valign=center border='0'>
		<a href=show.php?op=laporan>
		Laporan <br>
		<img src='images/lap.png' border='0'></a>
		</td>
		<td align=center valign=center border='0'>
		<a href=show.php?op=conf>
		Konfigurasi<br>
		<img src='images/conf.png' border='0'></a>
		</td>
		</tr>
	</table>
";

		  
  echo "</td>
  <td width=10px>
  </td>
  "; 


  
   ?>
   
  <td>
  <h1>5 Input terakhir</h1>
  <div id="accordion">
	<h3><a href="#section1">Surat Masuk</a></h3>
	<div>
		<?php
	echo "
	<table class=table width=100%>
			<tr>
				<th align=center>No</th>
				<th align=center>No. Agenda</th>
				<th >Nomor Surat</th>
				<th>Tanggal<br>Surat</th>
				<th>Dari</th>
				<th>Hal</th>
				<th width=60px>Stamp</th>
				<th><img src='images/show.png' border='0'></th>
			</tr>
		";
		
	$no=1;
    $tampil	= mysql_query("SELECT * FROM smasuk WHERE  periode='$_SESSION[periode]' ORDER BY tMasuk DESC limit 5");
    while ($r=mysql_fetch_array($tampil)){
	
       echo "<tr>
			 <td align=center>$no</td>
			 <td align=center>$r[nAgenda]</td>
             <td align=left>$r[nSurat]</td>
             <td align=center>$r[tSurat]</td>
             <td>$r[dari]</td>
			 <td>$r[hal]</td>
             <td align=center>$r[stamp]</td>
             <td align=center>
			 <a href=?op=sMasuk&act=lihatsMasuk&id=$r[id_sMasuk]><img src='images/show.png' border='0'></a>
	         </td>
			 </tr>";
      $no++;
    }	
		echo"</table>";		

		
		?>
	</div>
	<h3><a href="#section2">Surat Keluar</a></h3>
	<div>
		<?php	
	echo "
	
	<table class=table width=100%>
	
			<tr>
				<th width=20px align=center>No</th>			
				<th >Nomor Surat</th>
				<th width=80px>Tanggal</th>
				<th width=140px>Perihal</th>
				<th>Penerbit</th>
				<th >Tujuan</th>
				<th align=center>Stamp</th>
				<th><img src='images/show.png' border='0'></th>
			</tr>
		";
		
	$no=1;
    $tgl	= tgl_indo($r[tglSurat]);
	
	$tampil	= mysql_query("SELECT * FROM sKeluar WHERE  periode='$_SESSION[periode]' ORDER BY stamp DESC limit 5");
	
    while ($r=mysql_fetch_array($tampil)){
	
	//if($r[sifat]=='B'){$x = "";}else{$x = "R-";}
	
	$noa = sprintf("%06d",$r[nAgenda]);
	
       echo "<tr>
			 <td align=center>$no</td>
             <td align=left>$r[jSurat]-$noa$r[nKontrol]$r[periode]</td>
             <td align=center>$r[tKeluar]</td>
             <td>$r[hal]</td>
			 <td>$r[penerbit]</td>
		     <td align=center>$r[kepada]</td>
			 <td align=center>$r[stamp]</td>
             <td align=center>
			 <a href=?op=sKeluar&pilih=$_GET[pilih]&act=lihatsKeluar&id=$r[id_sKeluar]><img src='images/show.png' border='0'></a>
	         </td>
			 </tr>";
      $no++;
    }	
		echo"</table>";

		
		?>
	</div>
	<h3><a href="#section3">Pengarsipan</a></h3>
	<div>
		<?php
		echo "
		<table class=table width=100%>
		<tr>
				<th align=center>No</th>
				<th>Nomor Surat</th>
				<th>Tanggal Surat</th>
				<th>Pelaksana</th>
				<th>Stamp</th>
				<th><img src='images/show.png' border='0'></th>
			</tr>
		";
		
	$no=1;
	$sqlQ =	"SELECT sperintah.id_sperintah, 
					sperintah.nsurat, 
					sperintah.kdwil, 
					sperintah.kdmas, 
					sperintah.blth, 
					sperintah.tsurat, 
					sperintah.pelaksana, 
						pegawai.nama,
						pegawai.pangkat,
						pegawai.nip,
						pegawai.nrp,
						pegawai.jab,
					sperintah.isi, 
					sperintah.ket,
					sperintah.periode, 
					sperintah.stamp
						FROM  sperintah 
							INNER JOIN  pegawai ON ( sperintah.pelaksana = pegawai.id_pegawai)";
	
    $tampil	= mysql_query("$sqlQ WHERE  periode='$_SESSION[periode]' ORDER BY tsurat DESC  limit 5");
    while ($r=mysql_fetch_array($tampil)){
	
	$nomor = $x.$r[nsurat].'/'.$r[kdwil].'/'.$r[kdmas].$r[blth];
	
       echo "<tr>
			 <td align=center>$no</td>
             <td align=right>$nomor</td>
             <td align=center>$r[tsurat]</td>
             <td>$r[nama]<br>NIP : $r[nip]</td>
             <td align=center>$r[stamp]</td>
             <td align=center>
			 <a href=?op=sPerintah&act=lihatsPerintah&id=$r[id_sperintah]><img src='images/show.png' border='0'></a>
	         </td>
			 </tr>";
      $no++;
    }	
		echo"</table>";
		?>
	</div>

	</div>
	</td>
	</tr>
	</table>
  <?php
 echo"<font size=1px>by <a class='modal1' href='javascript:void(0);'><b>Irwan Susanto</b></a></font>";

  }
}


elseif ($_GET['op']=='sMasuk'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_sMasuk/sMasuk.php";
  }
}

elseif ($_GET['op']=='sKeluar'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_sKeluar/sKeluar.php";
  }
}

elseif ($_GET['op']=='sPerintah'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_sPerintah/sPerintah.php";
  }
}

elseif ($_GET['op']=='sKeputusan'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_sKeputusan/sKeputusan.php";
  }
}
elseif ($_GET['op']=='kompilasi'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_kompilasi/kompilasi.php";
  }
}

elseif ($_GET['op']=='conf'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_conf/conf.php";
  }
}

elseif ($_GET['op']=='laporan'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_laporan/laporan.php";
  }
}

else{
  echo "<p><b>Operasi Belum Tersedia</b></p>";
}
?>
