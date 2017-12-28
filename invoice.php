<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <p><br></p>
        <div class="panel panel-default">
              <div class="panel-body">
                    <div class="row">
                            <div class="col-md-6">
                                <div class="bill-to">
                                    <p class="h4 mb-xs text-dark text-semibold"><strong>Milk For Baby</strong></p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="bill-data text-right">
                                    <p class="mb-none">
                                        <span class="text-dark">Ngày lập:</span>
                                        <span class="value"><?php echo date("M d Y"); ?></span>
                                    </p>
                                    <p class="mb-none">
                                        <span class="text-dark">Ngày hạn:</span>
                                        <span class="value"><?php echo date("M d Y"); ?></span>
                                    </p>
                                    
                                 </div>
                            </div>
                        </div>

                    <div class="table-responsive">
                        <table class="table invoice-items">
                            <thead>
                                <tr class="h5 text-dark">
                                    <th id="cell-id" class="text-semibold">STT</th>
                                    <th id="cell-item-name" class="text-semibold">Sản phẩm</th>
                                    <th id="cell-item-quantity" class="text-semibold">Số lượng</th>
                                    <th id="cell-item-price" class="text-semibold">Đơn giá</th>

                                    <th id="cell-total-price" class="text-center text-semibold">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="prodinv"></tr>
                                <tr id="prodinv">
                                    <td>ID</td>
                                    <td class="text-dark">Product/Service Name</td>
                                    <td class="text-dark">1</td>
                                    <td class="text-dark">50,000</td>
                                    <td class="text-center amount">Rs 100.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="row" style="border-top: 2px solid #e9ecef; margin: 0px; padding-top: 10px">
                        <div class="col-lg-4 col-md-3 col-sm-4"></div>
                        <div class="col-lg-5 col-md-6 col-sm-6">
                             <h3> Tổng tiền: <span class="amount">10,000,000,000 VNĐ</span> </h3>
                        </div>
                        
                    </div>
                   
              </div>
    </div>
    </div>
</body>
</html>