<?php  require ".././core/ketnoi.php";
if (!isset($_SESSION["user"]) || empty($_SESSION["user"])) {
    header("location: login.php");
}
$sql = "SELECT *,`order`.`id`as 'order_id' FROM `order` 
INNER JOIN `sanpham` ON `order`.`product_id`=`sanpham`.`id` 
INNER JOIN `user` ON `order`.`user_id`= `user`.`id`
WHERE `order`.`user_id` =".$_SESSION["user"]["id"]."";
$products = showDataAll($sql);
// echo"<pre>";
// var_dump($products); die;
$tong = 0;
$tamtinh = 0;
?>
<!-- <?php
    if(isset($_POST['btn_continue_step2']) && !empty($_POST)) {
        $errors = ['name' => '', 'address' => '', 'sdt' => '' ];
        extract($_REQUEST);
        $sql = "SELECT * FROM `hoadon` WHERE name='$name', address='$address', sdt='$sdt'";
        $result = showDataOnly($sql);
        if($name == "") {
            $errors['$name'] = " Mời nhập họ và tên";
        }
        var_dump($name); die;
    } 
?> -->
<?php require ".././layout/header.php";?>
<div id="content" class="container-fluid">
    <div class="row" style="padding-bottom: 30px">
        <div class="container">
            <div class="progress_new">
                <div class="pbarcart">
                    <div class="text">Giỏ hàng</div>
                    <div class="bar"></div>
                    <div class="circle "><i class="fa fa-shopping-cart" aria-hidden="true"></i></div>
                </div>
                <div class="pbarcart">
                    <div class="text">Địa chỉ giao hàng</div>
                    <div class="bar"></div>
                    <div class="circle active"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                </div>
                <div class="pbarcart">
                    <div class="text">Thanh toán</div>
                    <div class="bar"></div>
                    <div class="circle "><i class="fa fa-credit-card" aria-hidden="true"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div id="pay" class="row title_h3 pay">
        <div class="container">
            <!--<h3>Tiến hành thanh toán</h3>-->
            <div class="row">
                <div class="col-md-7 col-sm-7 pull-left col-xs-12">
                    <h5 style='padding-left: 5%'>Vui lòng nhập thông tin giao hàng</h5>
                    <form action="checkout.php" method="post">
                        <div class="pay_hidden_ts_main">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <p>Họ và tên:<span class="required">*</span></p>
                                    <input type="text" class="required_form" placeholder="" value="" name="name" />
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <p>Địa chỉ <span class="required">*</span></p>
                                    <input type="text" class="required_form" placeholder="" value="" name="address" />
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <p>Điện thoại <span class="required">*</span></p>
                                    <input type="number" class="required_form " name="sdt" value="" placeholder="" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 pay1_Dieuhuong">
                                <a id="but-cancel-cart" href="giohang.php" class="pull-left">&#60;&#60; Quay lại giỏ
                                    hàng</a>
                                <button id="but-checkout-continue-step2" type="submit" class="pull-right"
                                    name="btn_continue_step2" value="Thanh toán và giao hàng" style="background: black;
                                border: 2px solid #000;
                                padding: 8px 20px;
                                text-transform: uppercase;
                                letter-spacing: 1px;
                                font-size: 11px;
                                margin: 50px 0;
                                font-weight: bold;">Thanh toán và giao hàng</button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="col-md-5 col-sm-5 pull-right col-xs-12">
                    <div class="col-md-12">
                        <table width="100%">
                            <thead>
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th class="text-center">Số lượng</th>
                                    <th class="text-right">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products as $hoadon): ?>
                                <tr>
                                    <td style="padding-left: 7%;">
                                        <p><?= $hoadon["Tensp"] ?></p>
                                    </td>
                                    <td class="text-center"><?= $hoadon["quantity"] ?></td>
                                    <td class="text-right">
                                        <?= number_format($hoadon["Gia_sp"], 0, '', '.') ?><sup>VNĐ</sup></td>
                                </tr>

                                <!-- Đoạn tính tổng tiền sản phẩm -->
                                <?php   
                                        $tamtinh = $hoadon["Gia_sp"]*$hoadon['quantity'];
                                        $tong = $tong + $tamtinh;
                                ?>

                                <?php endforeach ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3">Tổng tiền hàng
                                        <b><?= number_format($tong, 0, '', '.') ?><sup>VNĐ</sup></b></td>
                                    <td></td>
                                </tr>
                            </tfoot>

                        </table>


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php require ".././layout/footer.php";?>