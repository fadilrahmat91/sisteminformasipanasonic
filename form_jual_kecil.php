
<?php

if(isset($_GET['carinya'])){
?>


<form action="proses_jual.php?id_barang=<?php echo trim($_GET['id_barang'];?>" method="post">

Jumlah untuk <span style="color:red; font-size:30px;" ><?php echo $nama_barang;?></span> dijual, stok <?php echo $stok;?> : <input type="text" name="jumlah_jual" size="5">

<input type="submit" name="submit" value="Sold">
</form>

</body>
</html>



<?php
}
?>