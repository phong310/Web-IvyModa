<?php require ".././layout/header.php";?>
<?php  require ".././core/ketnoi.php";
// $sql = "SELECT * FROM `tintuc` ORDER BY id DESC LIMIT 8";
$sql = "SELECT * FROM `tintuc` ORDER BY title DESC LIMIT 8";
$result = showDataAll($sql);
$sql = "SELECT * FROM `tintuc` ORDER BY content DESC LIMIT 8";
// $sql = "SELECT * FROM `tintuc`";
$result = showDataAll($sql);
?>


<div id="content" class="container-fluid" style="margin-top: 5px">
    <div id="news" class="row title_h3">
        <div class="container">
            <div class="row" style="margin-right: 85%">
                <div class="col-md-12" id="dieuhuong">
                    <ul class="list-inline">
                        <li><a href="trangchu.php">Trang chủ</a> <span>→</span></li>
                        <li><a href="tintuc.php" title="Tin tức">Tin tức</a> <span>→</span></li>
                    </ul>
                </div>
            </div>

            <h4 style="    
                text-align: center;
                font-size: 15px;
                font-weight: bold;
                text-transform: uppercase;
                color: #333;
                letter-spacing: 1px;
                margin-top: 20px;
                margin-bottom: 50px;">TIN TỨC</h4>


            <div class="row">
                <div class="col-md-9 col-sm-8 col-xs-12">
                    <h4>Những tin tức nổi bật</h4>
                    <ul class="list-unstyled">
                        <?php foreach($result as $new): ?>
                        <li>
                            <ul class="list-inline" style="display: flex;">
                                <li class="col-md-3 col-sm-4 col-xs-12"><img
                                        src="http://localhost/webivymoda1/admin/images/news/<?= $new["image"] ?>" alt="">
                                </li>
                                <li class="col-md-9 col-sm-8 col-xs-12">
                                    <h5><?= $new["title"] ?></h5>
                                    <div class="news_detail"><?= $new["content"]?></div>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </li>
                        <?php endforeach ?>
                    </ul>
                    <div id="phantrang" class="col-md-6 col-sm-6 text-right pull-right">
                        <ul class="list-inline">
                            <li><a href="#">&laquo;</a></li>
                            <li><a href="#" id="products_active_ts">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">&raquo;</a></li>
                            <li><a href="#2">Trang cuối</a></li>
                        </ul>

                    </div>
                </div>

                <div class="col-md-3 col-sm-4 hidden-xs">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            Danh mục
                        </div>
                        <div class="panel-body">
                            <ul>
                                <li><a href="#">Sự kiện thời
                                        trang</a></li>
                                <li><a href="#">Blog chia sẻ</a></li>
                                <li><a href="#">Tin nội bộ</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            Tin mới nhất
                        </div>
                        <div class="panel-body">
                            <ul>
                                <li><a href="#">Gợi ý mặc đẹp cho
                                        chàng cùng áo sơ mi unisex</a></li>
                                <li><a href="#">Bật mí 11 mẫu váy
                                        tiểu thư đẹp mà nàng không nên bỏ lỡ</a></li>
                                <li><a href="#">Làm mới phong
                                        cách cùng áo sơ mi xanh rêu thời thượng cho phái mạnh</a></li>
                                <li><a href="#">Gợi ý những mẫu đầm tết
                                        đẹp cho năm 2022</a></li>
                                <li><a href="#">Vẻ đẹp
                                        sành điệu cùng áo sơ mi nam tay ngắn họa tiết cho các quý ông</a></li>
                                <li><a href="#">13 Mẫu đầm hở vai siêu
                                        xinh chị em không nên bỏ lỡ</a></li>
                                <li><a href="#">Muôn kiểu thiết kế cổ
                                        áo sơ mi nam đẹp, độc đáo cho phái mạnh </a></li>
                                <li><a href="#">F5 phong cách cùng
                                        những mẫu đầm Hàn Quốc</a></li>
                                <li><a href="#">7 mẫu áo sơ mi xanh
                                        nam tính dành cho phái mạnh</a></li>
                                <li><a href="#">Top 7 mẫu áo sơ mi đỏ
                                        sành điệu cho phái mạnh</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            Liên hệ
                        </div>
                        <div class="panel-body">
                            <b>Địa chỉ:</b>
                            <p>Khoa công nghệ thông tin trường Đại học Điện Lực, Địa chỉ: cs1: 235 Hoàng Quốc Việt, Hà Nội, cs2: Tân Minh, Sóc Sơn, Hà Nội.</p>
                            <b>Email:</b>
                            <p>phamdinhphong12@gmail.com</p>
                            <b>Hotline:</b>
                            <p>0343061257</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require ".././layout/footer.php";?>