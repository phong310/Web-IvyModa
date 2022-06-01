<?php  require ".././core/ketnoi.php";
  if(isset($_GET['sreach']) && !empty($_GET['sreach'])) {
    extract($_REQUEST);
    $sql = "SELECT * FROM `sanpham` WHERE Tensp LIKE '%$sreach%'";
    $products = showDataAll($sql);
   // var_dump(count($products)); die;
    }
    else{
        header("location: trangchu.php");
    }

    

?>

<?php require ".././layout/header.php";?>



<div class="container" style="margin-top: 140px">
    <?php if(count($products)>=1): ?>
    <div class="row">
        <div class="cartegory-left">
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
                <p>HÀNG NỮ MỚI VỀ</p>
            </div>
            <div class="cartegory-right-top-item">
                <button><span>Bộ lọc</span><i class="fas fa-sort-down"></i></button>
            </div>
            <div class="cartegory-right-top-item">
                <select name="" id="">
                    <option value="">Sắp xếp</option>
                    <option value="">Giá: cao đến thấp</option>
                    <option value="">Giá: thấp đến cao</option>
                </select>
            </div>
            <div class="cartegory-right-content row">
                <?php foreach ($products as $product): ?>
                <div class="cartegory-right-content-item">

                    <img src="http://localhost/webivymoda/admin/images/products/<?= $product["Anh_sp"] ?>" alt="">
                    <h1><a href="product.html"><?= $product["Tensp"] ?></a></h1>
                    <p><?= number_format($product["Gia_sp"], 0, '', ',') ?><sup>VNĐ</sup></p>
                </div>
                <?php endforeach ?>

            </div>

            <div class="cartegory-right-bottom row">
                <div class="cartegory-right-bottom-items">
                    <p>Hiển thị 2 <span>|</span>4 sản phẩm</p>
                </div>
                <div class="cartegory-right-bottom-items">
                    <p><span>&#171;</span>1 2 3 4 5<span>&#187;</span>Trang cuối</p>
                </div>
            </div>

        </div>
    </div>
    <?php else : ?>
        <h4 style="text-align: center;" >
        <p style="color:red" >HIỆN KHÔNG TÌM CÓ SẢN PHẨM BẠN CẦN TÌM</p>
    </h4> 
    <?php endif ?>
</div>

<!--Footer-->
<?php require ".././layout/footer.php";?>