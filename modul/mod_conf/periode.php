<?php
session_start();
error_reporting(0);
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  header('location:../../logout.php');
}
else{

include "../../plugin/var.php";

$aksi="aksi_periode.php";
switch($_GET[act]){
  // Tampil User
	
  default:
    echo "<h1>Periode</h1>
			<div class='line'></div>
			<div class='box'>";
    echo "
          <form class='dm_form' method=POST action=$aksi?op=periode&act=update>";
	echo "
	<div class='clear'></div>";
	?> 
	<label><span>Ubah Periode</span><input type="text" name="periode" value="<?php  echo $_SESSION['periode'] ?>"></label>
	<label><span></span><font color=red>Ubah Tahun Periode diatas sesuai dengan Tahun Periode yang Anda inginkan</font></label>

						
	
	<?php
	ECHO "</div>";	  ?>
	<div id=clear></div>
	<br><input class="button" id="submit" type="submit" onClick="" value="Rubah Periode !!">
    <?php echo "</form>"; 
    break;  
}
}
?>
