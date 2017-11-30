<?php 
session_start();
include "connection.php";
if(!isset($_SESSION['username']) or !isset($_SESSION['id_admin']))
	header ('location: login.php');
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Microcontroller with Arduino">
<link rel="shortcut icon" href="style/ic.jpg">
<title>Sistem Informasi Kasir <?php echo date("d-m-Y");?></title>

    
<link rel="stylesheet" href="style/pure.css">
<link rel="stylesheet" href="style/css.css">
<link rel="stylesheet" href="jqueryui/css/ui-lightness/jquery-ui-1.10.4.custom.css">

<script src="jquery/jquery.js"></script>
<script src="jquery/jquery.jqEasyCharCounter.min.js" type="text/javascript"></script>
<script src="jqueryui/js/jquery-ui-1.10.4.custom.js"></script>
<script src="js/fadil.js"></script>

<style type="text/css">
	@page {
	  size: A4;
	   margin: 2cm 0cm 2cm 0cm;

	  
	}
	@media print {
	  html, body {
		width: 210mm;
		height: 297mm;
		
	  -webkit-print-color-adjust:exact;
	  }
	  
	  #isi_content {
        width: 210mm;
        min-height: 297mm;
        padding-top: 0mm;
        padding-left: 20mm;
        padding-right: 20mm;
        padding-bottom: 20mm;
		
        
        background: url("style/logo_mereng.png") white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
	  
	 		
    	#hilang { display: none; }
    	#nav { display: none; }
    	 
		#list { display: none; }
		.pure-button { display: none; }
		#footer { display: none; }
		#wrapper { border: none; }
	}
   
    	
		

		
 
	

</style>


</head>
<body>



<div id="layout" class="content pure-g">
    <div id="nav" class="pure-u">
        <a href="#" class="nav-menu-button">Menu</a>

        <div class="nav-inner">
			<button class="primary-button pure-button" id="homenya">Home</button>
			<div class="pure-menu pure-menu-open">
				<ul>
					<li><a href="#" id="data_barang"><span class="email-label-work"></span>Data Barang</a></li>
					<li><a href="#" id="penjualan"><span class="email-label-work"></span>Penjualan</a></li>
					<li><a href="#" id="tambah_barang"><span class="email-label-work"></span>(+) Barang</a></li>
					<li><a href="logout.php" id="logout"><span class="email-label-work"></span>LogOut</a></li>
					
					
					<li><span id="loading" style="display:none">&nbsp;&nbsp;&nbsp;&nbsp;<img src="style/loading.gif" alt="L o a d i n g . ."></span></li>
					<li class="pure-menu-heading"><span class="email-label-personal" id="lihat_kontak"></span>Report</li>
				</ul>
			</div>
			
			
			
			<div id="tpl">
				<div id="report_output"></div>
			</div>
		
        </div>
    </div>

	
	<div id="menu_kedua">
		<div id="list" class="pure-u-1">
			
			<div class="email-item email-item-selected pure-g" id="kontak">

			<div class="pure-u-3-4">
				<img src="style/panasonic.png" width="90%">
			</div>
			
			</div>
			
			
			
			
			
			
		</div>
		
		<div id="list2" class="pure-u-1">
			
			
			
			
			
		</div>
		

		<div id="main" class="pure-u-1">
		<div id="isi_content">
			<p style="text-align: center; padding:20px;">
				<span style="font-size:26px;"><strong>SELAMAT DATANG DI SISTEM INFORMASI KASIR</strong></span><br>
				<span style=" font-size:40px;"> <strong>Fadil rahmat</strong></span>
			</p>

				
		</div>
		</div>
	</div>
	</div>
	
</div>

<script src="jquery/yui-min.js"></script>
<script>
    YUI().use('node-base', 'node-event-delegate', function (Y) {

        var menuButton = Y.one('.nav-menu-button'),
            nav        = Y.one('#nav');

        // Setting the active class name expands the menu vertically on small screens.
        menuButton.on('click', function (e) {
            nav.toggleClass('active');
        });

        // Your application code goes here...

    });
</script>

<script>
YUI().use('node-base', 'node-event-delegate', function (Y) {
    // This just makes sure that the href="#" attached to the <a> elements
    // don't scroll you back up the page.
    Y.one('body').delegate('click', function (e) {
        e.preventDefault();
    }, 'a[href="#"]');
});
</script>

</body>
</html>

