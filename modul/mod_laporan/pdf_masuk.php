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

include "../../plugin/1_masuk_2.php";
 
 $sql="SELECT * FROM smasuk WHERE tMasuk BETWEEN '$mulai' AND '$selesai';";
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
		
		$tG  = 'Tanggal Surat : '.$r[2]."\n\n".'Tgl Srt Masuk: '.$r[3];
		$dR  = 'Surat Dari : '."\n".$r[4]."\n\n".'Perihal : '."\n".$r[5];
		$diS = 'Disposisi Surat Kepada : '."\n".$r[6]."\n\n".'Keterangan Surat : '."\n".$r[7];
		    $pdf->SetWidths(array(10,60,29,100,100,40));
			$urut 	= $no; 
			$nS 	= $r[1]; 
			$tgl 	= $tG; 
			$dari 	= $dR;
			$dis 	= $diS;
			$stamp 	= $r[9];
			$pdf->Row(array($urut,$nS,$tgl,$dari,$dis,$stamp));
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
