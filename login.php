<?php
  session_start();
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
    echo '<script>location.href = "http://localhost:8888/project-MilkForBaby/milk_cart.php";</script>';
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

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <script>
    $(document).ready(function() {
      $("body").delegate("#btn_login", "click", function(event) {
        event.preventDefault();
        var acc = $("#exampleInputEmail1").val();
        var pass = $("#exampleInputPassword1").val();

        $.ajax({
            url: 'action.php',
            method: 'POST',
            data: {login_require:1, account:acc, password:pass},
            success: function(data){
              if (data == 1) {
                alert("Đăng nhập thành công");
                location.href = "http://localhost:8888/Project-MilkForBaby/milk_cart.php";
              }else{
                alert("Sai tên đăng nhập hoặc mật khẩu");
              }
            }
        })
      });
    });
  </script>

</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Đăng nhập</div>
      <div class="card-body">
        <form>
          <div class="form-group">
            <label for="exampleInputEmail1">Nhập địa chỉ Email</label>
            <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Nhập email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Mật khẩu</label>
            <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Mật khẩu">
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Nhớ mật khẩu</label>
            </div>
          </div>
          <!-- <button class="btn btn-primary btn-block" id="btn_login">Đăng nhập</button> -->
          <a class="btn btn-primary btn-block" href="#" id="btn_login">Đăng nhập</a>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.html">Đăng ký tài khoản</a>
          <a class="d-block small" href="forgot-password.html">Quên mật khẩu?</a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
