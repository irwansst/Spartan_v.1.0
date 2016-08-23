<?php
session_start();
error_reporting(0);
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  header('location:../../logout.php');
}
else{

include "../../plugin/var.php";

$aksi="aksi_users.php";
switch($_GET[act]){
  // Tampil User
  default:
    if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM users ORDER BY username");
     
    }
    else{
      $tampil=mysql_query("SELECT * FROM users 
                           WHERE username='$_SESSION[namauser]'");
      
    }
    
	
	echo "<h1>Daftar Pengguna System</h1>";
	echo "
	<div class='demo_jui'>
	<table cellpadding='0' cellspacing='0' border='0' class='display' id='example'>
		<thead>
			<tr>
				<th>No</th>
				<th>Username</th>
				<th>Nama Lengkap</th>
				<th>Email</th>
				<th>No. Telp</th>
				<th>Blokir</th>
				<th>Act</th>
			</tr>
		</thead>
		<tbody>";
		
		$no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr>
			 <td  align=center>$no</td>
             <td>$r[username]</td>
             <td>$r[nama_lengkap]</td>
		     <td><a href=mailto:$r[email]>$r[email]</a></td>
		     <td>$r[no_telp]</td>
		     <td align=center>$r[blokir]</td>
             <td><a href=?op=user&act=edituser&id=$r[id_session]>Edit</a></td>
			 </tr>";
      $no++;
    }
		
		
		echo"</tbody></table></div><div class='spacer'></div>";
	
	 // echo "<br>
          // <input type=button class='button' value='Tambah User' onclick=\"window.location.href='?op=user&act=tambahuser';\">";
    break;
  
  // case "tambahuser":
    // if ($_SESSION[leveluser]=='admin'){
  
// echo "<h1>Tambah User</h1>
			// <div class='line'></div>
			// <div class='box'>";
// echo "
          // <form method=POST action='$aksi?op=user&act=input'>
		 // <label><span>Username</span><input type='text' name='username' size='70'></label>
		  // <label><span>Password</span><input type='text' name='password' size='70'></label>
		  // <label><span>Nama Lengkap</span><input type='text' name='nama_lengkap' size='70'></label>
		  // <label><span>E-mail</span><input type='text' name='email' size='70'></label>
		  // <label><span>No.Telp/HP</span><input type='text' name='no_telp' size='70'></label>
		// <input type=submit class=button value=Simpan>
		// <input type=button value=Batal class=button onclick=self.history.back()>
          // </form></div>";

    // }
    // else{
      // echo "Anda tidak berhak mengakses halaman ini.";
    // }
     // break;
    
  case "edituser":
    $edit=mysql_query("SELECT * FROM users WHERE id_session='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    
	
echo "<h1>ubah user</h1>
			<div class='line'></div>
			<div class='box'>";
          echo "
          <form method=POST action=$aksi?op=user&act=update>
          <input type=hidden name=id value='$r[id_session]'>
          
		  <label><span>USERNAME</span><input type=text name='username' value='$r[username]' disabled></label>
		  <label><span>PASSWORD</span><input type=text name='password'></label>
		  <label><span>NAMA LENGKAP</span><input type=text name='nama_lengkap' size=30  value='$r[nama_lengkap]'></label>
		  <label><span>E-MAIL</span><input type=text name='email' size=30 value='$r[email]'></label>
		  <label><span>NO TELP/HP</span><input type=text name='no_telp' size=30 value='$r[no_telp]'></label>
		  <label><span></span>*) Apabila password tidak diubah, dikosongkan saja.</label>
		  <label><span></span>**) Username tidak bisa diubah.</label>
		  
		  <input type=submit class=button value=Update>
		  <input type=button class=button value=Batal onclick=self.history.back()></td></tr>
          </form></div>";     
    
    break;  
}
}
?>
