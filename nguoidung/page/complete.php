<?php  require ".././core/ketnoi.php"; ?>
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
                    <div class="circle"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                </div>
                <div class="pbarcart">
                    <div class="text">Thanh toán</div>
                    <div class="bar"></div>
                    <div class="circle active"><i class="fa fa-credit-card" aria-hidden="true"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h1 style="border-bottom: none; text-align: center;">THANH TOÁN THÀNH CÔNG !</h1> 
        <p style="text-align: center;">Cảm ơn quý khách đã mua hàng tại hệ thống</p>      
        <button style="background: black;
                                border: 2px solid #000;
                                padding: 8px 20px;
                                text-transform: uppercase;
                                letter-spacing: 1px;
                                font-size: 11px;
                                margin: 3% 41%;
                                font-weight: bold;"><a id="but-cancel-cart" href="giohang.php" class="pull-left" style="color: white;">&#60;&#60; Quay lại giỏ hàng</a></button>
    </div>
    <?php require ".././layout/footer.php";?>