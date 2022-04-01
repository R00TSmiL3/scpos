<!-- koenksi dengan databse sccd --->
<?php require 'config.php'; ?>
<?php if(isset($_GET['action']))
{
	$id = $_GET['id'];
	mysqli_query($con, 'delete from product where id='.$id);
}
?>

<!--memulai html-->
<!DOCTYPE html>
<html>
<head>
<title>dashboard pos</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/karakteristik.css">
<script type="text/javascript" src="chartjs/Chart.js"></script>

</head>
<body>
<div align="center">
<!--TEMPAT GOOGLE CHART-->
	<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>


<br><br>
<a href="add.php"><button class="btn btn-outline-success">Tambahkan Produk</button></a>
<br><br>
<table cellpadding="10" cellspacing="10" border="1">
	<tr>
		<th>Nomor</th>
		<th>Id</th>
		<th>Nama</th>
		<th>Harga</th>
		<th>Deskripsi</th>
		<th>Option</th>
	</tr>
	<?php
	$nomer =1;
	$result = mysqli_query($con, 'select * from product');
	while($product = mysqli_fetch_array($result)) {
		?>
	<tr>
		<td align="center"> <?php echo $nomer++; ?></td>
		<td align="center"><?php echo $product['id']; ?></td>
		<td align="center"><?php echo $product['name']; ?></td>
		<td align="center"><?php echo $product['price']; ?></td>
		<td align="center"><?php echo $product['description']; ?></td>
		<td align="center">	<a 
		href="admin.php?id=<?php echo $product['id']; ?>&action=delete" onclick="return confirm('Apa anda yakin?')"><button class="btn btn-danger">Delete</button></a>
		<p></p>
		<a href="edit.php?id=<?php echo $product['id']; ?>"><button class="btn btn-info">Edit</button></a>
		</td>
	</tr>
		<?php } ?>
</table>
<br><br>
<a href="karakteristik.php"><button class="btn btn-outline-primary">tampilkan karakteristik</button></a>
<br><br>
<a href="index.php"><button class="btn btn-outline-primary">home</button></a>

</div>
</body>
<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			//pie,doughnut,
			type: 'pie',
			data: {
				labels: ["nama", "nama"],
				datasets: [{
					label: '',
					data: [
					<?php 
					$nam = mysqli_query($koneksi,"select * from product where kategori='elektronik'");
					echo mysqli_num_rows($nam);
					?>, 
					<?php 
					$nam = mysqli_query($koneksi,"select * from product where kategori='produk kecnatikan'");
					echo mysqli_num_rows($nam);
					?>
					],
					backgroundColor: [
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 99, 132, 0.2)'
					],
					borderColor: [
					'rgba(54, 162, 235, 1)',
					'rgba(255,99,132,1)'
					],
					borderWidth: 0.7
				}]
			},
			//barangka kiri horizontal
			//options: {
				//scales: {
				//	yAxes: [{
					//	ticks: {
					//		beginAtZero:true
						//}
					//}]
				//}
			//}
		});
	</script>
</html>