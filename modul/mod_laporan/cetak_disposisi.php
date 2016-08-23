<?php

error_reporting(0);

$timezone = "Asia/Jakarta";
if(function_exists(date_default_timezone_set)) date_default_timezone_set($timezone);

session_start();
if (empty($_SESSION[username]) AND empty($_SESSION[passuser])){
  echo "<link href=style.css rel=stylesheet type=text/css>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
error_reporting(0);
include "../../plugin/mpdf/mpdf.php";
include "../../config/koneksi.php";

ob_start();

$nama 	= mysql_query("SELECT * from nama WHERE id_nama=1 ");
$tnama	= mysql_fetch_array($nama);

$kue	= mysql_query("Select * from smasuk a left join jenis b on a.jSurat=b.kodejenis where id_sMasuk=$_GET[id]");
$h		= mysql_fetch_array($kue);

$jab3	= mysql_query("select jabatan from rjabatan where eselon='3' ");
$jab4	= mysql_query("select jabatan from rjabatan where eselon='4' ");

echo '	
	<html>
	<head><title></title>
		<style type="text/css">
	p{
		text-align:left;
		font-size:7px;
		font-family:"Times New Roman", Times, serif;
		color:#000066;
	}
	body{
		font-size:10px;
		font-family:"Times New Roman", Times, serif;	
	}
	
	table{
		border-style:solid;
		border-width:thin;
		border-spacing:inherit;
	}
		
	</style>
	
	</head>
	<body>
	<table width="100%" cellspacing="0">
	<tr><td rowspan="5" width="15%" align=center><img src="../../images/logo-keu.jpg" width="75px" height="60px" ></img></td>
	<td align=center width="85%" style="font-size:16px;">KEMENTERIAN KEUANGAN REPUBLIK INDONESIA</td></tr>
	<tr><td align=center style="font-size:14px;">DIREKTORAT JENDERAL PERBENDAHARAAN</td></tr>
	<tr><td align=center style="font-size:12px;">'.$tnama[nama].'</td></tr>
	<tr><td align=center style="font-size:9px;">'.$tnama[alamat].' </td></tr>
	<tr><td align=center style="font-size:9px;"> Telpon:'.$tnama[telp].' Email: '.$tnama[email].' Website:'.$tnama[web].'</td></tr>
	</table>

	<table width="100%" cellspacing="0">
	<tr><td align=center bgcolor=black style="font-weight:bold; color:#ffffff; font-size:12px;">LEMBAR DISPOSISI '.$tnama[nama].'</td></tr>
	</table>	
	
	<table width="100%" cellspacing="0" cellpadding="7">
	<tr><td wdith="33%" style="border-width:thin; border-right-style:solid;" >Nomor Naskah Dinas :'.$h[nSurat].' 
	<br/>Tanggal Naskah Dinas : '.$h[tSurat].' 
	<br/>Lampiran : '.$h[jLampiran].'
	</td><td width="34%" valign=top >Status: '.$h[status].' <br/>Sifat: '.$h[uSifat].'<br/>Jenis:  '.$h[jSurat].' ('.$h[urjenis].')</td>
	<td width="33%" style="border-width:thin; border-left-style:solid;" valign=top>Diterima Tanggal: '.$h[tMasuk].' <br/>
	Nomor Agenda : <b>'.$h[nAgenda].'</b></td></tr>
	</table>
	
	<table width="100%" cellspacing="0" cellpadding="7">
	<tr><td><font size="10pt">Dari : '.$h[dari].' <br/>Hal : '.$h[hal].' </font></td></tr>
	</table>
	
	<table width="100%" cellspacing="0" cellpadding="7">';
	
	if($h[uSifat]="SEGERA"){
	echo '
	<tr><td width="50%" align="center" style="border-width:thin; border-right-style:solid;"><input type="checkbox" name="usifat" value="SEGERA" checked="true">SEGERA</td>
	<td width="50%" align="center" style="border-width:thin; border-left-style:solid;"><input type="checkbox" name="usifat" value="SANGAT SEGERA"  >SANGAT SEGERA</td></tr>';
	}else{
	echo '
	<tr><td width="50%" align="center" style="border-width:thin; border-right-style:solid;"><input type="checkbox" name="usifat" value="SEGERA" >SEGERA</td>
	<td width="50%" align="center" style="border-width:thin; border-left-style:solid;"><input type="checkbox" name="usifat" value="SANGAT SEGERA" checked="true">SANGAT SEGERA</td></tr>';
	};
	
echo '	
	</table>
	
	<table width="100%" cellspacing="0" cellpadding="7">
	<tr><td style="border-style:solid";><font size="10pt">[  ] Disajikan Untuk Yth : [  ] Kepala Kantor </font></td></tr>
	</table>

	<table width="100%" cellspacing="0" cellpadding="7">
	<tr style="font-size:10pt;">
	<td valign=top>
	<br/>
	<b><u>DISPOSISI KEPADA:</u></b><br/>';
	while($j3 = mysql_fetch_array($jab3)){
		echo '[     ] '.$j3[jabatan];
		echo '<br />';
		};

echo '
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<b><u>CATATAN:</u></b>
	</td>
	<td valign=top>
	<br/>
	<b><u>PEJABAT ESELON IV:</u></b><br/>';
		while($j4 = mysql_fetch_array($jab4)){
		echo '[     ] '.$j4[jabatan];
		echo '<br />';
		};
	
echo '	
	<br/>
	<b>[  ] PEJABAT/UNIT LAIN</b>
	</td>
	<td>
	<br/>
	<b>PETUNJUK:</b><br/>
	[  ] Setuju sesuai dgn ketentuan yang berlaku <br/>
	[  ] Tolak sesuai dgn ketentuan yang berlaku <br/>
	[  ] Selesaikan sesuai dgn ketentuan yang berlaku <br/>
	[  ] Jawab sesuai dgn ketentuan yang berlaku <br/>
	[  ] Perbaiki sesuai dgn ketentuan yang berlaku <br/>
	[  ] Teliti dan Pendapat <br/>
	[  ] Sesuai catatan <br/>
	[  ] Untuk perhatian <br/>
	[  ] Untuk diketahui <br/>
	[  ] Edarkan <br/>
	[  ] Bicarakan dengan saya <br/>
	[  ] Bicarakan bersama dan laporkan hasilnya <br/>
	[  ] Dijadwalkan <br/>
	[  ] Disimpan <br/>
	[  ] Disiapkan <br/>
	[  ] Ingatkan <br/>
	[  ] Harap dihadiri/ diwakili <br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	</td>
	</tr>
	</table>	
	
	<table width="100%" cellspacing="0" cellpadding="7">
	<tr><td width="50%" align=left style="border-width:thin; border-right-style:solid; border-bottom-style:solid;"><font size="10pt">Tgl dikirim untuk proses: <br/>Diterima Oleh:<br/><br/><br/><br/><br/><br/></font></td>
	<td width="50%" align=left style="border-width:thin; border-bottom-style:solid;"><font size="10pt">Diajukan kembali tanggal: <br/>Diterima Oleh:<br/><br/><br/></font><br/><br/><br/></td></tr>
	<tr><td width="50%" align=left style="border-width:thin; border-right-style:solid; ">Tgl kembali untuk proses: <br/>Diterima Oleh:<br/><br/><br/><br/><br/><br/></font></td>
	<td width="50%" align=left style="border-width:thin; "><font size="10pt">Tanggal selesai dari KK:<br/><br/><br/><br/><br/><br/></font></td></tr>
	</table>	
	<font size="8pt" color="grey"><p>NB: Format Disposisi sesuai dengan PMK-181/PMK.01/2014 tentang Tata Naskah Dinas di Kementerian Keuangan</p></font>
	</body></html>';
	
$html	= ob_get_contents();
ob_end_clean();
$mpdf = new mPDF('utf-8','A4');
$mpdf->setFooter('Generate by: Aplikasi SPARTAN {font-size}||');
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf",'I');
exit;
}	
?>

