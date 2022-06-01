<?php  
require "../.././core/ketnoi.php";
if (isset($_POST['btn-submit']) && !empty($_POST)) {
    $errors = ['Ten_sp' => '', 'Anh_sp' => '', 'price' => ''];
    extract($_REQUEST);

    // validator data 
    if ($Ten_sp == "") {
        $errors['Ten_sp'] = " Mời nhập họ và tên";
    }

    if (
        $_FILES['Anh_sp']['type'] === 'image/jpg' ||
        $_FILES['Anh_sp']['type'] === 'image/png' ||
        $_FILES['Anh_sp']['type'] === 'image/jpeg'
    ) {

        if ($_FILES['Anh_sp']['size'] <= 2097152 ) {
            move_uploaded_file($_FILES['Anh_sp']['tmp_name'], '../.././images/products/'.$_FILES['Anh_sp']['name']);
            $Anh_sp = $_FILES['Anh_sp']['name'];
        } 
        
        else {
          
            $errors['Anh_sp'] = " Ảnh kích thước không quá 2mb";
        }
    }
    else if( $_FILES['Anh_sp']['size']<=0){
        $errors['Anh_sp'] = " Mời chọn file ảnh";
    }
    else {
        $errors['Anh_sp'] = " Hệ thống chỉ nhận file .jpg .png .jpeg";
    }

    if($Gia_sp<0||is_numeric($Gia_sp)!=true||empty($Gia_sp)){
        $errors['Gia_sp'] = " Giá tiền không được số âm";
    }

    // upload database 
    if (!array_filter($errors)) {

        try {
            $sql = " INSERT INTO sanpham ( Tensp, Anh_sp, Gia_sp)
            VALUES ('".$Ten_sp."', '".$Anh_sp."', '".$Gia_sp."')";
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
<title>Thêm mới sản phẩm</title>
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
                            <label for="Tensp">Tên sản phẩm:</label>
                            <input type="text" name="Ten_sp" class="form-control"
                                value="<?php echo $_POST['Ten_sp'] ?? '' ?>" placeholder="Nhập tên sản phẩm"
                                required="required"> <label
                                style="color:red"><?= (isset($errors['Ten_sp']) ? $errors['Ten_sp'] : '') ?></label>
                        </div>
                        <div class="form-group">
                            <label for="Anh_sp">Ảnh sản phẩm</label>
                            <input type="file" name="Anh_sp" class="form-control" placeholder="Nhập ảnh sản phẩm"
                                required="required">
                            <label style="color:red"><?= (isset($errors['Anh_sp']) ? $errors['Anh_sp'] : '') ?></label>
                        </div>
                        <div class="form-group">
                            <label for="Gia_sp">Giá sản phẩm</label>
                            <input type="number" min="0" step="any" name="Gia_sp" class="form-control"
                                value="<?php echo $_POST['Gia_sp'] ?? '' ?>" placeholder="Nhập giá sản phẩm"
                                required="required">
                            <label style="color:red"><?= (isset($errors['Gia_sp']) ? $errors['Gia_sp'] : '') ?></label>
                        </div>
                        <button type="submit" name="btn-submit" class="btn btn-primary">Thêm sản phẩm</main></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require "../.././layout/footer.php";?>