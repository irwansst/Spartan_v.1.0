<?php
session_start();
error_reporting(0);
include "../../timeout.php";

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
if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
 header('location:logout.php');
}

include "../../config/koneksi.php";
include "../../config/library.php";
include "../../config/fungsi_indotgl.php";
include "../../config/fungsi_combobox.php";
include "../../config/class_paging.php";
?>

<head>
<link href="../../css/style.css" rel="stylesheet" type="text/css" />

<!-- data table-->

		<style type="text/css" title="currentStyle">
			@import "../../css/datatable/demo_page.css";
			@import "../../css/datatable/demo_table_jui.css";
			@import "../../themes/smoothness/jquery-ui-1.8.4.custom.css";
		</style>
		
		
		<script type="text/javascript" language="javascript" src="../../js/jquery-1.7.2.js"></script>
		<script type="text/javascript" language="javascript" src="../../js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				oTable = $('#example').dataTable({
					"bJQueryUI": true,
					"sPaginationType": "full_numbers"
				});
			} );
		</script>
<!-- data table-->
<!-- tiny mce-->
		<script type="text/javascript" language="javascript" src="../../plugin/tiny_mce/tiny_mce.js"></script>
		<script type="text/javascript">
		tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		}); 
</script>
		
<!-- tiny mce-->
<!-- data fade-->
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
			  
           });  
			} );
		</script>
<!-- data fade-->
<!-- picker-->
<!-- piker-->
	<script src="../../ui/jquery.ui.widget.js"></script>
	<script src="../../ui/jquery.ui.core.js"></script>
	<script src="../../ui/jquery.ui.tabs.js"></script>
	<script src="../../ui/jquery.ui.accordion.js"></script>
	<script src="../../ui/jquery.ui.datepicker.js"></script>
	<script src="../../ui/jquery.effects.core.js"></script>
	<script src="../../ui/jquery.effects.blind.js"></script>
	<script src="../../ui/jquery.effects.bounce.js"></script>
	<script src="../../ui/jquery.effects.clip.js"></script>
	<script src="../../ui/jquery.effects.drop.js"></script>
	<script src="../../ui/jquery.effects.fold.js"></script>
	<script src="../../ui/jquery.effects.slide.js"></script>
	
	
	<script type="text/javascript"> 
      $(document).ready(function(){
        $("#datepicker").datepicker({
		  changeMonth : true,
		  numberOfMonths: 1,
		  changeYear : true,
          showAnim    : "slide",
          showOptions : { direction: "down" }
        });
		$("#datepicker1").datepicker({
		  changeMonth : true,
		  numberOfMonths: 1,
		  changeYear : true,
          showAnim    : "slide",
          showOptions : { direction: "down" }
        });
		$("#datepicker2").datepicker({
		  changeMonth : true,
		  numberOfMonths: 1,
		  changeYear : true,
          showAnim    : "slide",
          showOptions : { direction: "down" }
        });
      });
    </script>
	
	
<!-- piker-->
<!-- picker-->

</head>
