<?php

include "connection.php";

$id_barang			=	$_GET['id_barang'];
$jumlah_jual		=	$_POST['jumlah_jual'];
$tanggal_terjual	= date('Y-m-d');


if(mysql_query("INSERT INTO tbl_penjualan SET 
								id_barang		='$id_barang', 
								tanggal_terjual	='$tanggal_terjual',
								jumlah_terjual	='$jumlah_jual' 
							") or die(mysql_error())){

	 $stok_barangterakhir=mysql_fetch_array(mysql_query("SELECT stok_barang FROM tbl_stok WHERE id_barang='$id_barang'"));
	$stok_barang= $stok_barangterakhir[stok_barang]-$jumlah_jual;	
	//mengupdate stok barang ke tbl_stok
	mysql_query("UPDATE tbl_stok SET stok_barang='$stok_barang' WHERE id_barang='$id_barang'");							
		


}; 