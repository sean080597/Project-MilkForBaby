<?php
    session_start();

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
    }else {
    echo 'Bạn hãy đăng nhập để thấy trang';
    echo '<script>location.href = "http://localhost:8888/project-MilkForBaby/login.php";</script>';
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Milk for Baby</title>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/milk_add_new.css">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.css">

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        //add data for select "type items"
        getTypeItems();

        function getTypeItems(){
          $.ajax({
            url: 'action.php',
            method: 'POST',
            data: {get_name_type_items:1},
            success: function(data){
              $('#type_item').html(data);
            }
          });
        }

        //event for btn add new type
        $("body").delegate("#btn_add_type_items", "click", function(event){
            var type_name = $("#input_add_type_name").val();
            var type_code = $("#input_add_type_code").val();

            if (type_name==="" || type_code==="") {
                alert("Bạn chưa nhập đủ thông tin");
            }
            else {
                  $.ajax({
                    url: 'action.php',
                    method: 'POST',
                    data: {add_type_items:1, send_type_name:type_name, send_type_code: type_code},
                    //{ten dt gui, ten tu dat:type_name,....}
                    success: function(data){
                      //$('#type_items').html(data);
                      alert(data);
                      location.reload();
                    }
                  });
            }
        });

        //event for btn save of page
        $("#add_item_form").on('submit',(function(e) {
            e.preventDefault();
            var name_item = $("#name_item").val();
            var item_price = $("#item_price").val();
            var item_unit = $("#item_unit").val();
            var type_item = $("#type_item").val();
            var barcode = $("#barcode").val();
            barcode = type_item + barcode;
            
            var selectedFile = document.getElementById("input_image_link");
            var link = "http://localhost:8888/Project-MilkForBaby/imgs/" + selectedFile.files.item(0).name;

            $.ajax({
                url: "uploadImage.php",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data){
                    $.ajax({
                        url: 'action.php',
                        method: 'POST',
                        data: {add_new_item: 1,
                                send_name_item:name_item,
                                send_barcode: barcode,
                                send_item_price: item_price,
                                send_linkImg: link,
                                send_item_unit: item_unit,
                                send_type_item: type_item
                                },
                        success: function(data){
                            alert(data);
                            location.reload();
                        }
                    });
                }
            });

        }));

        //button logout
        $("body").delegate("#btn_logout", "click", function(event) {
          $.ajax({
            url: 'action.php',
            method: 'POST',
            data: {logout_require:1}
          });
        });

      });
    </script>

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand" href="index.php">Milk for Baby</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link" href="index.php">
                        <i class="fa fa-fw fa-dashboard"></i>
                        <span class="nav-link-text">Tổng Quan</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="cart">
                  <a class="nav-link" href="milk_cart.php">
                    <i class="fa fa-fw fa-cart-plus"></i>
                    <span class="nav-link-text">Bán hàng</span>
                  </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-wrench"></i>
                        <span class="nav-link-text">Hàng hóa</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseComponents">
                        <li>
                            <a href="milk_items.php">Cập nhật hàng hóa</a>
                        </li>
                        <li>
                            <a href="milk_add_new.php">Thêm hàng hóa</a>
                        </li>
                        <li>
                            <a href="milk_type_items.php">Loại hàng hóa</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-file"></i>
                        <span class="nav-link-text">Quản lý hóa đơn</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseExamplePages">
                        <li>
                            <a href="milk_import.php">Hóa đơn nhập</a>
                        </li>
                        <li>
                            <a href="milk_import_bills.php">Chi tiết hóa đơn nhập</a>
                        </li>
                        <li>
                            <a href="milk_export.php">Hóa đơn bán</a> 
                        </li>
                        <!-- <li>
                            <a href="">Chi tiết hóa đơn bán</a>
                        </li> -->
                        <!-- <li>
                            <a href="login.php">Login Page</a>
                        </li>
                        <li>
                            <a href="register.html">Registration Page</a>
                        </li>
                        <li>
                            <a href="forgot-password.html">Forgot Password Page</a>
                        </li>
                        <li>
                            <a href="blank.html">Blank Page</a>
                        </li> -->
                    </ul>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-sitemap"></i>
                        <span class="nav-link-text">Quản lý nhân viên</span>
                      </a>
                    <ul class="sidenav-second-level collapse" id="collapseMulti">
                        <li>
                            <a href="#">Cập nhật thông tin NV</a>
                        </li>
                        <li>
                            <a href="#">Phân quyền hệ thống</a>
                        </li>
                        <li>
                            <a href="login.php">Đăng nhập</a>
                        </li>
                        <!-- <li>
                            <a href="#">Second Level Item</a>
                        </li>
                        <li>
                            <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Third Level</a>
                            <ul class="sidenav-third-level collapse" id="collapseMulti2">
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                </li>
               <!--  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
                    <a class="nav-link" href="#">
                        <i class="fa fa-fw fa-link"></i>
                        <span class="nav-link-text">Link</span>
                    </a>
                </li> -->
            </ul>
            <ul class="navbar-nav sidenav-toggler">
                <li class="nav-item">
                    <a class="nav-link text-center" id="sidenavToggler">
                        <i class="fa fa-fw fa-angle-left"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out"></i>Đăng xuất</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#" class="text-success">Tổng Quan</a>
                </li>
                <li class="breadcrumb-item active">Thêm mới</li>
                <li class="addnew-button">
                   <div class="form-inline">
                        <a href="#" class="margin-a">
                            <button type="button" class="btn btn-success btn-sm btn_save_item">
                                Lưu
                            </button>
                        </a>
                        <a href="milk_items.php" class="margin-a">
                            <button type="button" class="btn btn-outline-success btn-sm">
                                Hủy
                            </button>
                        </a>
                    </div>
                </li>
            </ol>
            <!-- Area Input Example-->
            <div class="area-addnew">
                <div class="content-addnew">
                    <form class="form-horizontal" id="add_item_form" action="uploadImage.php" method="post">
                        <div class="form-inline input_css">
                            <label class="control-label col-sm-4 text-success" for="name_item">
                            Tên sản phẩm: 
                            </label>
                            <div class="col-sm">
                                <input type="text" id="name_item" placeholder="Nhập tên sản phẩm" class="form-control" maxlength="50" required>
                            </div>
                        </div>
                        <div class="form-inline input_css">
                            <label class="control-label col-sm-4 text-success" for="barcode">
                            Mã sản phẩm: 
                            </label>
                            <div class="col-sm">
                                <input type="text" id="barcode" placeholder="Nhập mã sản phẩm" class="form-control" maxlength="10" required>
                            </div>
                        </div>
                        <div class="form-inline input_css">
                            <label class="control-label col-sm-4 text-success" for="item_price">
                            Đơn giá: 
                            </label>
                            <div class="col-sm">
                                <input type="number" placeholder="Nhập giá sản phẩm" class="form-control" id="item_price" min="0" onkeydown="javascript: return event.keyCode == 69 || event.keyCode == 189 ? false : true" required>
                            </div>
                        </div>
                        <div class="form-inline input_css">
                            <label class="control-label col-sm-4 text-success" for="item_unit">
                            Đơn vị tính:
                            </label>
                            <div class="col-sm">
                                <input type="text" id="item_unit" placeholder="Nhập DVT" class="form-control" maxlength="10" required>
                            </div>
                        </div>
                        <div class="form-inline input_css">
                            <label class="control-label col-sm-4 text-success" for="input_image_link">
                            Link ảnh:  
                            </label>
                            <div class="col-sm">
                                <input type="file" accept="image/png, image/jpeg, image/gif" id="input_image_link" name="upload_photo" required>
                            </div>
                        </div>
                        <div class="form-inline input_css">
                            <label class="control-label col-sm-4 text-success" for="type_item">
                            Loại hàng: 
                            </label>
                            <div class="col-sm">
                                <select name="cbTypeItem" size=1 onChange="" id="type_item">
                                </select>
                                <button type="button" class="bt btn-outline-success btn-sm" data-toggle="modal" data-target="#add-type-modal">Thêm loại</button>
                            </div>
                        </div>
                        <div class="block_btn">
                            <button type="submit" class="btn btn-success btn-sm btn_save_item" id="btn_save">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.container-fluid-->
        <!-- /.content-wrapper-->
        <footer class="sticky-footer">
            <div class="container">
                <div class="text-center">
                    <small>Copyright © Milk for Baby 2017</small>
                </div>
            </div>
        </footer>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
          <i class="fa fa-angle-up"></i>
        </a>
        <!--modal add type of item-->
        <div class="modal fade" id="add-type-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success text-light">
                        <h5>Thêm loại hàng hóa</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <!--&times là icon entity trong html-->
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Tên</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input_add_type_name" placeholder="Nhập tên loại">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Mã</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input_add_type_code" placeholder="Nhập mã loại">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-sm" id="btn_add_type_items">Thêm</button>
                        <button type="button" class="btn btn-outline-success btn-sm" data-dismiss="modal">Thoát</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Logout Modal-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bạn muốn thoát?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Chọn "Thoát" để kết thúc phiên làm việc.</div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Quay lại</button>
                <a class="btn btn-primary" href="login.php" id="btn_logout">Thoát</a>
              </div>
            </div>
          </div>
        </div>
        
    </div>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

</body>

</html>