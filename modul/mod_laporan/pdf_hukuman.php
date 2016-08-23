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

include "../../plugin/hukuman.php";
 $sql1 ="SELECT hukuman.id_hukuman, 
					hukuman.peg, 
					hukuman.pasal, 
					hukuman.pengaduan, 
					hukuman.hukuman, 
					hukuman.kep, 
					hukuman.tgl, 
					hukuman.ket, 
					hukuman.periode, 
					hukuman.stamp,
						pegawai.nama,
						pegawai.pangkat,
						pegawai.nip,
						pegawai.nrp,
						pegawai.jab
						FROM  hukuman 
							INNER JOIN  pegawai ON ( hukuman.peg = pegawai.id_pegawai)";
 $sql=" $sql1 WHERE tgl BETWEEN '$mulai' AND '$selesai';";
 
 $hsl = mysql_query($sql, $id_mysql);
 $jml = mysql_num_rows($sql, $id_mysql);
 
if ($hsl > 0){
if(!$hsl)
		die("Gagal3");
		
		$pdf=new PDF_MC_Table();
		$pdf->AddPage('L','Legal');
		$pdf->SetMargins(10, 10, 25);
		$pdf->SetAutoPageBreak(true, 13);
		$pdf->SetFont('Times', '',11);

		$pdf->SetWidths(array(10,40,70,40,40,35,35,35,30));
		$aa = 'NO'; 
		$bb = 'NAMA';
		$cc = 'PANGKAT, NIP/NRP, JABATAN';
		$dd = 'MELANGGAR PASAL';
		$ee = 'URAIAN SINGKAT PENGADUAN';
		$ff = 'HUKUMAN DISIPLIN YANG DIJATUHKAN';
		$gg = 'KEPUTUSAN';
		$hh	 = 'TANGGAL PELAKSANAAN HUKUMAN';
		$ii  = 'KETERANGAN';
		$pdf->Row(array($aa,$bb,$cc,$dd,$ee,$ff,$gg,$hh,$ii));
			
		$no = 1;
		while ($r=mysql_fetch_array($hsl)){
		   	$pdf->SetWidths(array(10,40,70,40,40,35,35,35,30));
			$n1 = $no; 
			$a1 = $r[10];
			$b1 = $r[11]."\n".$r[12]."\n".$r[13]."\n".$r[14];
			$c1 = $r[2];
			$d1 = $r[3];
			$e1 = $r[4]; 
			$f1 = $r[5];
			$g1 = tgl_indo($r[6]);
			$h1 = $r[7];
			$pdf->Row(array($n1,$a1,$b1,$c1,$d1,$e1,$f1,$g1,$h1));
			$no++;
		}
		$pdf->Ln();
		$pdf->Ln();

		$sql="SELECT * FROM kompilasi WHERE id_kompilasi='1';";
		$hasil = mysql_query($sql, $id_mysql);
		if(!$hasil)
		die("Gagal3");
		$r=mysql_fetch_array($hasil);
		
		$kota 	= $r[1];
		$tt 	= $kota.', '.tgl_indo(date("Y m d"));
		$an 	= $r[2];
		$nama 	= $r[3];
		$nip 	= $r[4];

		$pdf->SetX(230);
		$pdf->Cell(100,5,$tt,0,1, 'L');
		$pdf->SetX(230);
		$pdf->Cell(100,5,$an,0,1, 'L');
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$pdf->SetX(230);
		$pdf->Cell(100,5,$nama,0,1, 'L');
		$pdf->SetX(230);
		$pdf->Cell(100,5,$nip,0,1, 'L');
		
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
