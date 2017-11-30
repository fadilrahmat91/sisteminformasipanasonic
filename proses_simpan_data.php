<?php

include "connection.php";
//menampung kiriman dari form
$nama_barang		=	$_POST['nama_barang'];
$harga_barang		=	$_POST['harga_barang'];
$Stok				=	$_POST['Stok'];
$tgl_barang_masuk	= date('Y-m-d');


if(mysql_query("INSERT INTO tbl_barang SET 
								nama_barang		='$nama_barang', 
								harga_barang	='$harga_barang',
								tgl_barang_masuk='$tgl_barang_masuk' 
							") or die(mysql_error())){


		//mengambil id barang terakhir
		$q_id_barang = mysql_fetch_array(mysql_query("SELECT id_barang FROM tbl_barang ORDER BY  id_barang DESC LIMIT 1 "));
		$id_barang	 = $q_id_barang['id_barang'];

	
	//meyimpan stok barang ke tbl_stok
	mysql_query("INSERT INTO tbl_stok SET stok_barang='$Stok', id_barang='$id_barang'");							
								
								
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

}; 