<?php
//connect to your database
include "../../config/koneksi.php";
//harus selalu gunakan variabel term saat memakai autocomplete,
//jika variable term tidak bisa, gunakan variabel q
$term = trim(strip_tags($_GET['term']));
 
$qstring = "SELECT kantor FROM rKantor WHERE kantor LIKE '".$term."%'";
//query database untuk mengecek tabel Country 
$result = mysql_query($qstring);
 
while ($row = mysql_fetch_array($result))
{
    $row['value']=htmlentities(stripslashes($row['kantor']));
    //$row['id']=(int)$row['id'];
//buat array yang nantinya akan di konversi ke json
    $row_set[] = $row;
}
//data hasil query yang dikirim kembali dalam format json
echo json_encode($row_set);
?>