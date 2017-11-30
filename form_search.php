
			<div class="email-item email-item-unread pure-g" id="kontak">

			<div class="pure-u-3-4">
								
				<form action="tampilan_data_barang.php" method="get" id="form_cari">
				<input type="text" name="carinya" placeholder="Cari nama barang">
				<input type="submit" name="submit" value="Cari" class="primary-button pure-button">
				</form>
			</div>
			
			</div>
		   
		   <div id="loadingnya"></div>
		   
		   
		   
<script>
$("#form_cari").submit(function(){
$("#loadingnya").html("<img src='style/loading.gif'>");
	
	$.ajax({
			type: 'GET',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			success: function(data) {
				
					$("#loadingnya").hide();
					$("#isi_content").html(data);
					go_to_isi_content();
				
			}
		});
		
		return false;
});
</script>