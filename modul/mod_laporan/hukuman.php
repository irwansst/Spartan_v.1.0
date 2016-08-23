<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../plugin/var.php";
   
    echo "<h1>Laporan Hukuman Disiplin Pegawai</h1>
			<div class='line'></div>
			<div class='box'>";
	echo "
		  
		  <form method=POST action='pdf_hukuman.php' target=_blank>
		  <table><tr>
		  <td><label><span>DARI TANGGAL</span>
		  <input type='text' name='tgl1' size='10' id=datepicker style='text-align:center;'></label></td>
		  <td><label><span>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;S.D. TANGGAL</span>
		  <input type='text' name='tgl2' size='10' id=datepicker1 style='text-align:center;'></label></td>
		  </tr></table><br>
		  <input type=submit class=button value='Proses Laporan'></form></div>";
}
?>

