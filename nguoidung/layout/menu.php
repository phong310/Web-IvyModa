<header>
    <div class="logo">
        <a href="trangchu.php"><img src="http://localhost/webivymoda1/public/img/images/logo.webp"></a>
    </div>
    <div class="menu">
        <li><a href="">NỮ</a>
            <ul class="Sub-Menu">
                <li><a href="products.php">Hàng nữ mới về</a></li>
                <li><a href="">Office Chic</a></li>
                <li><a href="">Indoor Fun</a></li>
                <li><a href="">Beyond Trendy</a></li>
                <li><a href="">ÁO</a>
                    <ul>
                        <li><a href="">Áo kiểu</a></li>
                        <li><a href="">Áo croptop</a></li>
                        <li><a href="">Áo vest nữ</a></li>
                        <li><a href="">Áo peplum</a></li>
                        <li><a href="">Áo thun nữ</a></li>
                        <li><a href="">Áo sơ mi nữ</a></li>
                    </ul>
                </li>
                <li><a href="">QUẦN NỮ</a>
                    <ul>
                        <li><a href="">Quần jean nữ</a>
                        <li><a href="">Quần lửng/short nữ</a>
                        <li><a href="">Quần dài nữ</a>
                    </ul>
                </li>
                <li><a href="">ĐẦM NỮ</a>
                    <ul>
                        <li><a href="">Đầm</a>
                        <li><a href="">Đầm maxi</a>
                        <li><a href="">Đầm thun</a>
                    </ul>
                </li>
            </ul>



        </li>
     
        <li><a href="">NAM</a></li>
        <li><a href="">TRẺ EM</a></li>
        <li><a href="" style="color: red;">FINAL SALE</a></li>
        <li><a href="">BỘ SƯU TẬP</a></li>
        <li><a href="tintuc.php">TIN TỨC</a></li>
        <li><a href="../../html/contact.html">LIÊN HỆ</a></li>
        <li><a href="../../admin/page/account/login.php">ADMIN</a></li>
      
    </div>
    <div class="others">
        <li>
            <form action="sreach.php" method="get">
                <input type="text" value=" <?= (isset($_GET['sreach']) ? $_GET['sreach'] : '') ?>" name="sreach" placeholder="Tìm kiếm">
                <i type="submit" class="fas fa-search"></i>
            </form>
           
        </li>


        <li><a class="fa fa-paw" href=""></a></li>
        <li>
            <?php if(isset($_SESSION["user"]) && !empty($_SESSION["user"])): ?>
            <a class="fas fa-sign-out-alt" href="http://localhost/webivymoda1/nguoidung/page/logout.php"></a>
            <?php else : ?>
            <a class="fa fa-user" href="http://localhost/webivymoda1/nguoidung/page/login.php"></a>
            <?php endif ?>
        </li>
        <li><a class="fa fa-shopping-bag" href="giohang.php"></a></li>
    </div>
</header>