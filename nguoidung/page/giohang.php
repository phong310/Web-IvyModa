<?php  require ".././core/ketnoi.php";
if (!isset($_SESSION["user"]) || empty($_SESSION["user"])) {
    header("location: login.php");
}
$sql = "SELECT *,`order`.`id`as 'order_id' FROM `order` 
INNER JOIN `sanpham` ON `order`.`product_id`=`sanpham`.`id` 
INNER JOIN `user` ON `order`.`user_id`= `user`.`id`
WHERE `order`.`user_id` =".$_SESSION["user"]["id"]."";
$products = showDataAll($sql);
$intoMoney=0;
$grossProduct=0;
// echo"<pre>";
// var_dump(count($products)); die;
?>

<?php require ".././layout/header.php";?>
<div id="content" class="container-fluid" >
    <form name="frm_cart" id="frm_cart" method="post" action="" enctype="application/x-www-form-urlencoded">
        <div class="row" style="padding-bottom: 30px">
            <div class="container">
                <div class="progress_new">
                    <div class="pbarcart">
                        <div class="text">Giỏ hàng</div>
                        <div class="bar"></div>
                        <div class="circle active"><i class="fa fa-shopping-cart" aria-hidden="true"></i></div>
                    </div>
                    <div class="pbarcart">
                        <div class="text">Địa chỉ giao hàng</div>
                        <div class="bar"></div>
                        <div class="circle "><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                    </div>
                    <div class="pbarcart">
                        <div class="text">Thanh toán</div>
                        <div class="bar"></div>
                        <div class="circle "><i class="fa fa-credit-card" aria-hidden="true"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="cart" class="row title_h3">
            <div class="container">
                <!--<h3>Giỏ hàng của bạn</h3>-->
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th class="col-md-2 col-sm-2">Sản phẩm</th>
                                    <th class="col-md-2 col-sm-2 hidden-xs">Tên sản phẩm</th>
                                    <th class="col-md-1 col-sm-1">SL</th>
                                    <th class="col-md-1 col-sm-1">Thành tiền</th>
                                    <th class="col-md-1 col-sm-1">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products as $product): ?>
                                <?php 
                                     $totalMoney= $product["quantity"]*$product["Gia_sp"];
                                     $intoMoney+=$totalMoney;
                                     $grossProduct+=$product["quantity"];
                                ?>
                                <tr>
                                    <td><a href="product_detail.php?id=<?= $product["product_id"] ?>"><img
                                                title="<?= $product["Tensp"] ?>"
                                                src="http://localhost/webivymoda1/admin/images/products/<?= $product["Anh_sp"] ?>" /></a>
                                    </td>
                                    <td class="hidden-xs">
                                        <a href="product_detail.php?id=<?= $product["product_id"] ?>"
                                            title="<?= $product["Tensp"] ?>"><?= $product["Tensp"] ?>
                                        </a>
                                    </td>


                                    <td><input type="text" size="3" name="cart[154312][total]"
                                            value="<?= $product["quantity"] ?>" maxlength="1" readonly /> </td>
                                    <td><?= number_format($totalMoney, 0, '', '.') ?><sup>VNĐ</sup></sup>
                                        <span class="visible-xs">
                                        </span>
                                    </td>
                                    <td><a href="giohangController.php?del=<?= $product["order_id"] ?>"
                                            title="Xóa">x</a>
                                    </td>
                                </tr>
                                <?php endforeach  ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="col-md-12">
                            <h5>Tổng tiền giỏ hàng</h5>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Tổng sản phẩm</td>
                                        <td><?= $grossProduct ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tổng tiền hàng</td>
                                        <td><?= number_format($intoMoney, 0, '', '.') ?><sup>VNĐ</sup></td>
                                    </tr>
                                    <tr>
                                        <td>Thành tiền</td>
                                        <td><?= number_format($intoMoney, 0, '', '.') ?><sup>VNĐ</sup></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>Tạm tính</td>
                                        <td><?= number_format($intoMoney, 0, '', '.') ?><sup>VNĐ</sup></td>
                                    </tr>
                                </tfoot>

                            </table>

                            <p class="text-center">
                                <a href="products.php" id="but-checkout-continue">Tiếp tục mua sắm</a>
                                <a href="thanhtoan.php" id="but-checkout-step1">Thanh toán</a>
                            </p>
                            <div class="clearfix"></div>
                        

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div id="modal_sale" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:0; border: 0px">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        style="margin-top: 2px; margin-right: 10px">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="">
                    <a href="https://ivymoda.com/customer/login"><img style="margin: 0 auto"
                            src="https://pubcdn.ivymoda.com/images/sale30.png" class="img-responsive" /></a>
                </div>
            </div>
        </div>
    </div>
    <script>
    $(window).on('load', function() {
        //$('#modal_sale').modal('show');
    });
    </script>

</div>
<!--Footer-->
<?php require ".././layout/footer.php";?>