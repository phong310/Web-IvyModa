<?php  require ".././core/ketnoi.php"; ?>
<?php 
if(isset($_POST['btn_continue_step2']) && !empty($_POST)) {
    extract($_REQUEST);
    $sql = "SELECT *,`order`.`id`as 'order_id' FROM `order` 
    INNER JOIN `sanpham` ON `order`.`product_id`=`sanpham`.`id` 
    INNER JOIN `user` ON `order`.`user_id`= `user`.`id`
    WHERE `order`.`user_id` =".$_SESSION["user"]["id"]."";
    $products = showDataAll($sql);
    echo '<pre>';
    var_dump($products);
    try {
        foreach  ($products as $product) {
            $sql = " INSERT INTO hoadon ( user_id, product_name, name, quantity, images, price, address, sdt)
            VALUES ('".$product['user_id']."', '".$product['Tensp']."', '".$name."', '".$product['quantity']."', '".$product['Anh_sp']."', '".$product['Gia_sp']."', '".$address."', '".$sdt."')";
            $result = $conn->query($sql);  
       }
       $sql = "DELETE FROM `order` WHERE `order`.`user_id` =".$_SESSION['user']['id']."";
       $result = $conn->query($sql);
       exit(header("Location: complete.php"));
    } catch (Exception $exc) {
        echo 'Thất bại';
    }
} else {
    header('location:thanhtoan.php');
} 
    

