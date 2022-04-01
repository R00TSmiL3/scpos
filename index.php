<?php
	require 'config.php';
	$result = mysqli_query($con, 'select * from product');
?>

<link rel="stylesheet" href="css/bootstrap.css">

<div align="center">
<br><br>
<table cellpadding="2" cellspacing="2" border="1">
	<tr>
		<th>Id</th>
		<th>Nama</th>
		<th>Harga</th>
		<th>Deskripsi</th>
		<th>Stock barang</th>
		<th>Beli</th>
	</tr>
	<?php while($product = mysqli_fetch_object($result)) { ?>
		<tr>
			<td><?php echo $product->id; ?></td>
			<td><?php echo $product->name; ?></td>
			<td><?php echo $product->price; ?></td>
			<td><?php echo $product->description; ?></td>
			<td><?php echo $product->quantity;?></td>
			<td><a href="cart.php?id=<?php echo $product->id; ?>"><button class="btn btn-success">order now</button></a></td>
		</tr>
	<?php } ?>
</table>
<br><br>
<a href="admin.php"><button class="btn btn-info">dashboard admin</button></a>
</div>