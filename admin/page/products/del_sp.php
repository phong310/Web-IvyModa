<?php  
require "../.././core/ketnoi.php";
// kiểm tra sự tồn tại của id sản phẩm trên url
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id=$_GET['id'];
    $sql = "SELECT * FROM `sanpham` WHERE id='$id'";
    $products = showDataOnly($sql);
        if ($products != false){  
            try {
                $sql="DELETE FROM `sanpham` WHERE id='$id'";
                $result = $conn->query($sql);
                header("location: quanly.php");
            } catch (Exception $exc) {
                echo"Sửa thất bại!" . $exc->getMessage();
            }
        }
}
if (isset($_POST['btn_delete']) && !empty($_POST)){
    extract($_REQUEST);
  
    if(is_array($id)){
        foreach ($id as $ma) {
            try {
                $sql = "DELETE FROM `sanpham` WHERE id='$ma'";
                $result = $conn->query($sql);
                header("location: quanly.php");
            } catch (Exception $exc) {
                echo"Sửa thất bại!" . $exc->getMessage();
            }
           
        }
    }
}
header("location: quanly.php");