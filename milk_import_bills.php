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
    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="css/milk_import_bills.css">

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
     <!-- Add JS -->
    <script src="js/accounting.min.js"></script>
    <!--0000000000000000000000000000000000-->
    

    <script>
        $(document).ready(function() {
           //button logout
            $("body").delegate("#btn_logout", "click", function(event) {
              $.ajax({
                url: 'action.php',
                method: 'POST',
                data: {logout_require:1}
              });
            }); 

            //button search
            $("body").delegate("#btn_search", "click", function(event) {
                var searchText = $("#input_search").val();
                $.ajax({
                    url: 'action.php',
                    method: 'POST',
                    data: {get_items_search:1, search_text:searchText},
                    success: function(data){
                        alert(data);
                    }
                });
            });

        });
    </script>

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand" href="index.html">Start Bootstrap</a>
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
                    <a href="#" class="bt text-success">Tổng Quan</a>
                </li>
                <li class="breadcrumb-item active">Items</li>
            </ol>
            <!-- Area for Example-->
            <!-- /.container-fluid-->
        </div>
        <div class="container-import">
            <div class="form-inline">
                <input class="form-control" type="text" name="code-bill" placeholder="Mã hóa đơn">
                <div class="input-group">
                    <input id="input_search" class="form-control" type="text" placeholder="Tìm kiếm sản phẩm">
                        <span class="input-group-btn">
                            <button class="btn btn-success" type="button" id="btn_search">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                </div>
            </div>   
            <div class="container-total">
                <div class="container-items">
                    <div class="table-items">
                        <table class="table table-hover">
                            <thead class="t-head">
                                <tr>
                                    <th class="th-code">Mã hàng hóa</th>
                                    <th class="th-name">Tên</th>
                                    <th class="th-price">Đơn giá</th>
                                    <th class="th-quantity">Số lượng</th>
                                    <th class="th-subtotal">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-toggle="modal" data-target="#modal-item">
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td>5</td>
                                </tr>
                            </tbody>
                        </table>
                        
                    </div>

                    <div class="container-search">
                        <div>
                            <ul class="ul_search">
                                <li>
                                    <div class="item_1 " style="background-image: url('http://imgholder.ru/160x150/ccc/333.png?text=placeholder');">    
                                    </div>
                                </li>
                                <li>
                                    <div class="item_1 " style="background-image: url('http://imgholder.ru/160x150/ccc/333.png?text=placeholder');">    
                                    </div>
                                </li>
                                <li>
                                    <div class="item_1 " style="background-image: url('http://imgholder.ru/160x160/ccc/333.png?text=placeholder');">    
                                    </div>
                                </li>
                                <li>
                                    <div class="item_1 " style="background-image: url('http://imgholder.ru/160x150/ccc/333.png?text=placeholder');">    
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    </div>
                <div class="container-cal">
                    <form >
                        <div class="form-group">
                            <label class="control-label col-sm-5">Tổng tiền</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="" value="0" readonly="true">
                            </div>
                        </div>
                    </form>
                    <div class="container-handle">
                        <button class="bt btn-success btn-sm">Nhập</button>
                        <a href="milk_import.html">
                            <button class="bt btn-outline-success btn-sm">Thoát</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
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
        <!--Add value Modal-->
        <div class="modal fade" id="modal-item">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success text-light">
                        <h5>Nhập hàng hóa</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-sm-5">Mã hàng hóa</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="" value="#" readonly="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-5">Tên</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="" value="#" readonly="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-5">Đơn giá</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="" placeholder="nhập đơn giá">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-5">Số lượng</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="" placeholder="Nhập số lượng">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-sm">
                        Nhập
                        </button>
                        <button type="button" class="btn btn-outline-success btn-sm" data-dismiss="modal">
                        Thoát
                        </button>
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
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Page level plugin JavaScript-->
        <script src="vendor/chart.js/Chart.min.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin.min.js"></script>
        <!-- Custom scripts for this page-->
        <script src="js/sb-admin-charts.min.js"></script>
    </div>
</body>

</html>