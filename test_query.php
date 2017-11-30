<?php
$db = new mysqli('localhost','root','rahmat','penjualan_barang');

$query = $db->query("SELECT * FROM tbl_barang");

while($dapat = $query->fetch_object()){

$id   =  $dapat->id_barang;
$stok =  10;


	$q = $db->query("INSERT INTO tbl_stok SET id_barang='$id', stok_barang='$stok'");
echo $id;


echo "<br>";

}

?>