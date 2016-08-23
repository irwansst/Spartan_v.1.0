<?php

error_reporting(0);

$timezone = "Asia/Jakarta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);

session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
error_reporting(0);
include "../../config/koneksi.php";
require_once("C:/xampp/htdocs/spartan/plugin/dompdf/dompdf_config.inc.php");


$nama 	= mysql_query("SELECT * from nama WHERE id_nama='1' ");
$tnama	= mysql_fetch_array($nama);

$kue	= mysql_query("Select * from smasuk a left join jenis b on a.jSurat=b.kodejenis where id_sMasuk=$_GET[id]");
$h		= mysql_fetch_array($kue);

	
$html = 
	'<html><body>'.
	'<table width="100%" style="border-left-style: solid; border-right-style: solid; border-top-style:solid;" cellspacing="0">'.
	'<tr><td rowspan="5" width="15%" align=center><img src="../../images/logo-keu.jpg" width="75px" height="60px" ></img></td>'.
	'<td align=center width="85%"><font size="12pt">KEMENTERIAN KEUANGAN REPUBLIK INDONESIA</font></td></tr>'.
	'<tr><td align=center><font size="11pt">DIREKTORAT JENDERAL PERBENDAHARAAN</font></td></tr>'.
	'<tr><td align=center><font size="10pt">'."$tnama[nama]".'</font></td></tr>'.
	'<tr><td align=center><font size="8pt">'."$tnama[alamat]".' </font></td></tr>'.
	'<tr><td align=center><font size="7pt"> Telpon:'."$tnama[telp]".' Email:'."$tnama[email]".' Website:'."$tnama[web]".'</font></td></tr>'.
	'</table>'.

	'<table width="100%" style="border-left-style: solid; border-right-style: solid; border-top-style:solid;" cellspacing="0">'.
	'<tr><td align=center bgcolor=black><font color=white>LEMBAR DISPOSISI '."$tnama[nama]".'</font></td></tr>'.
	'</table>'.	
	
	'<table width="100%" style="solid; border-left-style: solid; border-right-style: solid;" cellspacing="0" cellpadding="7">'.
	'<tr><td wdith="33%" style="border-style: solid;"><font size="8pt">Nomor Naskah Dinas :'."$h[nSurat]".' '.
	'<br/>Tanggal Naskah Dinas : '."$h[tSurat]".' '.
	'<br/>Lampiran : '.strtolower("$h[jLampiran]").'  '.
	'</font></td><td width="34%" style="border-style: solid;"><font size="8pt">Status: '."$h[status]".' <br/>Sifat: '."$h[uSifat]".'<br/>Jenis:  '."$h[jSurat]".' ('."$h[urjenis]".')</font></td>'.
	'<td width="33%" style="border-style: solid;"><font size="8pt">Diterima Tanggal: '."$h[tMasuk]".' <br/>'.
	'Nomor Agenda : </font><font size="12pt"><b>'."$h[nAgenda]".'</b></font></td></tr>'.
	'</table>'.
	
	'<table width="100%" style="solid; border-left-style: solid; border-right-style: solid;" cellspacing="0" cellpadding="7">'.
	'<tr><td><font size="10pt">Dari : '."$h[dari]".' <br/>Hal : '."$h[hal]".' </font></td></tr>'.
	'</table>'.
	
	'<table width="100%" style="solid; border-left-style: solid; border-right-style: solid;" cellspacing="0" cellpadding="7">'.
	'<tr><td width="50%" align="center" style="border-style:solid";><font size="10pt">[  ] SEGERA</font></td>'.
	'<td width="50%" align="center" style="border-style:solid";><font size="10pt">[  ] SANGAT SEGERA</font></td></tr>'.
	'</table>'.
	
	'<table width="100%" style="solid; border-left-style: solid; border-right-style: solid;" cellspacing="0" cellpadding="7">'.
	'<tr><td style="border-style:solid";><font size="10pt">[  ] Disajikan Untuk Yth : [  ] Kepala Kantor </font></td></tr>'.
	'</table>'.

	'<table width="100%" style="solid; border-left-style: solid; border-right-style: solid;" cellspacing="0" cellpadding="7">'.
	'<tr style="font-size:10pt;">'.
	'<td valign=top>'.
	'<br/>'.
	'<b><u>DISPOSISI KEPADA:</u></b><br/>'.
	'[  ] Kepala Bagian Umum <br/>'.
	'[  ] Kepala Bidang PPA I <br/>'.
	'[  ] Kepala Bidang PPA II <br/>'.
	'[  ] Kepala Bidang SKKI <br/>'.
	'[  ] Kepala Bidang PAPK <br/>'.
	'<br/>'.
	'<br/>'.
	'<br/>'.
	'<br/>'.
	'<br/>'.
	'<br/>'.
	'<br/>'.
	'<br/>'.
	'<br/>'.
	'<b><u>CATATAN:</u></b>'.
	'</td>'.
	'<td valign=top>'.
	'<br/>'.
	'<b><u>PEJABAT ESELON IV:</u></b><br/>'.
	'[  ] Kepala Subbagian Kepegawaian <br/>'.
	'[  ] Kepala Subbagian Keuangan <br/>'.
	'[  ] Kepala Subbagian TU dan RT <br/>'.
	'[  ] Kepala Subbagian Penilaian Kinerja <br/>'.
	'[  ] Kepala Seksi PPA IA/IB/IC/ID <br/>'.
	'[  ] Kepala Seksi PPA IIA/IIB/IIC <br/>'.
	'[  ] Kepala Seksi Kepatuhan Internal <br/>'.
	'[  ] Kepala Seksi Supervisi Proses Bisnis <br/>'.
	'[  ] Kepala Seksi Supervisi Teknis Aplikasi <br/>'.
	'[  ] Kepala Seksi ASPLK <br/>'.
	'[  ] Kepala Seksi PSAPP <br/>'.
	'[  ] Kepala Seksi PSAPD <br/>'.
	'<br/>'.
	'<b>[  ] PEJABAT/UNIT LAIN</b>'.
	'</td>'.
	'<td>'.
	'<br/>'.
	'<b>PETUNJUK:</b><br/>'.
	'[  ] Setuju sesuai dgn ketentuan yang berlaku <br/>'.
	'[  ] Tolak sesuai dgn ketentuan yang berlaku <br/>'.
	'[  ] Selesaikan sesuai dgn ketentuan yang berlaku <br/>'.
	'[  ] Jawab sesuai dgn ketentuan yang berlaku <br/>'.
	'[  ] Perbaiki sesuai dgn ketentuan yang berlaku <br/>'.
	'[  ] Teliti dan Pendapat <br/>'.
	'[  ] Sesuai catatan <br/>'.
	'[  ] Untuk perhatian <br/>'.
	'[  ] Untuk diketahui <br/>'.
	'[  ] Edarkan <br/>'.
	'[  ] Bicarakan dengan saya <br/>'.
	'[  ] Bicarakan bersama dan laporkan hasilnya <br/>'.
	'[  ] Dijadwalkan <br/>'.
	'[  ] Disimpan <br/>'.
	'[  ] Disiapkan <br/>'.
	'[  ] Ingatkan <br/>'.
	'[  ] Harap dihadiri/ diwakili <br/>'.
	'<br/>'.
	'<br/>'.
	'<br/>'.
	'<br/>'.
	'</td>'.
	'</tr>'.
	'</table>'.	
	
	'<table width="100%" style="solid; border-left-style: solid; border-right-style: solid;" cellspacing="0" cellpadding="7">'.
	'<tr><td width="50%" align=left style="border-style:solid";><font size="10pt">Tgl dikirim untuk proses: <br/>Diterima Oleh:<br/><br/><br/></font></td>'.
	'<td width="50%" align=left style="border-style:solid";><font size="10pt">Diajukan kembali tanggal: <br/>Diterima Oleh:<br/><br/><br/></font></td></tr>'.
	'<tr><td width="50%" align=left style="border-style:solid";><font size="10pt">Tgl kembali untuk proses: <br/>Diterima Oleh:<br/><br/><br/></font></td>'.
	'<td width="50%" align=left style="border-style:solid";><font size="10pt">Tanggal selesai dari KK:<br/><br/><br/></font></td></tr>'.
	'</table>'.	
	'<font size="8pt" color="grey">NB: Format Disposisi sesuai dengan PMK-181/PMK.01/2014 tentang Tata Naskah Dinas di Kementerian Keuangan</font>'.
	'</body></html>';
	
$dompdf = new DOMPDF();
$html1 = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
$dompdf->load_html($html1);
$dompdf->set_paper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('Disposisi.pdf',array('Attachment'=>0));
}	
?>

