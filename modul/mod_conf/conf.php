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
    echo "<h1>Konfigurasi</h1>";
    echo "
		
	<table width=100%>
	<tr>
		<td valign='top' width='190px'>
			<ul id='vertical' >
			   <li><a href='modul/mod_conf/nama.php' target=q>Profil Instansi</a></li>
			   <li><a href='modul/mod_conf/periode.php' target=q>Periode System</a></li>
			   <li><a href='modul/mod_users/users.php' target=q>User/Pengguna</a></li>
			   <li><a href='modul/mod_pegawai/pegawai.php' target=q>Daftar Pegawai</a></li>
			   <li><a href='modul/mod_conf/repair.php' target=q>Optimize/Repair Table</a></li>
			</ul>
		</td>
		
		<td valign=top>
		<iframe width=100% height=700px name=q scroller=no frameborder=no src='modul/mod_conf/nama.php'></iframe>
		<div class='left1'>";
		
			if($_GET[option]==1){
			include "modul/mod_conf/periode.php";
			}
			elseif($_GET[option]==2){
			include "modul/mod_users/users.php";
			}
			elseif($_GET[option]==3){
			include "modul/mod_conf/repair.php";
			}
			else{}
			
			
		echo" </div>
		</td>
	</tr>
	</table>
			 
				
	";
    break;
  
  case "tambahuser":
    
     break;
    
  case "edituser":
    
    break;  
}
}
?>
