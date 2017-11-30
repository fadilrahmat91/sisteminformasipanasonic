<?php
include "connection.php";
?>
<h1>Data Barang</h1>
<?php 
if(isset($_GET['carinya'])){
	
	echo "Hasil Pencarian <b><i>".$_GET['carinya']."</i></b>";

};
?>
<div id="t4_jual"></div>
<table class="databaru"	id="tableku">
	<tr class="data">
		<th class="data"><b>No</b></th>
		<th class="data"><b>nama barang</b></th>
		<th class="data"><b>stok barang</b></th>
		<th class="data"><b>harga barang</b></th>
		<th class="data"><b>Tgl Masuk Barang</b></th>
		<th class="data"><b>pilihan</b></th>

	</tr>

<?php

if(isset($_GET['carinya'])){
	$term = trim($_GET['carinya']);
	$query = mysql_query("SELECT * FROM tbl_barang WHERE nama_barang LIKE '%$term%'");
	
	if(mysql_num_rows($query)<=0){
		echo "Maaf, <b><i>$term</i></b> tidak ditemukan<br>";
		echo "<a href=tampilan_data_barang.php>Lihat data barang</a>";
		exit;
	}
}else{

	$qnya = ("SELECT * FROM tbl_barang ORDER BY nama_barang ASC ");
	$query = mysql_query($qnya);
	
	
	
}

$jumlah_q = mysql_num_rows($query);

while($dapat = mysql_fetch_array($query)){
	
	$id_barang			= $dapat['id_barang'];
	$nama_barang		= $dapat['nama_barang'];
	$harga_barang		= $dapat['harga_barang'];
	$tgl_barang_masuk	= $dapat['tgl_barang_masuk'];
	
$no ++;	
		//mengambil stok barang dari tbl_stok sesuai dengan id_barang
		$q_stok = mysql_fetch_array(mysql_query("SELECT stok_barang FROM tbl_stok WHERE id_barang ='$id_barang'"));
		$stok=$q_stok['stok_barang'];
	
	if($no %2==0){
		  
		  $style = 'ganti';
	  }else{
		  
		  $style = 'data';
		  
	  }	
	
	echo'
	<tr class="'.$style.'">
		<td class="data">'.$no.'</td>
		<td class="data" id="nama_barang">'.$nama_barang.'</td>
		<td class="data" id="stok">'.$stok.'</td>
		<td class="data" id="harga_barang">'.$harga_barang.'</td>
		<td class="data" id="">'.$tgl_barang_masuk.'</td>
		
		<td class="data">
			<a href="'.$id_barang.'" id="jual"><img src="style/cart.png" alt="Jual" title="Jual"> </a>  &nbsp;&nbsp;&nbsp;
			<a href="'.$id_barang.'" id="edit"><img src="style/edit.png" alt="Edit" title="edit"> &nbsp;&nbsp;&nbsp;</a>  
				<span style="display:none" id="show_oke_edit">
					<a href="'.$id_barang.'" id="simpan_edit"><img src="style/oke.png" alt="Edit" title="edit"> </a>  &nbsp;&nbsp;&nbsp;
				</span>
			<a href="'.$id_barang.'" id="deletenya"><img src="style/hapus.png" alt="Hapus" title="Hapus"></a>
		</td>

	</tr>
	';
	
	
	
	
}
?>

</table>
<button id="loadMore" class="primary-button pure-button">Load More</button>
<button id="loadAll" class="primary-button pure-button">Load All</button>
<button id="showLess" class="primary-button pure-button">Show Less</button>
<button id="print_penjualan" class="primary-button pure-button">Print</button>
<div id="footer"></div>

<style>
#tableku tr{display:none;}
#tableku tr td input{border:1px solid #aaa; width:90px;}
#hitam{

}
</style>
<script>

//penjualan

$("#tableku tr td #jual").click(function(){
	
	
	var id_barang = $(this).attr("href");
	
	$.get("jual.php",{id_barang:id_barang},function(e){
	
		
		$("#t4_jual").html(e);
		$("#input_text_jual").focus();
		go_to("#t4_jual");
		
	
	});
	
	$(this).parent().parent().css( "background-color", "#ffdbdb" );
	
	return false;

});


//print

$("#print_penjualan").click(function(){
	window.print();
});



