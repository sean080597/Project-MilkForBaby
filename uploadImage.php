<?php
	if(is_array($_FILES)) {
		if(!file_exists($_FILES['upload_photo']['tmp_name']) || !is_uploaded_file($_FILES['upload_photo']['tmp_name'])) {
			echo 'Đã thêm sản phẩm này';
		}else {
			$sourcePath = $_FILES['upload_photo']['tmp_name'];
			$targetPath = "imgs/".$_FILES['upload_photo']['name'];
			if(move_uploaded_file($sourcePath,$targetPath)) {
				echo 'Thêm sản phẩm thành công';
			}
		}

	}
?>