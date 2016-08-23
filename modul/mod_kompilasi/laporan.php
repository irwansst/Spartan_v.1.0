<?php
session_start();
error_reporting(0);
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  header('location:../../logout.php');
}
else{

switch($_GET[act]){
  // Tampil User
  default:
    echo "<h1>Laporan</h1>";
    echo "
		
	<table width=100%>
	<tr>
		<td valign='top' width='190px'>
			<ul id='vertical' >
			   <li><a href='modul/mod_laporan/masuk.php' target=q>Surat Masuk</a></li>
			   <li><a href='modul/mod_laporan/keluar.php' target=q>Surat Keluar</a></li>
			   <li><a href='modul/mod_laporan/perintah.php' target=q>Surat Perintah</a></li>
			   <li><a href='modul/mod_laporan/keputusan.php' target=q>Surat Keputusan</a></li>
			   <li><a href='modul/mod_laporan/pengesahan.php' target=q>Lembar Pengesahan</a></li>
			</ul>
		</td>
		<td valign=top>
		<iframe width=100% height=570px name=p scroller=no frameborder=no src='a.php'></iframe>
		</td>
	</tr>
	</table>	
	";
    break;
}
}
?>
