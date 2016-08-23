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
include "../../plugin/2_keluar.php";


 $y = (date("Y-m-d"));
 $sql="SELECT * FROM skeluar WHERE tglSurat='$y';";
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
		
		if($r[1]=='B'){$x = "";}else{$x = "R-";}
		$nomor = $x.$r[2].'/'.$r[3].'/'.$r[4].$r[5];
		
		$nos = $sif.$r[2];
		    $pdf->SetWidths(array(10,60,25,95,60,50,40));
			$urut = $no; $nsu = $nomor;$tgl = $r[6];$hal = $r[8];$kpd = $r[7];$ket = $r[9]; $sta = $r[11];
			$pdf->Row(array($urut,$nsu,$tgl,$hal,$kpd,$ket,$sta));
			$no++;
		}
		
		mysql_close($id_mysql);
	$pdf->Output('Ansanwan-Laporan_'.date("d-m-Y H;m;s").'.pdf', 'I');
}
else{
  
  $skrg=date('d-M-Y');
  include "../../plugin/var.php";
  
  echo "Tidak ada pembukuan pada Tanggal <b>$skrg</b><br /><br />
       <input type=button value=Kembali class=button onclick=self.history.back()>";
}
}
?>
