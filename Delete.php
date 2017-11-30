<?php

include"connection.php";

$id_barang	= $_GET ['id_barang'];

if(mysql_query ("DELETE FROM tbl_barang  WHERE id_barang = '$id_barang'")){
		mysql_query ("DELETE FROM tbl_stok  WHERE id_barang = '$id_barang'");
echo"benar";
}else{
echo"salah";
echo mysql_error();
} 


include ("tampilan_data_barang.php");


