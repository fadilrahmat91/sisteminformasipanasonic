
$(document).ready(function(){
	$("#homenya").click(function(){
		location.reload();
	});

	
	$("#data_barang").click(function(){
		
		$.get("tampilan_data_barang.php",function(e){
			
			$("#isi_content").html(e);
		
		});
		
		$.get("form_search.php",function(e){
			
			$("#list").html(e);
		
		});
		
		
		
		go_to_isi_content();
		
	});
	
	$("#tambah_barang").click(function(){
		
		
		$.get("form_tambah_barang.php",function(e){
			
			$("#isi_content").html(e);
			go_to_isi_content();
		
		});
		
	});
	
	
$("#penjualan").click(function(){
	$("#wait").html("<img src='style/loading.gif'>");
		
		$.ajax({
				type: 'POST',
				url: $(this).attr('action'),
				data: $(this).serialize(),
				success: function(data) {
					
						$("#wait").hide();
						
						go_to_isi_content();
						
						$.get("tampilan_penjualan.php",function(e){
						
							$("#isi_content").html(e);
						
						});
					
				}
			});
			
			return false;
});



	

	
});

function go_to_isi_content(){
	
	$('html,body').animate({scrollTop: $("#isi_content").offset().top},'slow');

}

function go_to_footer(){
	
	$('html,body').animate({scrollTop: $("#footer").offset().top},'slow');

}

function go_to(alamat){
	
	$('html,body').animate({scrollTop: $(alamat).offset().top},'slow');
	

}

function warning() {
	return confirm('Apakah anda yakin menghapus data ini?');
}

