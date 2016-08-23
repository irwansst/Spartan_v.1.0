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
    echo "<h1>LAPORAN</h1>";
    echo "
		
	<table width=100%>
	<tr>
		<td valign='top' width='190px'>
		<h1>UMUM</h1>
			<ul id='vertical' >
			   <li><a href='modul/mod_laporan/masuk.php' target=q>Surat Masuk</a></li>
			   <li><a href='modul/mod_laporan/keluar.php' target=q>Surat Keluar</a></li>
			</ul>
		</td>
		
		<td valign=top>
		<iframe width=100% height=570px name=q scroller=no frameborder=no src='modul/mod_laporan/masuk.php'></iframe>
		</td>
	</tr>
	</table>
			 
				
	";
    break;
  
  
}
}
?>