//paging
size_li = $("#tableku tr").size();
    x=11;
    $('#tableku tr:lt('+x+')').show();
	
	$("#loadAll").click(function(){
	 x= <?php echo $jumlah_q;?>;
	 x= (x+5 <= size_li) ? x+5 : size_li;
        $('#tableku tr:lt('+x+')').show();
		go_to_footer();
		if(x > <?php echo $jumlah_q;?>){
			
			$("#footer").html("Jumlah data <?php echo $jumlah_q;?>");
		
		}
	});
	
    $('#loadMore').click(function () {
        x= (x+5 <= size_li) ? x+5 : size_li;
        $('#tableku tr:lt('+x+')').show();
		go_to_footer();
		if(x > <?php echo $jumlah_q;?>){
			
			$("#footer").html("Jumlah data <?php echo $jumlah_q;?>");
		
		}
    });
	
    $('#showLess').click(function () {
        x=(x-5<0) ? 3 : x-5;
        $('#tableku tr').not(':lt('+x+')').hide();
		$("#footer").html('');
    });
	
	

$("#tableku tr td #deletenya").click(function(){
	var id_barang = $(this).attr("href");
	
	//alert(id_barang);
	if(warning()){
		$.get("Delete.php",{id_barang:id_barang},function(e){

		});
		
	$(this).parent().parent().hide();
	}
	
	
	
	return false;

});



$("#tableku tr td #edit").click(function(){
	var id_barang 		= $(this).attr("href");
	var nama_barang		= $(this).parent().parent().find("#nama_barang").html();
	var stok			= $(this).parent().parent().find("#stok").html();
	var harga_barang	= $(this).parent().parent().find("#harga_barang").html();
	//alert(nama_barang);
	
	$(this).hide();
	$(this).parent().find('#show_oke_edit').show();
	
	
	$(this).parent().parent().find("#nama_barang").html("<input type='text' value='"+nama_barang+"' id='nama_barang_edit'>");
	$(this).parent().parent().find("#nama_barang").find("#nama_barang_edit").focus();
	$(this).parent().parent().find("#stok").html("<input type='text' value='"+stok+"' id='stok_edit'>");
	$(this).parent().parent().find("#harga_barang").html("<input type='text' value='"+harga_barang+"' id='harga_barang_edit'>");
	
	var id_barang_edit 		= id_barang;
	var nama_barang_edit	= nama_barang;
	var stok_edit			= stok;
	var harga_barang_edit	= harga_barang;
	
	$(this).parent().parent().find("#nama_barang").find("#nama_barang_edit").keyup(function(){
		nama_barang_edit	= $(this).val();	
		evnt.preventDefault();
		
	});
	
	$(this).parent().parent().find("#stok").find("#stok_edit").keyup(function(){
		stok_edit	= $(this).val();	
		evnt.preventDefault();
		
	});
	
	$(this).parent().parent().find("#harga_barang").find("#harga_barang_edit").keyup(function(){
		harga_barang_edit	= $(this).val();	
		evnt.preventDefault();
		
	});
	
	
	$(this).parent().parent().keydown(function(event){ 
			
		if(event.which ==13){
            
		$.post("UPDATE.php",{id_barang:id_barang_edit,nama_barang:nama_barang_edit,stok:stok_edit,harga_barang:harga_barang_edit},function(e){});
		
		$(this).children("#nama_barang").html(nama_barang_edit);
		$(this).children("#stok").html(stok_edit);
		$(this).children("#harga_barang").html(harga_barang_edit);
		
        $(this).find("#edit").show();
		$(this).find("#show_oke_edit").hide();
		
		
		}
		
		
		
	});
		 
		
		 
	$(this).parent().find('#show_oke_edit').find("#simpan_edit").click(function(){
			
			//alert(harga_barang_edit+""+stok_edit+""+nama_barang_edit);
		
		$.post("UPDATE.php",{id_barang:id_barang_edit,nama_barang:nama_barang_edit,stok:stok_edit,harga_barang:harga_barang_edit},function(e){});
		
		$(this).parent().parent().parent().children("#nama_barang").html(nama_barang_edit);
		$(this).parent().parent().parent().children("#stok").html(stok_edit);
		$(this).parent().parent().parent().children("#harga_barang").html(harga_barang_edit);
		
		
		$(this).parent().parent().find("#edit").show();
		$(this).parent().parent().find("#show_oke_edit").hide();
		
		return false;
	});
	
	
	return false;

});





</script>

