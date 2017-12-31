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
    <link rel="stylesheet" href="css/milk_type_items.css">

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
        //event for btn add new
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

        //event for btn edit
        

        //event for btn clear

        //get data of items to table
        getTypeItems();

        function getTypeItems(){
            $.ajax({
                url: 'action.php',
                method: 'POST',
                data:{
                    get_type_items:1
                },
                success: function(data){
                    $('#info_type_items').html(data);
                }
            });
        }

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
<<<<<<< HEAD:milk_type_items.php
                     <i class="fa fa-fw fa-dashboard"></i>
                     <span class="nav-link-text">Tổng Quan</span>
                    </a>
=======
                        <i class="fa fa-fw fa-dashboard"></i>
                        <span class="nav-link-text">Tổng Quan</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="cart">
                  <a class="nav-link" href="milk_cart.php">
                    <i class="fa fa-fw fa-cart-plus"></i>
                    <span class="nav-link-text">Bán hàng</span>
                  </a>
>>>>>>> b280bc913c37e452cc62ce83af2c09e8603dfeff:milk_type_items.html
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
<<<<<<< HEAD:milk_type_items.php
                    <a class="nav-link nav-link-collapse collapsed"
                    data-toggle="collapse" href="#collapseComponents"
                    data-parent="#exampleAccordion">
=======
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
>>>>>>> b280bc913c37e452cc62ce83af2c09e8603dfeff:milk_type_items.html
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
                        <span class="nav-link-text">Example Pages</span>
<<<<<<< HEAD:milk_type_items.php
                      </a>
=======
                    </a>
>>>>>>> b280bc913c37e452cc62ce83af2c09e8603dfeff:milk_type_items.html
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
<<<<<<< HEAD:milk_type_items.php
                    <a class="nav-link nav-link-collapse collapsed" 
                    data-toggle="collapse" href="#collapseMulti" 
                    data-parent="#exampleAccordion">
=======
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
>>>>>>> b280bc913c37e452cc62ce83af2c09e8603dfeff:milk_type_items.html
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
<<<<<<< HEAD:milk_type_items.php
                    <i class="fa fa-fw fa-sign-out"></i>
                    Logout
=======
                        <i class="fa fa-fw fa-sign-out"></i>Logout
>>>>>>> b280bc913c37e452cc62ce83af2c09e8603dfeff:milk_type_items.html
                    </a>
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
                <li class="breadcrumb-item active">Loại hàng</li>
                <li class="btn-add-new-item">
                    <div class="form-inline">
                        <button type="button" class="btn btn-outline-success btn-sm" data-toggle=modal data-target=#add-type-modal>
                            Thêm mới
                        </button>
                        <button type="button" class="btn btn-outline-success btn-sm">
                            Sửa
                        </button>
                        <button type="button" class="btn btn-outline-success btn-sm">
                            Xóa
                        </button>
                        <a href="index.html" class="text-success">
                            Quay lại
                        </a>
                    </div>
                </li>
            </ol>
            <!-- Area for Example-->
        </div>
        <!-- container-item-->
        <div class="container-items">
             <table class="table table-hover">
                <thead class="t-head">
                    <tr>
                        <th class="code-type-item">Mã</th>
                        <th class="name-type-item">Tên Loại</th>
                    </tr>   
                </thead>
                <tbody id="info_type_items">
                </tbody>
            </table>
        </div>
        <!-- /.container-items-->
        <!-- /.content-wrapper-->
        <footer class="sticky-footer">
            <div class="container">
                <div class="text-center">
                    <small>Copyright © Your Website 2017</small>
                </div>
            </div>
        </footer>
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
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
          <i class="fa fa-angle-up"></i>
        </a>
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