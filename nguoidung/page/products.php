<?php require ".././layout/header.php";?>
<?php  require ".././core/ketnoi.php";
$sql = "SELECT * FROM `sanpham` ORDER BY id DESC LIMIT 4";
$new_product = showDataAll($sql);
$sql = "SELECT * FROM `sanpham` ORDER BY Gia_sp ASC LIMIT 4";
$sale_product = showDataAll($sql);

?>

<body>
    <section class="cartegory">
        <div class="container">
            <div class="cartegory-top row" style="padding-left: 6%; color: #999999;">
                <p>Trang chủ</p><span>&#10230;</span>
                <p>Nữ</p><span>&#10230;</span>
                <p>Hàng nữ mới về</p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="cartegory-left" style="width: 20%; padding-left: 7%;" >
                    <ul>
                        <li class="cartegory-left-li"><a href="#">NỮ</a>
                            <ul>
                                <li><a href="">Hàng nữ mới về</a></li>
                                <li><a href="">OFFICE CHIC</a></li>
                                <li><a href="">INDOOR FUN</a></li>
                                <li><a href="">BEYOND TRENDY</a></li>
                            </ul>
                        </li>
                        <li class="cartegory-left-li"><a href="#">NAM</a>
                            <ul>
                                <li><a href="">Hàng nam mới về</a></li>
                                <li><a href="">NEW POLO FOR MEN</a></li>
                                <li><a href="">NATURE SOFT</a></li>
                                <li><a href="">SAFE ZONE</a></li>
                                <li><a href="">GIÀY NAM</a></li>
                                <li><a href="">PHỤ KIỆN NAM</a></li>
                            </ul>
                        </li>
                        <li class="cartegory-left-li"><a href="#">TRẺ EM</a>
                            <ul>
                                <li><a href="">Hàng trẻ em mới về</a></li>
                                <li><a href="">DRAW THE DREAM</a></li>
                            </ul>
                        </li>
                        <li class="cartegory-left-li"><a href="#">FINAL SALE</a>
                            <ul>
                                <li><a href="">Nữ</a></li>
                                <li><a href="">Nam</a></li>
                                <li><a href="">Trẻ em</a></li>
                            </ul>
                        </li>
                    </ul>

                </div>
                <div class="cartegory-right row">
                    <div class="cartegory-right-top-item">
                        <p style="padding-left: 5%;">HÀNG NỮ MỚI VỀ</p>
                    </div>
                    <div class="cartegory-right-top-item" >
                        <button><span>Bộ lọc</span><i class="fas fa-sort-down"></i></button>
                    </div>
                    <div class="cartegory-right-top-item" style="margin-right: -19%;">
                        <select name="" id="">
                            <option value="">Sắp xếp</option>
                            <option value="">Giá: cao đến thấp</option>
                            <option value="">Giá: thấp đến cao</option>
                        </select>
                    </div>
                    <div class="container">
                        <div class="cartegory-right row" style="margin:auto; margin-left: -7%; width: 140%;">
                            <div class="cartegory-right-content row">
                                <?php foreach ($new_product as $products): ?>
                                <div class="cartegory-right-content-item">
                                    <a href="product_detail.php?id=<?= $products["id"] ?>">
                                        <img src="http://localhost/webivymoda1/admin/images/products/<?= $products["Anh_sp"] ?>"
                                            alt="">
                                        <h1><?= $products["Tensp"] ?></h1>
                                        <p style="font-weight: bold;"><?= number_format($products["Gia_sp"], 0, '', ',') ?><sup>VNĐ</sup></p>
                                    </a>
                                </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <div class="cartegory-right row" style="margin:auto; margin-left: -7%; width: 140%;">
                            <div class="cartegory-right-top-item" style="margin-left: -67px; margin-top: 27px;">
                                <p style="color: red;">FINAL SALE</p>
                            </div>
                            <div class="cartegory-right-content row">
                                <?php foreach ($sale_product as $products): ?>
                                <div class="cartegory-right-content-item">
                                    <a href="product_detail.php?id=<?= $products["id"] ?>">
                                        <img src="http://localhost/webivymoda1/admin/images/products/<?= $products["Anh_sp"] ?>"
                                            alt="">
                                        <h1><?= $products["Tensp"] ?></h1>
                                        <p style="font-weight: bold;"><?=  number_format($products["Gia_sp"], 0, '', ',') ?><sup>VNĐ</sup></p>
                                    </a>
                                </div>
                                <?php endforeach ?>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="cartegory-right-bottom row">
                    <div class="cartegory-right-bottom-items">
                        <p>Hiển thị 2 <span>|</span>4 sản phẩm</p>
                    </div>
                    <div class="cartegory-right-bottom-items">
                        <p style="padding-left: 650px;"><span>&#171;</span>1 2 3 4 5<span>&#187;</span>Trang cuối</p>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </section>



</body>
<?php require ".././layout/footer.php";?>