<?php
session_start();
// error_reporting(0);
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  header('location:../../logout.php');
}
else{

include "../../plugin/var.php";

switch($_GET[act]){
  // Tampil User
	
  default:
    echo "<h1>Optimize/Repair Table Database</h1>
			<div class='line'></div>
			<div class='box'>";
    echo "
          <form class='dm_form' method=POST action=''>";
	echo "
	<div class='clear'></div>";
	?> 
	<label><span>Pilih Operasi</span><select name="repair">
								  <option value=""> == Pilih Operasi Database ==    </option>
								  <option value="1">Optimize Table Database</option>
								  <option value="2">Repair Table Database</option>
							</select></label>
	<label><span></span><font color=red>Pilih operasi diatas untuk proses database</font></label>

						
	
	<?php
	ECHO "</div>";	  ?>
	<div id=clear></div>
	<br><input class="button" id="submit" type="submit" onClick="" value="Proses !!">
    <?php echo "</form>";
	
	
	
	if($_POST['repair']==1){
		$query = "SHOW TABLES";
		$hasil = mysql_query($query);
		echo "<br><br><br>";
		while ($data = mysql_fetch_row($hasil))
		{
			$query2 = "optimize table `".$data[0]."`";
			$hasil2 = mysql_query($query2);
			$data2  = mysql_fetch_array($hasil2);
			echo $query2."".$data2[3].", ";
		}
		include "pro.php";
			
			
	}
	elseif($_POST['repair']==2){
	
		$query = "SHOW TABLES";
		$hasil = mysql_query($query);
		echo "<br><br><br>";
		while ($data = mysql_fetch_row($hasil))
		{
			$query2 = "repair table `".$data[0]."`";
			$hasil2 = mysql_query($query2);
			$data2  = mysql_fetch_array($hasil2);
			echo $query2."".$data2[3].", ";
		}
		include "pro.php";
			
	
	}
	else{}


	
    break;  
}
}
?>
