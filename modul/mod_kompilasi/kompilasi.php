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
    echo "<h1>Buku KOMPILASI</h1>";
	?>
	<div class="wrap">
	  <nav>
       <ul id="top_nav" class="clearfix">
         <li><a href="modul/mod_kompilasi/register.php" target="q">Register SK</a></li>
         <li><a href="modul/mod_kompilasi/hukuman.php" target="q">Hukuman Disiplin</a></li>
         <li><a href="modul/mod_kompilasi/pengaduan.php" target="q">Laporan Pengaduan</a></li>
         <li><a href="modul/mod_kompilasi/pemeriksa.php" target="q">Pemeriks Pengaduan</a></li>
        </ul>
      </nav>
	</div>
	<iframe width=100% height=750px name=q frameborder=no src='modul/mod_kompilasi/register.php'></iframe>
	<?php
    	
    break;
}
}
?>
