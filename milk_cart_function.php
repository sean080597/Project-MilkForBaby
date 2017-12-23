<?php 
	//make connection
	$conn = mysqli_connect("localhost", "LuuSean", "9704061342284595");
	mysqli_select_db($conn, "milk_for_baby");
	mysqli_set_charset($conn, "utf8");

	//check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL DB".mysqli_connect_error();
	}

	$sql = "SELECT * FROM hanghoa";
	$record = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Milk for Baby</title>
</head>
<body>
	<table width="600" border="1" cellpadding="1" cellspacing="1">
		<tr>
			<th>MaHH</th>
			<th>TenHH</th>
			<th>GiaBan</th>
			<th>DVT</th>
			<th>HinhAnh</th>
			<th>MaLoai</th>
		</tr>

		<?php 
			while ($hh = mysqli_fetch_assoc($record)) {
			    echo '<tr>';
			    echo '<td>'.$hh['MaHH'].'</td>';
			    echo '<td>'.$hh['TenHH'].'</td>';
			    echo '<td>'.$hh['GiaBan'].'</td>';
			    echo '<td>'.$hh['DVT'].'</td>';
			    echo '<td><img src="'.$hh['HinhAnh'].'" alt="Error"></td>';
			    echo '<td>'.$hh['MaLoai'].'</td>';
			    echo '</tr>';
			}
		?>

	</table>
</body>
</html>
