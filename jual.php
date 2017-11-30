			
			<div class="email-item email-item-selected pure-g" id="tempat_form_jual">
			<div class="pure-u-3-4">

					<?php
					include "connection.php";
					$id_barang_for_sale = $_GET['id_barang'];

					$query = ("SELECT * FROM tbl_barang WHERE id_barang='$id_barang_for_sale'");

					$data_jual	= mysql_fetch_array(mysql_query($query));

					$nama_barang_jual = $data_jual['nama_barang'];


					echo "<h2>Penjualan Barang <font color=red>$nama_barang_jual</font></h1>";
					?>


					<form action="proses_jual.php?id_barang=<?php echo $id_barang_for_sale;?>" method="post" id="form_jual">

					Jumlah untuk dijual : <input type="text" name="jumlah_jual" size="5" required id="input_text_jual">

					<input type="submit" name="submit" value="Sold" class="primary-button pure-button">
					</form>

			</div>
			</div>
			
<div id="wait">	</div>

		   
<script>
$("#form_jual").submit(function(){
$("#wait").html("<img src='style/loading.gif'>");
	
	$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			success: function(e) {
				//alert(e);
					$("#wait").hide();
					
					go_to_isi_content();
					
					
					$.get("tampilan_penjualan.php",function(e){
					
						$("#isi_content").html(e);
					
					});
					
			}
		});
		
		return false;
});
</script>