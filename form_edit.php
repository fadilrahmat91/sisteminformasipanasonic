<?php
include"connection.php";

$id_barang  = $_GET ['id_barang'];
$barang  = mysql_fetch_array(mysql_query ("SELECT * FROM tbl_barang WHERE id_barang ='$id_barang'"));
$stok    = mysql_fetch_array(mysql_query ("SELECT * FROM tbl_stok WHERE id_barang ='$id_barang'"));
			

?>
<form action="UPDATE.php" method="post">
	
	<input type="hidden" name="id_barang" value="<?php echo $id_barang;?>">
	
	<tr class="data">
			  <td class="data"><input type="text" name="nama_barang" value="<?php echo $barang['nama_barang'];?>">  </td>
			  <td class="data"><input type="text" name="stok_barang" value="<?php echo $stok['stok_barang'];?>">  </td>
			  <td class="data"><input type="text" name="harga_barang" value="<?php echo $barang['harga_barang'];?>">  </td>
			  
			  <td class="data"><input type="text" name="tgl_barang_masuk" value="<?php echo $barang['tgl_barang_masuk'];?>">  </td>
			<td class="data"></td>
	</tr>
	

</form>