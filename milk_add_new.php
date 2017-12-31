<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin - Start Bootstrap Template</title>
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
    <script src="vendor/bootstrap/js/jquery-3.2.1.slim.min.js"></script>
    <script src="vendor/bootstrap/js/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>

  <!-- Add JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/accounting.min.js"></script>

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
              $('#type_items').html(data);
            }
          });
        }

        //event for btn add new type
        $("body").delegate("#btn_add_type_items", "click", function(event){
            var type_name = $("#input_add_type_name").val();
            var type_code = $("#input_add_type_code").val();

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
        });

        //event for btn save inside modal "add type of items"
        $("body").delegate(".btn_save_items", "click", function(event){
            var link = document.getElementById("link_items").href;
            alert(link);
            $.ajax({
            url: 'action.php',
            method: 'POST',
            data: {add_items:1},
            //{ten dt gui, ten tu dat:type_name,....}
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
                    <a class="nav-link" href="index.html">
                        <i class="fa fa-fw fa-dashboard"></i>
                        <span class="nav-link-text">Tổng Quan</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="cart-plus">
                    <a class="nav-link" href="milk_cart.php">
                        <i class="fa fa-lg fa-cart-plus"></i>
                        <span class="nav-link-text">Bán hàng</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                    <a class="nav-link" href="charts.html">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Charts</span>
          </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                    <a class="nav-link" href="tables.html">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Tables</span>
          </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Hàng hóa</span>
          </a>
                    <ul class="sidenav-second-level collapse" id="collapseComponents">
                        <li>
                            <a href="milk_items.html">Cập nhật hàng hóa</a>
                        </li>
                        <li>
                            <a href="milk_add_new.html">Thêm hàng hóa</a>
                        </li>
                        <li>
                            <a href="milk_type_items.html">Loại hàng hóa</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Example Pages</span>
          </a>
                    <ul class="sidenav-second-level collapse" id="collapseExamplePages">
                        <li>
                            <a href="login.html">Login Page</a>
                        </li>
                        <li>
                            <a href="register.html">Registration Page</a>
                        </li>
                        <li>
                            <a href="forgot-password.html">Forgot Password Page</a>
                        </li>
                        <li>
                            <a href="blank.html">Blank Page</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Menu Levels</span>
          </a>
                    <ul class="sidenav-second-level collapse" id="collapseMulti">
                        <li>
                            <a href="#">Second Level Item</a>
                        </li>
                        <li>
                            <a href="#">Second Level Item</a>
                        </li>
                        <li>
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
                        </li>
                    </ul>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
                    <a class="nav-link" href="#">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Link</span>
          </a>
                </li>
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
                    <form class="form-inline my-2 my-lg-0 mr-lg-2">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Search for...">
                            <span class="input-group-btn">
                <button class="btn btn-success" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
                        </div>
                    </form>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
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
                            <button type="button" class="btn btn-outline-success btn-sm btn_save_items">
                                Lưu
                            </button>
                        </a>
                        <a href="milk_items.html" class="margin-a">
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
                    <form class="form-horizontal">
                        <div class="form-inline">
                            <label class="control-label col-sm-4 text-success" for="name_item">
                            Tên sản phẩm: 
                            </label>
                            <div class="col-sm">
                                <input type="text" name="" id="name_item" 
                                placeholder="Nhập tên sản phẩm"
                                class="form-control">
                            </div>
                        </div>
                        <div class="form-inline">
                            <label class="control-label col-sm-4 text-success" for="barcode">
                            Mã sản phẩm: 
                            </label>
                            <div class="col-sm">
                                <input type="text" name="" id="barcode" 
                                placeholder="Nhập mã sản phẩm"
                                class="form-control">
                            </div>
                        </div>
                        <div class="form-inline">
                            <label class="control-label col-sm-4 text-success" for="item_price">
                            Đơn giá: 
                            </label>
                            <div class="col-sm">
                                <input type="text" name="" id="item_price" 
                                placeholder="Nhập giá sản phẩm"
                                class="form-control">
                            </div>
                        </div>
                        <div class="form-inline">
                            <label class="control-label col-sm-4 text-success" for="input_image_link">
                            Link ảnh:  
                            </label>
                            <div class="col-sm">
                                <input type="file" id="input_image_link">
                            </div>
                        </div>
                        <div class="form-inline">
                            <label class="control-label col-sm-4 text-success" for="type_items">
                            Loại hàng: 
                            </label>
                            <div class="col-sm">
                                 <select name="cbTypeItem" size=1 onChange="" id="type_items">
                                </select>
                            </div>
                        </div>
                        <div>
                            <button type="button" class="bt btn-outline-success btn-sm" data-toggle=modal data-target=#add-type-modal>Thêm loại</button>
                            <button type="button" class="btn btn-success btn-sm btn_save_items">Lưu</button>
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
                    <small>Copyright © Your Website 2017</small>
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
                                    <input type="text" class="form-control" id="input_add_type_name" placeholder="Enter name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Mã</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input_add_type_code" placeholder="Enter code">
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
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</body>

</html>