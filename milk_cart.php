<table class="table">
	<thead>
		<tr>
			<th>STT</th>
			<th>MaHH</th>
			<th>TenHH</th>
			<th>GiaBan</th>
			<th>DonVi</th>
			<th>HinhAnh</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$conn = mysqli_connect("localhost", "LuuSean", "9704061342284595", "milk_for_baby");
			//check connection
			if (mysqli_connect_error()) {
				echo "Failed to connect to MySQL: ".mysqli_connect_error();
			}

			$result = mysqli_query($conn, "SELECT * FROM hanghoa");

			while ($row = mysqli_fetch_assoc($result)):
		?>

		<tr>
			<td><?php echo $row["MaHH"]; ?></td>
			<td><?php echo $row["TenHH"]; ?></td>
			<td><?php echo $row["GiaBan"]; ?></td>
			<td><?php echo $row["DVT"]; ?></td>
			<td><?php echo $row["HinhAnh"]; ?></td>
		</tr>

	</tbody>
</table>
<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">