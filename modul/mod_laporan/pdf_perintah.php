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
include "../../config/confpdf.php";

$mulai		= $_POST[tgl1];
$selesai	= $_POST[tgl2];

include "../../plugin/1_perintah_2.php";
 
 
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
 
 
 $sql="$sqlQ WHERE tsurat BETWEEN '$mulai' AND '$selesai';";
 $hsl = mysql_query($sql, $id_mysql);
 $jml = mysql_num_rows($sql, $id_mysql);
 
if ($hsl > 0){
if(!$hsl)
		die("Gagal3");
		
		$pdf=new PDF_MC_Table();
		$pdf->AddPage('L','Legal');
		$pdf->SetMargins(10, 10, 25);
		$pdf->SetAutoPageBreak(true, 13);
		$pdf->SetFont('Times', '',12);
		$no = 1;
		
		while ($r=mysql_fetch_array($hsl)){
		$nomor 		= $r[1].'/'.$r[2].'/'.$r[3].$r[4];
		$pelaksana  = 'Nama'."\t".': '.$r[nama]
					  ."\n".'Pangkat : '.$r[pangkat]
					  ."\n".'NIP '."\t\t".': '.$r[nip]
					  ."\n".'NRP '."\t".': '.$r[nrp]
					  ."\n".'Jab '."\t\t\t".': '.$r[jab]
					  ;
		$isi  = 'Isi Perintah : '."\n".$r[isi]."\n\n".'Keterangan :'."\n".$r[ket];
		    $pdf->SetWidths(array(10,60,29,80,115,40));
			$nsurat	= $nomor; 
			$tgl 	= $r[5];
			$pelak 	= $pelaksana;
			$isi 	= $isi;
			$stamp 	= $r[stamp];
			$pdf->Row(array($no,$nsurat,$tgl,$pelak,$isi,$stamp));
			$no++;
		}
		
		
		mysql_close($id_mysql);
	$pdf->Output('Ansanwan-Laporan_'.date("d-m-Y H;m;s").'.pdf', 'I');
}
else{
include "../../plugin/var.php";

  $m=$_POST[tgl_mulai].'-'.$_POST[bln_mulai].'-'.$_POST[thn_mulai];
  $s=$_POST[tgl_selesai].'-'.$_POST[bln_selesai].'-'.$_POST[thn_selesai];
  echo "Tidak ada transaksi/order pada Tanggal $m s/d $s
  <br><br><input type=button value=Kembali class=button onclick=self.history.back()>";
}
}
?>
