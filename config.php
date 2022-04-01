<?php
	$con = mysqli_connect('localhost', 'root', '', 'sccd');
	echo "terkoneksi dengan database <br><br>";
?>	
<?php	
	$conn = new PDO("mysql:host=localhost;dbname=sccd", 'root', '');
	echo "pdo sukses terkoneksi <br><br>";
?>
<?php 
	$koneksi = mysqli_connect("localhost","root","","sccd");
	echo "database google chart terhubung";
?>

