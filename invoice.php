<?php 
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/shopping-cart.css">
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</head>
<body onload="window.print()">
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
                            <?php
                                if(isset($_SESSION['checkout_product'])){
                                    $i = 1;
                                    echo '<tr id="prodinv">';
                                    foreach($_SESSION['checkout_product'] as $key => $value)
                                    {
                                        echo '
                                        <td>'.$i.'</td>
                                        <td class="text-dark">'.$_SESSION['checkout_product'][$key]['pro_name'].'</td>
                                        <td class="text-dark">'.$_SESSION['checkout_product'][$key]['pro_qty'].'</td>
                                        <td class="text-dark">'.number_format($_SESSION['checkout_product'][$key]['pro_price'], 0, ".", ",").' VNĐ</td>
                                        <td class="text-dark">'.number_format($_SESSION['checkout_product'][$key]['pro_total'], 0, ".", ",").' VNĐ</td>';
                                        echo '</tr>';
                                        $i++;
                                    }
                                }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
                
                <div class="row" style="border-top: 2px solid #e9ecef; margin: 0px; padding-top: 10px">
                    <div class="col-lg-4 col-md-3 col-sm-4"></div>
                    <div class="col-lg-5 col-md-6 col-sm-6">
                        <div class="row_total">
                            <h4 col-lg-3> Tổng tiền: </h4>
                            <h5 col-lg-9>
                                <span class="amount">
                                    <?php
                                        echo number_format($_SESSION['checkout_total']['bill_subtotal'], 0, ".", ","); 
                                        echo ' VNĐ';
                                    ?>
                                </span>
                            </h5>
                        </div>

                        <div class="row_total">
                            <h4> Khách hàng phải trả: </h4>
                            <h5>
                                <span class="amount">
                                    <?php 
                                        echo number_format($_SESSION['checkout_total']['bill_total'], 0, ".", ","); 
                                        echo ' VNĐ';
                                    ?>
                                </span>
                            </h5>
                        </div>

                        <div class="row_total">
                            <h4> Số tiền khách đưa: </h4>
                            <h5>
                                <span class="amount">
                                    <?php 
                                        echo number_format($_SESSION['checkout_total']['bill_total_customer'], 0, ".", ","); 
                                        echo ' VNĐ';
                                    ?>
                                </span> 
                            </h5>
                        </div>

                        <div class="row_total">
                            <h4> Tiền thừa: </h4>
                            <h5>
                                <span class="amount">
                                    <?php 
                                        echo number_format($_SESSION['checkout_total']['bill_excess'], 0, ".", ","); 
                                        echo ' VNĐ';
                                    ?>
                                </span> 
                            </h5>
                        </div>
                    
                    </div>
                </div>

                <?php
                    unset($_SESSION['checkout_product']);
                    unset($_SESSION['checkout_total']);
                ?>
                
            </div>
    </div>
    </div>
</body>
</html>