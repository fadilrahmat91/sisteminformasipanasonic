<?php

include"connection.php";

$nama_barang	= trim($_POST['nama_barang']);
$harga_barang	= trim($_POST['harga_barang']);
$stok_barang	= trim($_POST['stok']);
$id_barang		= trim($_POST['id_barang']);

	$query_update = ("UPDATE tbl_barang SET 
								nama_barang	='$nama_barang', 
								harga_barang='$harga_barang' 
						WHERE 
								id_barang	='$id_barang'"); 
	
	//echo $query_update;
	mysql_query($query_update)or die (mysql_error());
	
	
	$query_update_stok=("UPDATE tbl_stok SET stok_barang= '$stok_barang' WHERE id_barang ='$id_barang'");

	mysql_query($query_update_stok)or die (mysql_error());
	

echo 
'<table class="data">
<h2>Berhasil ditambahkan</h2>
';

    foreach ($_POST as $key => $value) {
        echo "<tr class=data>";
        echo "<td class=data>";
        echo strtoupper($key);
        echo "</td>";
        echo "<td class=data>";
        echo $value;
        echo "</td>";
        echo "</tr>";
    }

echo
'</table>';

	
	



?>