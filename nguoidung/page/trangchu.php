<?php  require ".././core/ketnoi.php";
// $sql = "SELECT * FROM `sanpham` ORDER BY id DESC LIMIT 4";
// $new_product = showDataAll($sql);
// $sql = "SELECT * FROM `sanpham` ORDER BY Gia_sp ASC LIMIT 4";
// $sale_product = showDataAll($sql);

?>
<?php require ".././layout/header.php";?>

<title>DANH SÁCH SẢN PHẨM</title>
<section id="Slider">
    <div class="aspect-ratio-169">
        <img src="http://localhost/webivymoda1/public/img/images/ivymoda1.webp">
        <img src="http://localhost/webivymoda1/public/img/images/ivymoda2.jpg">
        <img src="http://localhost/webivymoda1/public/img/images/ivymoda3.jpg">
        <img src="http://localhost/webivymoda1/public/img/images/ivymoda4.webp">
    </div>
    <div class="dot-container">
        <div class="dot active"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
    </div>
</section>
<!-- <div class="container">
    <div class="cartegory-right row" style="margin:auto;padding-right: 3%;">
        <div class="cartegory-right-top-item" style="text-align: center; margin: 10px 0px;">
            <p>HÀNG NỮ MỚI VỀ</p>
        </div>
        <div class="cartegory-right-content row">
            <?php foreach ($new_product as $products): ?>
            <div class="cartegory-right-content-item">
                <a href="product_detail.php?id=<?= $products["id"] ?>">
                    <img src="http://localhost/webivymoda/admin/images/products/<?= $products["Anh_sp"] ?>" alt="">
                    <h1><?= $products["Tensp"] ?></h1>
                    <p><?= number_format($products["Gia_sp"], 0, '', ',') ?><sup>VNĐ</sup></p>
                </a>
            </div>
            <?php endforeach ?>
        </div>
    </div>
    <div class="cartegory-right row" style="margin:auto;padding-right: 3%;">
        <div class="cartegory-right-top-item" style="text-align: center; margin: 10px 0px;">
            <p>HÀNG giảm giá</p>
        </div>
        <div class="cartegory-right-content row">
            <?php foreach ($sale_product as $products): ?>
            <div class="cartegory-right-content-item">
                <a href="product_detail.php?id=<?= $products["id"] ?>">
                    <img src="http://localhost/webivymoda/admin/images/products/<?= $products["Anh_sp"] ?>" alt="">
                    <h1><?= $products["Tensp"] ?></h1>
                    <p><?=  number_format($products["Gia_sp"], 0, '', ',') ?><sup>VNĐ</sup></p>
                </a>
            </div>
            <?php endforeach ?>
        </div>
    </div>

</div>
</div> -->

<?php require ".././layout/footer.php";?>