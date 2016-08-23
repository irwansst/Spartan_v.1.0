<?php
include "config/koneksi.php";
?>

<html>
 <head>
<script src="js/jquery-1.7.2.js" type="text/javascript"></script>
<script src="plugin/charts/highcharts.js" type="text/javascript"></script>
<script type="text/javascript">

$(function() {
	var chart;
	$(document).ready(function(){
   

  //grafik surat masuk    
	   var gfx_smasuk = new Highcharts.Chart({
	   chart: {
            renderTo: 'gfx_smasuk',
            type: 'column',
			height: 340
         },   
         title: {
            text: 'SURAT MASUK '
         },
         xAxis: {
            categories: ['Bulan']
         },
         yAxis: {
            title: {
               text: 'Jumlah'
            }
         },
              series:             
            [
            <?php 
           $sql   = "SELECT date_format(tMasuk,'%M') as bulan  FROM smasuk group by month(tMasuk)";
            $query = mysql_query( $sql )  or die(mysql_error());
            while( $ret = mysql_fetch_array( $query ) ){
             $bulan=$ret['bulan'];                     
                 $sql_jumlah   = "SELECT count(nAgenda) as jumlah FROM smasuk where date_format(tMasuk,'%M') = '$bulan' ";        
                 $query_jumlah = mysql_query( $sql_jumlah ) or die(mysql_error());
                 while( $data = mysql_fetch_array( $query_jumlah ) ){
                    $jumlah = $data['jumlah'];                 
                  }             
                  ?>
                  {
                      name: '<?php echo $bulan; ?>',
                      data: [<?php echo $jumlah; ?>]
                  },
                  <?php } ?>
            ]
      }); 

//grafik surat keluar
	var gfx_skeluar = new Highcharts.Chart({
         chart: {
            renderTo: 'gfx_skeluar',
            type: 'column',
			height: 340
         },   
         title: {
            text: 'SURAT KELUAR '
         },
         xAxis: {
            categories: ['Bulan']
         },
         yAxis: {
            title: {
               text: 'Jumlah'
            }
         },
              series:             
            [
            <?php 
           $sql   = "SELECT date_format(tKeluar,'%M') as bulan  FROM skeluar group by month(tKeluar)";
            $query = mysql_query( $sql )  or die(mysql_error());
            while( $ret = mysql_fetch_array( $query ) ){
             $bulan=$ret['bulan'];                     
                 $sql_jumlah   = "SELECT count(nAgenda) as jumlah FROM skeluar where date_format(tKeluar,'%M') = '$bulan' ";        
                 $query_jumlah = mysql_query( $sql_jumlah ) or die(mysql_error());
                 while( $data = mysql_fetch_array( $query_jumlah ) ){
                    $jumlah = $data['jumlah'];                 
                  }             
                  ?>
                  {
                      name: '<?php echo $bulan; ?>',
                      data: [<?php echo $jumlah; ?>]
                  },
                  <?php } ?>
            ]
      });
	  
//grafik surat keluar
	var gfx_skeluar = new Highcharts.Chart({
         chart: {
            renderTo: 'gfx_skeluar',
            type: 'column',
			height: 340
         },   
         title: {
            text: 'SURAT KELUAR '
         },
         xAxis: {
            categories: ['Bulan']
         },
         yAxis: {
            title: {
               text: 'Jumlah'
            }
         },
              series:             
            [
            <?php 
           $sql   = "SELECT date_format(tKeluar,'%M') as bulan  FROM skeluar group by month(tKeluar)";
            $query = mysql_query( $sql )  or die(mysql_error());
            while( $ret = mysql_fetch_array( $query ) ){
             $bulan=$ret['bulan'];                     
                 $sql_jumlah   = "SELECT count(nAgenda) as jumlah FROM skeluar where date_format(tKeluar,'%M') = '$bulan' ";        
                 $query_jumlah = mysql_query( $sql_jumlah ) or die(mysql_error());
                 while( $data = mysql_fetch_array( $query_jumlah ) ){
                    $jumlah = $data['jumlah'];                 
                  }             
                  ?>
                  {
                      name: '<?php echo $bulan; ?>',
                      data: [<?php echo $jumlah; ?>]
                  },
                  <?php } ?>
            ]
      });

//grafik surat keluar per jenis
	var gfx_sjkeluar = new Highcharts.Chart({
         chart: {
            renderTo: 'gfx_sjkeluar',
            type: 'column',
			height: 340
         },   
         title: {
            text: 'SURAT KELUAR PER JENIS '
         },
         xAxis: {
            categories: ['Jenis']
         },
         yAxis: {
            title: {
               text: 'Jumlah'
            }
         },
              series:             
            [
            <?php 
           $sql   = "SELECT jSurat  FROM skeluar group by jSurat ";
            $query = mysql_query( $sql )  or die(mysql_error());
            while( $ret = mysql_fetch_array( $query ) ){
             $jenis=$ret['jSurat'];                     
                 $sql_jumlah   = "SELECT count(nAgenda) as jumlah FROM skeluar where jSurat = '$jenis' ";        
                 $query_jumlah = mysql_query( $sql_jumlah ) or die(mysql_error());
                 while( $data = mysql_fetch_array( $query_jumlah ) ){
                    $jumlah = $data['jumlah'];                 
                  }             
                  ?>
                  {
                      name: '<?php echo $jenis; ?>',
                      data: [<?php echo $jumlah; ?>]
                  },
                  <?php } ?>
            ]
      });

//batas penggunaan bracket, hati2 kehapus
  });
  });

</script>

</head>
<body>
<div id="page">
<div id="content">
<table class=table width=100%>
		<tr height=30px>
		<th th colspan=3 align center>DASHBOARD MONITORING</th>
		</tr>
		<tr height="50px">
		<td style="height:50px; width:33%;"><div id="gfx_smasuk"></div></td>
		<td style="height:50px; width:33%;"><div id="gfx_skeluar"></div></td>
		<td style="height:50px; width:33%;"><div id="gfx_sjkeluar"></div></td>
		</tr>
		</table>
</div></div>		
 </body>
</html>