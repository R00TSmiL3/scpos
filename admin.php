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
	<div style="width: 900px;">
		<canvas id="myChart"></canvas>
	</div>


<br><br>
<a href="add.php"><button class="btn btn-outline-success">Tambahkan Produk</button></a>
<br><br>
<table cellpadding="20" cellspacing="2" border="2">
	<tr>
		<th align="center" bgcolor="#DCDCDC">Nomor</th>
		<th align="center" bgcolor="#DCDCDC">Id</th>
		<th align="center" bgcolor="#DCDCDC">Nama</th>
		<th align="center" bgcolor="#FF69B4">Harga</th>
		<th align="center" bgcolor="#DCDCDC">Deskripsi</th>
		<th align="center" bgcolor="#DCDCDC">Kategori</th>
		<th align="center" bgcolor="#DCDCDC">Option</th>
	</tr>
	<?php
	$nomer =1;
	$result = mysqli_query($con, 'select * from product');
	while($product = mysqli_fetch_array($result)) {
		?>
	<tr>
		<td align="center" bgcolor="#F5F5F5"><?php echo $nomer++; ?></td>
		<td align="center" bgcolor="#F5F5F5"><?php echo $product['id']; ?></td>
		<td align="center" bgcolor="#F5F5F5"><?php echo $product['name']; ?></td>
		<td align="center" bgcolor="pink"><?php echo $product['price']; ?></td>
		<td align="center" bgcolor="#F5F5F5"><?php echo $product['description']; ?></td>
		<td align="center" bgcolor="#F5F5F5"><?php echo $product['kategori'] ?></td>
		<td align="center" bgcolor="#F5F5F5"><a 
		href="admin.php?id=<?php echo $product['id']; ?>&action=delete" onclick="return confirm('Apa anda yakin?')"><button class="btn btn-danger">Delete</button></a>
		<p></p>
		<a href="edit.php?id=<?php echo $product['id']; ?>"><button class="btn btn-info">Edit</button></a>
		</td>
	</tr>
		<?php } ?>
</table>
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
				labels: ["elektronik", "fashion"],
				datasets: [{
					label: '',
					data: [
					<?php 
					$nam = mysqli_query($koneksi,"select * from product where kategori='elektronik'");
					echo mysqli_num_rows($nam);
					?>, 
					<?php 
					$nam = mysqli_query($koneksi,"select * from product where kategori='fashion'");
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