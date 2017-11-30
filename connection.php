<?php
error_reporting(0);
//koneksi ke mysql
$username	= "root";
$password	= "usbw";
$server		= "localhost";
$db_name	= "fadil";

mysql_connect($server,$username,$password);
mysql_select_db($db_name);

