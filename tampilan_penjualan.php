<?php
include "connection.php";
?>

<h1>Laporan Penjualan</h1>


<table class="databaru">
	<tr class="data">
		<th class="data"><b>No</b></td>
		<th class="data"><b>Nama barang</b></td>
		<th class="data"><b>Jumlah Terjual</b></td>
		
	</tr>
	
<?php
$query__total = mysql_query("SELECT * FROM tbl_penjualan GROUP BY id_barang ORDER BY id_penjualan DESC");

while($dapat__total = mysql_fetch_array($query__total)){
	
	$id_barang__total			= $dapat__total['id_barang'];
	$nama_barang__total 		= mysql_fetch_array(mysql_query("SELECT nama_barang FROM tbl_barang WHERE id_barang='$id_barang__total'"));
	
	
	$q = mysql_query("SELECT jumlah_terjual FROM tbl_penjualan WHERE id_barang='$id_barang__total'");
	
	
	$no__total ++;	
	if($no__total %2==0){
		  
		  $style = 'ganti';
	  }else{
		  
		  $style = 'data';
		  
	  }	
	
	echo'
	<tr class="'.$style.'">
		<td class="data">'.$no__total.'</td>
		
		<td class="data">'.$nama_barang__total['nama_barang'].'</td>
		
		
		
		<td class="data">';
		$total = 0;	
		while($arraynya = mysql_fetch_array($q)){
			
			//echo $arraynya[jumlah_terjual].",";
			$total += $arraynya[jumlah_terjual];
			

		}	

		echo $total;
		
		
		
	echo "</td>
		
		
	</tr>
	";
	
}
?>
	
</table>


<button id="detail_penjualan" class="primary-button pure-button">Details</button>
<button id="print_penjualan" class="primary-button pure-button">Print</button>





<div id="details">
	<h2>Details</h2>
	<table class="databaru">
		<tr class="data">
			<th class="data"><b>No</b></td>
			<th class="data"><b>Nama barang</b></td>
			<th class="data"><b>Jumlah Terjual</b></td>
			<th class="data"><b>Tanggal Terjual</b></td>
		</tr>
		
	<?php
	$query = mysql_query("SELECT * FROM tbl_penjualan ORDER BY id_penjualan DESC");

	while($dapat = mysql_fetch_array($query)){
		
		$id_barang			= $dapat['id_barang'];
		$nama_barang 		= mysql_fetch_array(mysql_query("SELECT nama_barang FROM tbl_barang WHERE id_barang='$id_barang'"));
		$harga_barang		= $dapat['harga_barang'];
		$jumlah_terjual		= $dapat['jumlah_terjual'];
		$tanggal_terjual	= $dapat['tanggal_terjual'];
		
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
			
			<td class="data">'.$nama_barang['nama_barang'].'</td>
			<td class="data">'.$jumlah_terjual.'</td>
			<td class="data">'.$tanggal_terjual.'</td>
			
		</tr>
		';
		
	}
	?>
		
	</table>
</div>

<script>
$("#details").hide();
$("#detail_penjualan").click(function(){
	
	$("#details").toggle();
	
});

$("#print_penjualan").click(function(){
	window.print();
});
</script>