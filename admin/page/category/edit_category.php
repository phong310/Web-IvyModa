<?php  
require "../.././core/ketnoi.php";

// kiểm tra sự tồn tại của id sản phẩm trên url
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id=$_GET['id'];
        $sql = "SELECT * FROM `danhmuc` WHERE id='$id'";
        $cate = showDataOnly($sql);
            if ($cate == false){  
                header("location: quanly.php");
            }
    }
    else{
        header("location: quanly.php");
    }

    if (isset($_POST['btn-submit']) && !empty($_POST)) {
        $errors = ['ma_danhmuc' => '', 'ten_danhmuc' => ''];
        extract($_REQUEST);

        // validator data 
        if ($ma_danhmuc == "") {
            $errors['ma_danhmuc'] = " Mời nhập mã danh mục";
        }
        

        // upload database 
        if (!array_filter($errors)) {

            try {
                $sql="UPDATE `danhmuc` SET ma_danhmuc='".$ma_danhmuc."',ten_danhmuc='".$ten_danhmuc."' WHERE id='$id'";
                $result = $conn->query($sql);
                header("location: quanly.php");
            } catch (Exception $exc) {
                echo"Sửa thất bại!" . $exc->getMessage();
            }
        
        }
    
    }
?>
<?php require "../.././layout/header.php"; ?>
<title>Thêm mới danh mục</title>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-9">
            <div class="content-infor">
                <div class="content-heading">
                    <h3 class="content-title">Nhập các thông tin</h3>
                </div>
                <div class="content-body rounded">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="ma_danhmuc">Mã danh mục:</label>
                            <input type="text" name="ma_danhmuc" class="form-control"
                                value="<?= $cate["ma_danhmuc"] ?>" placeholder="Nhập mã danh mục"
                                > <label
                                style="color:red"><?= (isset($errors['ma_danhmuc']) ? $errors['ma_danhmuc'] : '') ?></label>
                        </div>
                        <div class="form-group">
                            <label for="ten_danhmuc">Tên danh mục:</label>
                            <input type="text" name="ten_danhmuc" class="form-control"
                                value="<?= $cate["ten_danhmuc"] ?>" placeholder="Nhập nội dung"
                                > <label
                                style="color:red"><?= (isset($errors['ten_danhmuc']) ? $errors['ten_danhmuc'] : '') ?></label>
                        </div>
                        
                        <button type="submit" name="btn-submit" class="btn btn-primary">Thêm mới</main></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require "../.././layout/footer.php";?>