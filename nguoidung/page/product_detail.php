<?php  require ".././core/ketnoi.php";
$id=$_GET['id'];
$sql = "SELECT * FROM `sanpham` WHERE id= $id";
$products = showDataOnly($sql);
if (isset($_POST['btn-submit']) && !empty($_POST)) {
    if (isset($_SESSION["user"]) && !empty($_SESSION["user"])) {
    
    extract($_REQUEST);
    
  
    $sql = "SELECT * FROM `order` WHERE product_id='$id'";
    $orderProduct = showDataOnly($sql);

    // kiểm tra sự tồn tại của sản phẩm tren db
           if ($orderProduct == false) {       
                // xử lý khi sản phẩm không tồn tại trên db  
                $sql = " INSERT INTO `order` ( product_id, user_id, quantity)
                VALUES ('".$id."', '".$_SESSION["user"]["id"]."', '".$_REQUEST['quantity']."')";
                $result = $conn->query($sql);  
                echo "thêm thành công";
            }
            else{
                // xử lý khi sản phẩm tồn tại trên db 
                $orderProduct["quantity"] = (int)$orderProduct["quantity"];
                $tong=$orderProduct["quantity"]+1;
                try {
                    
                    $sql = "UPDATE `order` SET `quantity` = $tong WHERE `order`.`product_id` = $id;";
                    $result = $conn->query($sql);
                    echo "update thành công";
                } catch (Exception $exc) {
                    echo"Sửa thất bại!" . $exc->getMessage();
                }
            }
    }
    else{
        header("location: login.php");
    }
   
  
}


