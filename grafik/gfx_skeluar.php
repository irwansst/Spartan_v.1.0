<html>
 <head>
<script src="../js/jquery-1.7.2.js" type="text/javascript"></script>
<script src="../plugin/charts/highcharts.js" type="text/javascript"></script>
<script type="text/javascript">
 var chart2; // globally available
$(document).ready(function() {
      chart2 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column'
         },   
         title: {
            text: 'Grafik Surat Keluar '
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
   }); 
</script>
 </head>
 <body>
  <div id="container"></div>  
 </body>
</html>