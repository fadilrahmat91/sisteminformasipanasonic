<?php 
session_start();
include "connection.php";
if(isset($_SESSION['username']) AND isset($_SESSION['id_admin']))
	header ('location: index.php');
$alert = '';
if(isset($_GET['login'])){
	
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	
	$query = mysql_query("SELECT * FROM tbl_admin WHERE username='$user' AND password='$pass'");
	
	$hitung = mysql_num_rows($query);
	
	
	if($hitung > 0){
		$ses = mysql_fetch_array($query);
				
				$_SESSION['username'] = $ses['username'];
				$_SESSION['id_admin'] = $ses['id_admin'];
			
			header ('location: index.php');
		
		
	}else{
		
		$alert =  "Gagal Login... username atau password salah!!";
		
	}
	
}
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Microcontroller with Arduino">
<link rel="shortcut icon" href="style/ic.jpg">
<title>Sistem Informasi Penjualan Barang <?php echo date("d-m-Y");?></title>

    
<link rel="stylesheet" href="style/pure.css">
<link rel="stylesheet" href="style/css.css">
<link rel="stylesheet" href="jqueryui/css/ui-lightness/jquery-ui-1.10.4.custom.css">

<script src="jquery/jquery.js"></script>
<script src="jquery/jquery.jqEasyCharCounter.min.js" type="text/javascript"></script>
<script src="jqueryui/js/jquery-ui-1.10.4.custom.js"></script>
<script src="js/fadil.js"></script>

<style type="text/css">
	
</style>


</head>
<body>



<div id="layout" class="content pure-g">
    <div id="nav" class="pure-u">
        <a href="#" class="nav-menu-button">Menu</a>

       
    </div>

	
	<div id="menu_kedua">
		<div id="list" class="pure-u-1">
			
			<div class="email-item email-item-selected pure-g" id="kontak">

			<div class="pure-u-3-4">
				<img src="style/panasonic.png" width="90%">
			<div><b>Login Form</b></div>
			<br>
				<form action="?login" method="post" id="form_tambah_barangnya">
						
						
						<table>
							<tr>
								<td>Username </td>    <td><input type="text" name="user" required class="focus_form_tambah">  </td>
							</tr>
						
						<tr>
								<td>Password</td>    <td><input type="password" name="pass" class="stoknya" required>  </td>
							</tr>
						
						
						<tr>
								<td> </td>    <td> <input type="submit" name="submit" class="primary-button pure-button" value="Login"></td>
							</tr>
							
							<tr>
								<td> </td>    <td> <?php echo $alert;?></td>
							</tr>
						
						</table>

				</form>
			</div>
			
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

