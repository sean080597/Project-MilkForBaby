<?php 
  $conn = mysqli_connect("localhost", "LuuSean", "9704061342284595") or die("Could not connect DB");
  mysqli_select_db($conn, "milk_for_baby") or die("Could not find db!");
  mysqli_set_charset($conn, "utf8");

  if (mysqli_connect_errno()) {
    echo "Failed to connect MySQL".mysqli_connect_error();
  }

  $hinhanh1 = $hinhanh2 = $hinhanh3 = $hinhanh4 = "";

  //collect
  if (isset($_POST['search'])) {
    $searchq = $_POST['search'];
    $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);

    $query = mysqli_query($conn, "SELECT * FROM hanghoa WHERE TenHH LIKE '%$searchq%'") or die("Could not search!");
    $count = mysqli_num_rows($query);
    if ($count == 0) {
      $hinhanh1 = "There was no search results!";
    }
    else {
      while ($row = mysqli_fetch_array($query)) {
          if (empty($hinhanh1)) {
            $hinhanh1 = $row['HinhAnh'];
          }elseif (empty($hinhanh2)) {
            $hinhanh2 = $row['HinhAnh'];
          }elseif (empty($hinhanh3)) {
            $hinhanh3 = $row['HinhAnh'];
          }else {
            $hinhanh4 = $row['HinhAnh'];
          }
      }
    }
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
  <link rel="stylesheet" href="css/normalize.min.css">
  <link rel="stylesheet" href="css/shopping-cart.css">

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="navbar-brand">
        <a class="logo" href="index.html">Milk for Baby</a>
      </div>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.html">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="cart">
          <a class="nav-link" href="milk_cart.html">
            <i class="fa fa-fw fa-dashboard"></i>
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
            <span class="nav-link-text">Components</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="navbar.html">Navbar</a>
            </li>
            <li>
              <a href="cards.html">Cards</a>
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
  </nav><!-- End Nav -->

  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row custom-search">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb col-lg-3 col-md-3 col-sm-5 col-xs-5">
          <li class="breadcrumb-item">
            <a href="#">Milk for Baby</a>
          </li>
          <li class="breadcrumb-item active">Bán hàng</li>
        </ol>

        <!-- Search product -->
        
          <form action="milk_cart.php" method="post" class="input-group input-group-sm custom-form-search col-lg-5 col-md-5 col-sm-5 col-xs-5">
            <input type="text" name="search" class="form-control" placeholder="Enter name">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-default">Search</button>
            </span>
          </form>
        
      </div>

      <div class="row">
        <!-- middle content -->
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
            <div class="custom-mid-payment">

              <div class="column-labels">
                <label class="product-stt">STT</label>
                <label class="product-id">Mã hàng</label>
                <label class="product-name">Tên hàng</label>
                <label class="product-unit">Đơn vị</label>
                <label class="product-quantity">Số lượng</label>
                <label class="product-price">Đơn giá</label>
                <label class="product-discount">Chiết khấu</label>
                <label class="product-removal">Remove</label>
                <label class="product-line-price">Thành tiền</label>
              </div>

              <div class="container-fluid row order-product">
                <!-- <?php 
                  $hinhanh = "";
                  $hinhanh .= $hinhanh1;
                  $hinhanh .= $hinhanh2;
                  $hinhanh .= $hinhanh3;
                  $hinhanh .= $hinhanh4;
                  echo $hinhanh;
                ?> -->
              </div>

              <div class="container-fluid bottom_product">
                <ul class="row">
                  <li class="col-lg-3 col-md-3 col-sm-6 bottom_product_img_first">
                    <?php 
                      echo '<div class="img-responsive img-thumbnail ratio-4-3" style="background-image: url('.$hinhanh1.')"></div>'
                    ?>
                  </li>

                  <li class="col-lg-3 col-md-3 col-sm-6 bottom_product_img_mid">
                    <?php 
                      echo '<div class="img-responsive img-thumbnail ratio-4-3" style="background-image: url('.$hinhanh2.')"></div>'
                    ?>
                  </li>

                  <li class="col-lg-3 col-md-3 col-sm-6 bottom_product_img_mid">
                    <?php 
                      echo '<div class="img-responsive img-thumbnail ratio-4-3" style="background-image: url('.$hinhanh3.')"></div>'
                    ?>
                  </li>

                  <li class="col-lg-3 col-md-3 col-sm-6 bottom_product_img_last">
                    <?php 
                      echo '<div class="img-responsive img-thumbnail ratio-4-3" style="background-image: url('.$hinhanh4.')"></div>'
                    ?>
                  </li>
                </ul>
              </div>

            </div>
          </div><!-- End middle content -->

        <!-- right payment -->
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 custom-right-payment">
            <div class="jumbotron vertical-center">
              <div class="custom-payment-text">Thanh toán</div>
            </div>

            <div class="totals">
              <div class="totals-item">
                <label>Tổng tiền</label>
                <div class="totals-value" id="cart-subtotal">0</div>
              </div>
              <div class="totals-item">
                <label>VAT</label>
                <div class="totals-value" id="cart-vat">0</div>
              </div>
              <div class="totals-item totals-discount">
                <label>Chiết khấu (%)</label>
                <div class="totals-value" id="cart-shipping">0</div>
              </div>
              
              <div class="totals-item totals-item-total">
                <label style="color: #494">Khách hàng phải trả</label>
                <div class="totals-value" id="cart-total">0</div>
              </div>
              
              <input type="number" placeholder="Nhập tiền khách đưa" class="totals-customer">

              <div class="totals-item">
                <label>Tiền thừa</label>
                <div class="totals-value" id="cart-excess">0</div>
              </div>

              <button class="checkout">Thanh toán</button>
            </div>

          </div><!-- End right payment -->
      </div>
      
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Milk For Baby 2017</small>
        </div>
      </div>
    </footer>
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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
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
    <script src="js/index.js"></script>
    <script src="js/custom.js"></script>

  </div>
</body>

</html>
