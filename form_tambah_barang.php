<h1>Form Penambahan Barang</h1>
		
<div id="loading_form_tambah"></div>

		<form action="proses_simpan_data.php" method="post" id="form_tambah_barangnya">
						
						
						<table>
							<tr>
								<td>Nama </td>    <td><input type="text" name="nama_barang" required class="focus_form_tambah">  </td>
							</tr>
						
						<tr>
								<td>Stok</td>    <td><input type="text" name="Stok" class="stoknya">  </td>
							</tr>
						
						<tr>
								<td>harga</td>    <td><input type="text" name="harga_barang" class="harganya">   </td>
							</tr>
						
						<tr>
								<td> </td>    <td> <input type="submit" name="submit" class="primary-button pure-button" value="Simpan"></td>
							</tr>
						
						</table>

				</form>
<script>
	
	$("#form_tambah_barangnya").submit(function(){
	
		$("#loading_form_tambah").html("<img src='style/loading.gif'>");
	
	$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			success: function(data) {
				
					$("#loading_form_tambah").css("background","#CEF6D8");
					$("#loading_form_tambah").html(data);
					$(".focus_form_tambah").val('');
					$(".stoknya").val('');
					$(".harganya").val('');
					
				
			}
		});
		
		return false;
		
	});
	
</script>