?>
<?php require ".././layout/header.php";?>
<title>CHI TIẾT SẢN PHẨM</title>
<!----------------------------------------------product---------------------------------------------------------->
<section class="product">
    <div class="container">
        <div class="product-top row">
            <p>Trang chủ</p><span>&#10230;</span>
            <p><?= $products["Tensp"] ?></p>
        </div>
        <div class="product-content row">
            <div class="product-content-left row">
                <div class="product-content-left-big-img">
                    <img src="http://localhost/webivymoda1/admin/images/products/<?= $products["Anh_sp"] ?>" alt="">
                </div>
                <div class="product-content-left-small-img">
                    <img src="http://localhost/webivymoda1/admin/images/products/<?= $products["Anh_sp"] ?>" alt="">
                    <img src="http://localhost/webivymoda1/admin/images/products/<?= $products["Anh_sp"] ?>" alt="">
                    <img src="http://localhost/webivymoda1/admin/images/products/<?= $products["Anh_sp"] ?>" alt="">
                    <img src="http://localhost/webivymoda1/admin/images/products/<?= $products["Anh_sp"] ?>" alt="">
                </div>
            </div>
            <div class="product-content-right">
                <div class="product-content-right-name">
                    <h1><?= $products["Tensp"] ?></h1>
                    <p>MSP: 21E3016</p>
                </div>
                <div class="product-content-right-price">
                    <p><?= number_format($products["Gia_sp"], 0, '', ',') ?><sup>VNĐ</sup></p>
                </div>
                <div class="product-content-right-color">
                    <p><span style="font-weight: bold;">Màu sắc</span>: Nude <span style="color: red;">*</span></p>
                    <div class="product-content-right-color-img">
                        <img src="http://localhost/webivymoda1/public/img/images/004.webp" alt="">
                    </div>
                </div>
                <div class="product-content-right-size">
                    <p style="font-weight: bold;">Size:</p>
                    <div class="size">
                        <span>S</span>
                        <span>M</span>
                        <span>L</span>
                        <span>XL</span>
                        <span>XXL</span>
                    </div>
                </div>

                <form action="" method="post">
                    <div class="quantity">
                        <p style="font-weight: bold;">Số lượng:</p>
                        <input type="number" name="quantity" min="1" value="1">
                    </div>


                    <div class="product-content-right-button">
                        <button type="submit" name="btn-submit"><i class="fas fa-shopping-cart"></i>
                            <p id="muahang">
                                MUA HÀNG
                            </p>
                        </button>
                        <button>
                            <p>TÌM TẠI CỬA HÀNG</p>
                        </button>
                    </div>

                </form>




                <div class="product-content-right-icon">
                    <div class="product-content-right-icon-item">
                        <i class="fas fa-phone-alt"></i>
                        <p>Hotline</p>
                    </div>
                    <div class="product-content-right-icon-item">
                        <i class="far fa-comments"></i>
                        <p>Chat</p>
                    </div>
                    <div class="product-content-right-icon-item">
                        <i class="far fa-envelope"></i>
                        <p>Mail</p>
                    </div>
                </div>
                <div class="product-content-right-QR">
                    <img src="http://localhost/webivymoda1/public/img/images/qrcode2.webp" alt="">
                </div>
                <div class="product-content-right-bottom">
                    <div class="product-content-right-bottom-top">
                        &#8744;
                    </div>
                    <div class="product-content-right-bottom-content-big">
                        <div class="product-content-right-bottom-content-big-title row">
                            <div class="product-content-right-bottom-content-big-title-item chitiet">
                                <p>Chi tiết</p>
                            </div>
                            <div class="product-content-right-bottom-content-big-title-item baoquan">
                                <p>Bảo quản</p>
                            </div>
                            <div class="product-content-right-bottom-content-big-title-item">
                                <p>Tham khảo size</p>
                            </div>
                        </div>
                        <div class="product-content-right-bottom-content">
                            <div class="product-content-right-bottom-content-chitiet">
                                Quần lửng khaki ngang gối. Dáng Regular. Cạp có đỉa, phối chun co giãn 2 bên sườn. Có 2
                                túi phía trước và 2 túi có khuy cài phía sau. Cài phía trước bằng khóa kéo và
                                khuy.<br><br>

                                Thiết kế ấn tượng nhưng không kém phần ấn tượng cho nam giới diện mạo cuốn hút. Màu sắc
                                cơ bản, độ dài ngang gối, có thể linh hoạt phối hợp với nhiều trang phục khác nhau trong
                                mùa hè.<br><br>

                                Màu sắc: Nude - Xanh Tím Than
                            </div>
                            <div class="product-content-right-bottom-content-baoquan">
                                Chi tiết bảo quản sản phẩm : <br><br>

                                * Vải dệt kim : sau khi giặt sản phẩm phải được phơi ngang tránh bai dãn.<br><br>

                                * Vải voan , lụa , chiffon nên giặt bằng tay.<br><br>

                                * Vải thô , tuytsy , kaki không có phối hay trang trí đá cườm thì có thể giặt
                                máy.<br><br>

                                * Vải thô , tuytsy, kaki có phối màu tường phản hay trang trí voan , lụa , đá cườm thì
                                cần giặt tay.<br><br>

                                * Đồ Jeans nên hạn chế giặt bằng máy giặt vì sẽ làm phai màu jeans.Nếu giặt thì nên lộn
                                trái sản phẩm khi giặt , đóng khuy , kéo khóa, không nên giặt chung cùng đồ sáng màu ,
                                tránh dính màu vào các sản phẩm khác. <br><br>

                                * Các sản phẩm cần được giặt ngay không ngâm tránh bị loang màu , phân biệt màu và loại
                                vải để tránh trường hợp vải phai. Không nên giặt sản phẩm với xà phòng có chất tẩy mạnh
                                , nên giặt cùng xà phòng pha loãng.<br><br>

                                * Các sản phẩm có thể giặt bằng máy thì chỉ nên để chế độ giặt nhẹ , vắt mức trung bình
                                và nên phân các loại sản phẩm cùng màu và cùng loại vải khi giặt.<br><br>

                                * Nên phơi sản phẩm tại chỗ thoáng mát , tránh ánh nắng trực tiếp sẽ dễ bị phai bạc màu
                                , nên làm khô quần áo bằng cách phơi ở những điểm gió sẽ giữ màu vải tốt hơn.<br><br>

                                * Những chất vải 100% cotton , không nên phơi sản phẩm bằng mắc áo mà nên vắt ngang sản
                                phẩm lên dây phơi để tránh tình trạng rạn vải.<br><br>

                                * Khi ủi sản phẩm bằng bàn là và sử dụng chế độ hơi nước sẽ làm cho sản phẩm dễ ủi phẳng
                                , mát và không bị cháy , giữ màu sản phẩm được đẹp và bền lâu hơn. Nhiệt độ của bàn là
                                tùy theo từng loại vải. <br><br>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require ".././layout/footer.php";?>