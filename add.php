
<?php
require 'config.php';
if(isset($_POST['submitSave'])){
	$name = $_POST['name'];
	$price = $_POST['price'];
	$quantity = $_POST['quantity'];
	$description = $_POST['description'];
	$kategori = $_POST['kategori'];
	mysqli_query($con, 'insert into product(name, price, quantity, description, kategori) values("'.$name.'","'.$price.'","'.$quantity.'","'.$description.'","'.$kategori.'")');
	header('Location: admin.php');
echo "product added successfully. <div align='center'><a href='index.php'><button class='btn btn-primary'>View product</button></a></div>";
 }

?>
<link  rel="stylesheet" href="css/bootstrap.css">

<div align="center">
<form method="post">
<table cellpadding="2" cellspacing="2">
	<tr>
		<td>Name</td>
		<td><input class="form-control" placeholder="nama produk" required="required" type="text" name="name"></td>
	</tr>
	<tr>
		<td>Price</td>
		<td><input class="form-control" placeholder="harga" required="required" type="text" name="price"></td>
	</tr>
	<tr>
		<td>Quantity</td>
		<td><input class="form-control" placeholder="jumlah barang" required="required" type="text" name="quantity"></td>
	</tr>
	<tr>
		<td>Description</td>
		<td><textarea class="form-control" placeholder="deskripsi barang" required="required" rows="5px" cols="20px" name="description"></textarea></td>
	</tr>
	<tr>
		<td>Kategori</td>
		<td align="center">
			<select name="kategori" size="1">
				<option class="form-control"name="kategori" value="elektronik">elektronik</option>
				<option class="form-control" name="kategori" value="fashion">fashion</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td align="center"><input class="btn btn-primary" type="submit" name="submitSave" value="Save"></td>
	</tr>
</table>
</form>
</div>