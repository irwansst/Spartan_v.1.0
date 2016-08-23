<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "../../plugin/var.php";
   
    echo "<h1>Laporan SURAT MASUK</h1>
			<div class='line'></div>
			<div class='box'>";
	echo "
		  <b>LAPORAN SURAT MASUK HARI INI</b><br>
		  <a href=cetak_smasuk_sekarang.php target=_blank class=button>Proses laporan</a> 
		  
		  <form method=POST action='cetak_smasuk.php' target=_blank>
          <br><br><b>LAPORAN SURAT MASUK PER PERIODE</b><br>
		  <table>
		  <tr>
		  <td><label><span>DARI TANGGAL</span>
		  <input type='text' name='tgl1' size='10' id=datepicker style='text-align:center;'></label></td>
		  <td><label><span>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;S.D. TANGGAL</span>
		  <input type='text' name='tgl2' size='10' id=datepicker1 style='text-align:center;'></label></td>
		  </tr>
		  </table>
		  <br>
		  <input type=submit class=button value='Proses Laporan'></form></div>";
}
?>

