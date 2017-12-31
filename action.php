<?php
	session_start();
	$conn = mysqli_connect("localhost", "root", "") or die("Could not connect DB");
	mysqli_select_db($conn, "milk_for_baby") or die("Could not find db!");
	mysqli_set_charset($conn, "utf8");

	if (mysqli_connect_errno()) {
	echo "Failed to connect MySQL".mysqli_connect_error();
	}

	//add to cart
	if (isset($_POST["addToProduct"])) {
		$p_id = $_POST["proId"];
		$sql = "SELECT * FROM `cart` WHERE MaHH = '$p_id'";
		$run_query = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($run_query);
		
		if ($count > 0) {
		  echo 'Đã thêm vào giỏ';
		}else{
		  $sql = "SELECT * FROM `hanghoa` WHERE MaHH = '$p_id'";
		  $run_query = mysqli_query($conn, $sql);
		  $row = mysqli_fetch_array($run_query);

		  $pro_id = $row["MaHH"];
		  $pro_name = $row["TenHH"];
		  $pro_image = $row["HinhAnh"];
		  $pro_unit = $row["DVT"];
		  $pro_price = $row["GiaBan"];

		  $sql = "INSERT INTO `cart` (`MaHH`, `ip_add`, `user_id`, `TenHH`, `HinhAnh`, `DVT`, `qty`, `GiaBan`, `TongTien`) VALUES ('$pro_id', NULL, NULL, '$pro_name', '$pro_image', '$pro_unit', '1', '$pro_price', '$pro_price')";

		  if (mysqli_query($conn, $sql)) {
		    echo 'Đã thêm thành công';
		  }else{
		  	echo 'Ko thêm được';
		  }
		}
	}

	//show cart
	if (isset($_POST["get_cart_product"])) {
		$sql = "SELECT * FROM cart";
		$run_query = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($run_query);

		if ($count > 0) {
		  $i = 1;
		  while ($row = mysqli_fetch_array($run_query)) {
		      $pro_id = $row['MaHH'];
		      $pro_unit = $row['DVT'];
		      $pro_name = $row['TenHH'];
		      $pro_price = $row['GiaBan'];
		      $pro_qty = $row['qty'];
		      $pro_total = $row['TongTien'];

		      echo '<div class="product-cart row">
		      		  <div class="product-stt">'.$i.'</div>
		              <div class="product-name">'.$pro_name.'</div>
		              <div class="product-unit">'.$pro_unit.'</div>

		              <div class="product-quantity"><input type="number" value="'.$pro_qty.'" id="qty-'.$pro_id.'" pid="'.$pro_id.'" min="1" max="500" class="qty" onkeydown="javascript: return event.keyCode == 69 || event.keyCode == 189 ? false : true"></div>

		              <div class="product-price price"><input class="form-control" type="text" value="'.number_format($pro_price, 0, ".", ",").'" id="price-'.$pro_id.'" pid="'.$pro_id.'" disabled></div>';

		            echo '<select class="product-discount" id="disc-'.$pro_id.'" pid="'.$pro_id.'">';
		            	$sql_discount = "SELECT * FROM ck_hh WHERE MaHH = '$pro_id'";
		            	$run_sql_above = mysqli_query($conn, $sql_discount);
		            	echo '<option>---</option>';
		            	while ($row_discount = mysqli_fetch_array($run_sql_above)){
		            		if ($row_discount['MaLoaiKM']==1) {
		            			echo '<option value="'.$row_discount['TienKM'].'">'.$row_discount['LuongKM'].'%</option>';
		            		}else{
		            			echo '<option value="'.$row_discount['TienKM'].'">'.$row_discount['LuongKM'].' VNĐ</option>';
		            		}
		            	}
  					echo '</select>';

		        echo '<div class="product-removal"><a href="#" class="btn btn-danger remove" remove_id="'.$pro_id.'"><span class="fa fa-trash-o fa-lg"></span></a></div>

		              <div class="product-line-price total"><input type="text" value="'.number_format($pro_total, 0, ".", ",").'" class="form-control" id="total-'.$pro_id.'" pid="'.$pro_id.'" disabled></div>
		            </div>';
		      $i++;
		  }
		}
	}

	//remove from cart
	if (isset($_POST["removeFromCart"])) {
		$pid = $_POST["removeId"];
		$sql = "DELETE FROM cart WHERE MaHH = '$pid'";
		$run_query = mysqli_query($conn, $sql);

		if ($run_query) {
			echo 'Đã bỏ SP';
		}
	}

	//update quantity
	if (isset($_POST["updateQuantity"])) {
		$pid = $_POST["updateId"];
		$qty = $_POST["qty"];
		$price = $_POST["price"];
		$total = $_POST["total"];

		$sql = "UPDATE cart SET qty='$qty', GiaBan='$price', TongTien='$total' WHERE MaHH='$pid'";
		mysqli_query($conn, $sql);
	}

	//update discount
	if (isset($_POST["updateDisc"])) {
		$pid = $_POST["pid"];
		$total = $_POST["total"];

		$sql = "UPDATE cart SET TongTien='$total' WHERE MaHH='$pid'";
		mysqli_query($conn, $sql);
	}

	//get total customer
	if (isset($_POST["get_total_customer"])) {
		$sql = "SELECT * FROM cart";
		$run_query = mysqli_query($conn, $sql);
		$total_customer = 0;
		while ($row = mysqli_fetch_array($run_query)) {
		    $pro_total = $row["TongTien"];
		    $price_array = array($pro_total);
		    $total_sum = array_sum($price_array);
		    $total_customer += $total_sum;
		}
		echo $total_customer;
	}

	//check out the bill
	if (isset($_POST["check_bill"])) {
		$subtotal = $_POST["sendSubtotal"];
		$total = $_POST["sendTotal"];
		$total_customer = $_POST["sendTotalCustomer"];
		$excess = $_POST["sendExcess"];

		$array_result = array(
			'bill_subtotal' => $subtotal,
          	'bill_total' => $total,
          	'bill_total_customer' => $total_customer,
          	'bill_excess' => $excess
		);
		$_SESSION["checkout_total"] = $array_result;

		$sql = "SELECT * FROM cart";
		$run_query = mysqli_query($conn, $sql);
		while ($row = mysqli_fetch_array($run_query)) {
	      	$pro_name = $row['TenHH'];
	      	$pro_qty = $row['qty'];
	      	$pro_price = $row['GiaBan'];
	      	$pro_total = $row['TongTien'];

	      	if (isset($_SESSION["checkout_product"])) {
				$count = count($_SESSION["checkout_product"]);
				$array_result = array(
					'pro_name' => $pro_name,
					'pro_qty' => $pro_qty,
					'pro_price' => $pro_price,
					'pro_total' => $pro_total
				);
				$_SESSION["checkout_product"][$count] = $array_result;
			}else {
				$array_result = array(
					'pro_name' => $pro_name,
					'pro_qty' => $pro_qty,
					'pro_price' => $pro_price,
					'pro_total' => $pro_total
				);
				$_SESSION["checkout_product"][0] = $array_result;
			}
		}

		//insert to table hdban
		$pre_id = "mfb17_";
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
	    for ($i = 0; $i < 6; $i++)
	        $pre_id .= $characters[mt_rand(0, 61)];

	    date_default_timezone_set("Asia/Ho_Chi_Minh");
	    $date = date('Y-m-d H:i:s', time());

		$sql = "INSERT INTO `hdban` (`MaHDB`, `NgayLap`, `ThanhTien`, `ChietKhau`, `TongThanhTien`, `MaTK`) VALUES ('$pre_id', '$date', '$subtotal', '0', '$total', NULL)";
		$run_query = mysqli_query($conn, $sql);
	}

	//truncate table cart
	if (isset($_POST["truncate_cart"])) {
		$sql = "TRUNCATE TABLE cart";
		mysqli_query($conn, $sql);
	}

	/*======================== * milk_items * ===============================================================*/
	//get data from hanghoa
	if (isset($_POST["get_info_items"])) {
		$sql = "SELECT * FROM hanghoa, hangtonkho, loaihang WHERE hanghoa.MaHH=hangtonkho.MaHH AND hanghoa.MaLoai=loaihang.MaLoai";
		$run_query = mysqli_query($conn, $sql);
		while ($row = mysqli_fetch_array($run_query)) {
			$tenhh = $row['TenHH'];
			$tenloai = $row['TenLoaiH'];
			$sl = $row['SoLuong'];
			$stt = $row['TinhTrang'];

			echo '<tr>
                    <td>'.$tenhh.'</td>
                    <td>'.$tenloai.'</td>
                    <td>'.$sl.'</td>
                    <td>'.$stt.'</td>
                </tr>';
		}
	}

	/*====================== * milk_add_new * =================================================================*/
	//get data from hanghoa
	if (isset($_POST["get_type_items"])) {
		$sql = "SELECT * FROM loaihang";
		$run_query = mysqli_query($conn, $sql);
		while ($row = mysqli_fetch_array($run_query)) {
			$tenloai = $row["TenLoaiH"];
			echo '<option value="'.$tenloai.'">'.$tenloai.'</option>';
		}
		
	}
	/*===================== * milk_type_item * ===============================================================*/
	//add data from hanghoa
	if (isset($_POST["add_type_items"])) {
		$type_name = $_POST["send_type_name"];
		$type_code = $_POST["send_type_code"];
		
		$sql = "INSERT INTO `loaihang` (`MaLoai`, `TenLoaiH`) VALUES ('$type_code', '$type_name')";
		if (mysqli_query($conn, $sql)) {
			echo 'Thêm mới loại hàng thành công';
		}
		
	}

	//add data from hanghoa
	if (isset($_POST["add_items"])) {
		
		//$sql = "INSERT INTO `loaihang` (`MaLoai`, `TenLoaiH`) VALUES ('$type_code', '$type_name')";
		echo "string";
		
	}

	/*===================== * milk_export * ===============================================================*/
	//add data from hanghoa
	if (isset($_POST["get_bill_details"])) {
		$sql = "SELECT * FROM `hdban`";
		$run_query = mysqli_query($conn, $sql);
		if (mysqli_num_rows($run_query) > 0) {
			while ($row = mysqli_fetch_array($run_query)) {
			    $billId = $row['MaHDB'];
			    $day = $row['NgayLap'];
			    $subtotal = $row['ThanhTien'];
			    $total = $row['TongThanhTien'];
			    $discount = $row['ChietKhau'];

			    echo '<tr data-toggle="modal" data-target="#modal-item">
                        <td>'.$billId.'</td>
                        <td>'.number_format($subtotal, 0, ".", ",").' VNĐ</td>
                        <td>'.$discount.'</td>
                        <td>'.number_format($total, 0, ".", ",").' VNĐ</td>
                        <td>'.$day.'</td>
                    </tr>';
			}
		}
	}

	/*===================== * login * ===============================================================*/
	//add data from hanghoa
	if (isset($_POST["login_require"])) {
		$acc = $_POST['account'];
		$pass = $_POST['password'];
		
		$sql = "SELECT * FROM `taikhoan` WHERE MaTK='$acc' AND Passwords = '$pass'";
		$run_query = mysqli_query($conn, $sql);
		if (mysqli_num_rows($run_query) > 0){
			$_SESSION['loggedin'] = true;
			echo 1;
		}else {
			echo 0;
		}
	}

	//add data from hanghoa
	if (isset($_POST["logout_require"])) {
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			unset($_SESSION['loggedin']);
		}
	}

?>