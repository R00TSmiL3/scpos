<?php
require 'config.php';
if(isset($_GET['id'])){
	$result = mysqli_query($con, 'select * from product where id='.$_GET['id']);
	$product = mysqli_fetch_object($result);
}
if(isset($_POST['submitSave'])){
	$id = $_POST['id'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	$quantity = $_POST['quantity'];
	$description = $_POST['description'];
	mysqli_query($con, 'update product set name="'.$name.'", price='.$price.', quantity='.$quantity.', description="'.$description.'" where id='.$id);
	header('Location: index.php');
}
?>
<link  rel="stylesheet" href="css/bootstrap.css">

<div align="center">
<form method="post">
<table cellpadding="2" cellspacing="2">
	<tr>
		<td>Id</td>
		<td><?php echo $product->id; ?> <input type="hidden" name="id" value="<?php echo $product->id; ?>"></td>
	</tr>
	<tr>
		<td>Nama</td>
		<td><input class="form-control" type="text" name="name" value="<?php echo $product->name; ?>"></td>
	</tr>
	<tr>
		<td>harga</td>
		<td><input class="form-control" type="text" name="price"
			value="<?php echo $product->price; ?>"></td>
	</tr>
	<tr>
		<td>jumlah</td>
		<td><input class="form-control" type="text" name="quantity"
			value="<?php echo $product->quantity; ?>"></td>
	</tr>
	<tr>
		<td>Deskripsi</td>
		<td><textarea class="form-control" rows="5" cols="20" name="description"><?php echo $product->description; ?></textarea></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input class="btn btn-primary" type="submit" name="submitSave" value="Save"></td>
	</tr>
</table>
</form>
</div>