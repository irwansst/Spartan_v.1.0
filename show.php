<?php
session_start();
error_reporting(0);
include "timeout.php";

$timezone = "Asia/Jakarta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);

if($_SESSION[login]==1){
	if(!cek_login()){
		$_SESSION[login] = 0;
	}
}
if($_SESSION[login]==0){
  header('location:logout.php');
}
else{
if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "<link href='css/style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else{

?>
<html>
<head>
<title></title>
<link href="css/style.css" rel="stylesheet" type="text/css" />



<!-- data table-->

		<style type="text/css" title="currentStyle">
			
			@import "css/datatable/demo_table_jui.css";
			@import "themes/smoothness/jquery-ui-1.8.4.custom.css";
			body {
				background: #e1c192 url(images/bg.jpg);
			}
		</style>
		<script type="text/javascript" language="javascript" src="js/jquery-1.7.2.js"></script>
		<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				oTable = $('#example').dataTable({
					"bJQueryUI": true,
					"sPaginationType": "full_numbers"
				});
			} );
		</script>
<!-- data table-->
<!-- complete-->

<script type="text/javascript">
 $(document).ready(function() {
 $("#page").hide();
    setInterval(function() {
		$('#page').fadeIn(100);
		$('#divjam').load('plugin/jam.php?acak='+ Math.random());
    }, 500);
  });
</script>
<?php include "plugin/me.php"; ?>
<!-- piker-->
	<script src="ui/jquery.ui.widget.js"></script>
	<script src="ui/jquery.ui.core.js"></script>
	<script src="ui/jquery.ui.tabs.js"></script>
	<script src="ui/jquery.ui.accordion.js"></script>
	<script src="ui/jquery.ui.autocomplete.js"></script>
	<script src="ui/jquery.ui.datepicker.js"></script>
	<script src="ui/jquery.effects.core.js"></script>
	<script src="ui/jquery.effects.blind.js"></script>
	<script src="ui/jquery.effects.bounce.js"></script>
	<script src="ui/jquery.effects.clip.js"></script>
	<script src="ui/jquery.effects.drop.js"></script>
	<script src="ui/jquery.effects.fold.js"></script>
	<script src="ui/jquery.effects.slide.js"></script>
	
	
	<script type="text/javascript"> 
      $(document).ready(function(){
        $("#datepicker").datepicker({
          changeMonth : false,
		  changeYear : false,
		  numberOfMonths: 2,
          showAnim    : "slide",
          showOptions : { direction: "down" }
        });
      });
    </script>
	
	
<!-- piker-->
<!-- according-->
	<!--link rel="stylesheet" href="../../themes/base/jquery.ui.all.css">
	<link rel="stylesheet" href="../demos.css"-->
	<script>
	$(function() {
		$( "#accordion" ).accordion({
			autoHeight: false,
			navigation: true
		});
	});
	</script>
<!-- according-->

<!-- membuat autocomplete kantor -->

<script type="text/javascript" language="javascript" src="js/jquery.autocomplete.js"></script>	
		<link href="css/jquery.autocomplete.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
		$().ready(function() {	
			$("#kantor").autocomplete("plugin/pKantor.php", {
				minLength:2,						
	  });
	});
</script>
<!-- autocomplete kantor finished -->

</head>
<body>
<div class="codrops-top">
               
				
            <a href="?op=conf" ><strong>PERIODE PELAKSANAAN : <?php  echo $_SESSION['periode'] ?></strong></a>
			<a id="divjam" href="#"></a>
              
                <span class="right">
                    <a class="modal1" href="javascript:void(0);"><strong>Developer</strong></a>
                    <a href="logout.php" ><strong><font color='red'>Logout/Keluar sistem</font></strong></a>
                </span>
            </div>
			
	<div id="header">
	<div class="logo">
	<img src='images/logo.png'>
	<?php include "config/koneksi.php"; $edit=mysql_query("SELECT * FROM nama WHERE id_nama='1'"); $r=mysql_fetch_array($edit);
	echo "<h2><font color=white>Sistem Penatausahaan Arsip dan Persuratan (SPARTAN)</font></h2><span>$r[nama]</span><p>$r[alamat]<br>Telp: $r[telp], E-mail: <a href=mailto:$r[email]>$r[email]</a>, Web: <a href='http://$r[web]' target=_blank>$r[web]</a></p>"; ?>
	</div>
	<div class="wrap">
	  <nav>
       <ul id="top_nav" class="clearfix">
         <li><a href="?op=home" >Home</a></li>
         <li><a href="?op=sMasuk" >Surat Masuk</a></li>
         <li><a href="?op=sKeluar" >Surat Keluar</a></li> 
         <li><a href="?op=laporan" >Laporan</a></li>
         <li><a href="?op=conf" >Konfigurasi</a></li>
        </ul>
      </nav>
	</div>
	

  <div id=page>
 
	 <div  class="content">
	 		<?php include "content.php"; ?>
  </div>
  </div>
  
		<div id="footer">
			
		</div>
</div>

</body>
</html>
<?php
}
}
?>
 