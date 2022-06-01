<?php  
require "../.././core/ketnoi.php";
if (isset($_POST['btn-submit']) && !empty($_POST)) {
    $errors = ['ma_danhmuc' => '', 'ten_danhmuc' => ''];
    extract($_REQUEST);

    // validator data 
    if ($ma_danhmuc == "") {
        $errors['ma_danhmuc'] = " Mời nhập mã danh mục";
    }

    // if (
    //     $_FILES['Anh_sp']['type'] === 'image/jpg' ||
    //     $_FILES['Anh_sp']['type'] === 'image/png' ||
    //     $_FILES['Anh_sp']['type'] === 'image/jpeg'
    // ) {

    //     if ($_FILES['Anh_sp']['size'] <= 2097152 ) {
    //         move_uploaded_file($_FILES['Anh_sp']['tmp_name'], '../.././images/products/'.$_FILES['Anh_sp']['name']);
    //         $Anh_sp = $_FILES['Anh_sp']['name'];
    //     } 
        
    //     else {
          
    //         $errors['Anh_sp'] = " Ảnh kích thước không quá 2mb";
    //     }
    // }
    // else if( $_FILES['Anh_sp']['size']<=0){
    //     $errors['Anh_sp'] = " Mời chọn file ảnh";
    // }
    // else {
    //     $errors['Anh_sp'] = " Hệ thống chỉ nhận file .jpg .png .jpeg";
    // }

    // if($Gia_sp<0||is_numeric($Gia_sp)!=true||empty($Gia_sp)){
    //     $errors['Gia_sp'] = " Giá tiền không được số âm";
    // }

    // upload database 
    if (!array_filter($errors)) {

        try {
            $sql = " INSERT INTO danhmuc ( ma_danhmuc, ten_danhmuc )
            VALUES ('".$ma_danhmuc."', '".$ten_danhmuc."')";
             $result = $conn->query($sql);
            // echo"Thêm mới thành công!";
            header("location:quanly.php");
        } catch (Exception $exc) {
            echo"Thêm mới thất bại!" . $exc->getMessage();
        }
        $conn->close();
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
                            <label for="ma_danhmuc">Mã danh mục: </label>
                            <input type="text" name="ma_danhmuc" class="form-control"
                                value="<?php echo $_POST['ma_danhmuc'] ?? '' ?>" placeholder="Nhập mã danh mục"
                                required="required"> <label
                                style="color:red"><?= (isset($errors['ma_danhmuc']) ? $errors['ma_danhmuc'] : '') ?></label>
                        </div>
                        <div class="form-group">
                            <label for="ten_danhmuc">Tên danh mục: </label>
                            <input type="text" name="ten_danhmuc" class="form-control"
                                value="<?php echo $_POST['ten_danhmuc'] ?? '' ?>" placeholder="Nhập tên danh mục"
                                required="required"> <label
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