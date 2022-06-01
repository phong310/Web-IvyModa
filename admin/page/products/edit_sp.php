<?php  
require "../.././core/ketnoi.php";

// kiểm tra sự tồn tại của id sản phẩm trên url
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id=$_GET['id'];
        $sql = "SELECT * FROM `sanpham` WHERE id='$id'";
        $products = showDataOnly($sql);
            if ($products == false){  
                header("location: quanly.php");
            }
    }
    else{
        header("location: quanly.php");
    }

    if (isset($_POST['btn-submit']) && !empty($_POST)) {
        $errors = ['Ten_sp' => '', 'Anh_sp' => '', 'price' => ''];
        extract($_REQUEST);

        // validator data 
        if ($Ten_sp == "") {
            $errors['Ten_sp'] = " Mời nhập họ và tên";
        }
        if( $_FILES['Anh_sp']['size']>0){
            if (
                $_FILES['Anh_sp']['type'] === 'image/jpg' ||
                $_FILES['Anh_sp']['type'] === 'image/png' ||
                $_FILES['Anh_sp']['type'] === 'image/jpeg'
            ) {
        
                if ($_FILES['Anh_sp']['size'] <= 2097152 ) {
                    unlink("../.././images/products/".$products["Anh_sp"]);
                    move_uploaded_file($_FILES['Anh_sp']['tmp_name'], '../.././images/products/'.$_FILES['Anh_sp']['name']);
                    $Anh_sp = $_FILES['Anh_sp']['name'];
                } 
                
                else {
                
                    $errors['Anh_sp'] = " Ảnh kích thước không quá 2mb";
                }
            }
            else {
                $errors['Anh_sp'] = " Hệ thống chỉ nhận file .jpg .png .jpeg";
            }
        }
        else{
            $Anh_sp = $products["Anh_sp"];
        }
    
        if($Gia_sp<0||is_numeric($Gia_sp)!=true||empty($Gia_sp)){
            $errors['Gia_sp'] = " Giá tiền không được số âm";
        }

        // upload database 
        if (!array_filter($errors)) {

            try {
                $sql="UPDATE `sanpham` SET Tensp='".$Ten_sp."',Anh_sp='".$Anh_sp."',Gia_sp='".$Gia_sp."' WHERE id='$id'";
                $result = $conn->query($sql);
                header("location: quanly.php");
            } catch (Exception $exc) {
                echo"Sửa thất bại!" . $exc->getMessage();
            }
        
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
                                value="<?= $products["Tensp"] ?>" placeholder="Nhập tên sản phẩm"
                                > <label
                                style="color:red"><?= (isset($errors['Ten_sp']) ? $errors['Ten_sp'] : '') ?></label>
                        </div>
                        <div class="form-group">
                            <label for="Anh_sp">Ảnh sản phẩm</label>
                            <img src="../.././images/products/<?= $products["Anh_sp"] ?>" alt="" style="width:80px">
                            <input type="file" name="Anh_sp" class="form-control" placeholder="Nhập ảnh sản phẩm"
                               >
                            <label style="color:red"><?= (isset($errors['Anh_sp']) ? $errors['Anh_sp'] : '') ?></label>
                        </div>
                        <div class="form-group">
                            <label for="Gia_sp">Giá sản phẩm</label>
                            <input type="number" min="0" step="any" name="Gia_sp" class="form-control"
                                value="<?= $products['Gia_sp'] ?? '' ?>" placeholder="Nhập giá sản phẩm"
                                >
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