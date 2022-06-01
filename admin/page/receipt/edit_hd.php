<?php  
require "../.././core/ketnoi.php";

// kiểm tra sự tồn tại của id sản phẩm trên url
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id=$_GET['id'];
        $sql = "SELECT * FROM `hoadon` WHERE id='$id'";
        $hoadon = showDataOnly($sql);
            if ($hoadon == false){  
                header("location: quanly.php");
            }
    }
    else{
        header("location: quanly.php");
    }

    if (isset($_POST['btn-submit']) && !empty($_POST)) {
        $errors = ['name' => '', 'address' => '', 'sdt' => '', 'product_name' => '', 'images' => '', 'quantity' => '', 'price' => ''];
        extract($_REQUEST);

        // validator data 
        if ($name == "") {
            $errors['name'] = " Mời nhập tin tức";
        }
        if( $_FILES['images']['size']>0){
            if (
                $_FILES['images']['type'] === 'image/jpg' ||
                $_FILES['images']['type'] === 'image/png' ||
                $_FILES['images']['type'] === 'image/jpeg'
            ) {
        
                if ($_FILES['images']['size'] <= 2097152 ) {
                    unlink("../.././images/products/".$hoadon["images"]);
                    move_uploaded_file($_FILES['images']['tmp_name'], '../.././images/products/'.$_FILES['images']['name']);
                    $image = $_FILES['images']['name'];
                } 
                
                else {
                
                    $errors['images'] = " Ảnh kích thước không quá 2mb";
                }
            }
            else {
                $errors['images'] = " Hệ thống chỉ nhận file .jpg .png .jpeg";
            }
        }
        else{
            $images = $hoadon["images"];
        }

        // upload database 
        if (!array_filter($errors)) {

            try {
                $sql="UPDATE `hoadon` SET name='".$name."',address='".$address."',sdt='".$sdt."', product_name='".$product_name."', images='".$images."', quantity='".$quantity."', price='".$price."' WHERE id='$id'";
                $result = $conn->query($sql);
                header("location: quanly.php");
            } catch (Exception $exc) {
                echo"Sửa thất bại!" . $exc->getMessage();
            }
        
        }
    
    }
?>
<?php require "../.././layout/header.php"; ?>
<title>Thêm mới hóa đơn</title>
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
                            <label for="name">Tên khác hàng:</label>
                            <input type="text" name="name" class="form-control"
                            value="<?= $hoadon["name"] ?>" placeholder="Nhập tên khách hàng"
                                > <label
                                style="color:red"><?= (isset($errors['name']) ? $errors['name'] : '') ?></label>
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ:</label>
                            <input type="text" name="address" class="form-control"
                                value="<?= $hoadon["address"] ?>" placeholder="Nhập nội dung"
                                > <label
                                style="color:red"><?= (isset($errors['address']) ? $errors['address'] : '') ?></label>
                        </div>
                        <div class="form-group">
                            <label for="sdt">SĐT:</label>
                            <input type="text" name="sdt" class="form-control"
                                value="<?= $hoadon["sdt"] ?>" placeholder="Nhập nội dung"
                                > <label
                                style="color:red"><?= (isset($errors['sdt']) ? $errors['sdt'] : '') ?></label>
                        </div>
                        <div class="form-group">
                            <label for="product_name">Tên sản phẩm:</label>
                            <input type="text" name="product_name" class="form-control"
                                value="<?= $hoadon["product_name"] ?>" placeholder="Nhập nội dung"
                                > <label
                                style="color:red"><?= (isset($errors['product_name']) ? $errors['product_name'] : '') ?></label>
                        </div>
                        <div class="form-group">
                            <label for="images">Ảnh sản phẩm</label>
                            <img src="../.././images/products/<?= $hoadon["images"] ?>" alt="" style="width:80px">
                            <input type="file" name="images" class="form-control" placeholder="Nhập ảnh sản phẩm">
                            <label style="color:red"><?= (isset($errors['images']) ? $errors['images'] : '') ?></label>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Số lượng:</label>
                            <input type="text" name="quantity" class="form-control"
                                value="<?= $hoadon["quantity"] ?>" placeholder="Nhập nội dung"
                                > <label
                                style="color:red"><?= (isset($errors['quantity']) ? $errors['quantity'] : '') ?></label>
                        </div>
                        <div class="form-group">
                            <label for="price">Giá:</label>
                            <input type="text" name="price" class="form-control"
                                value="<?= $hoadon["price"] ?>" placeholder="Nhập nội dung"
                                > <label
                                style="color:red"><?= (isset($errors['price']) ? $errors['price'] : '') ?></label>
                        </div>
                        <button type="submit" name="btn-submit" class="btn btn-primary">Thêm hóa đơn</main></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require "../.././layout/footer.php";?>