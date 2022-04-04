<?php
	require 'config.php';
	$result = mysqli_query($con, 'select * from product');
?>

<link rel="stylesheet" href="css/bootstrap.css">

<div align="center">
<br><br>
<table cellpadding="20" cellspacing="20" border="2">
	<tr>
		<th align="center" bgcolor="#DCDCDC">Nomor</th>
		<th align="center" bgcolor="#DCDCDC">Id</th>
		<th align="center" bgcolor="#DCDCDC">Nama</th>
		<th align="center" bgcolor="#FF69B4">Harga</th>
		<th align="center" bgcolor="#DCDCDC">Deskripsi</th>
		<th align="center" bgcolor="#DCDCDC">Stock barang</th>
		<th align="center" bgcolor="#DCDCDC">Kategori</th>
		<th align="center" bgcolor="#DCDCDC">Beli</th>
	</tr>
	<?php  $nomor = 1;
	while($product = mysqli_fetch_object($result)) { ?>
		<tr>
			<td align="center" bgcolor="#F5F5F5"><?php echo $nomor++; ?></td>
			<td align="center" bgcolor="#F5F5F5"><?php echo $product->id; ?></td>
			<td align="center" bgcolor="#F5F5F5"><?php echo $product->name; ?></td>
			<td align="center" bgcolor="pink"><?php echo $product->price; ?></td>
			<td align="center" bgcolor="#F5F5F5"><?php echo $product->description; ?></td>
			<td align="center" bgcolor="#F5F5F5"><?php echo $product->quantity;?></td>
			<td align="center" bgcolor="#F5F5F5"><?php echo $product->kategori; ?></td>
			<td align="center" bgcolor="#F5F5F5"><a href="cart.php?id=<?php echo $product->id; ?>"><button class="btn btn-success">order now</button></a></td>
		</tr>
	<?php } ?>
</table>
<br><br>
<a href="admin.php"><button class="btn btn-info">dashboard admin</button></a>
</div>