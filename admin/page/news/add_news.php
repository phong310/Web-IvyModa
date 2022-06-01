<?php  
require "../.././core/ketnoi.php";
if (isset($_POST['btn-submit']) && !empty($_POST)) {
    $errors = ['title' => '', 'content' => '', 'image' => ''];
    extract($_REQUEST);

    // validator data 
    if ($title == "") {
        $errors['title'] = " Mời nhập tiêu đề ";
    }

    if (
        $_FILES['image']['type'] === 'image/jpg' ||
        $_FILES['image']['type'] === 'image/png' ||
        $_FILES['image']['type'] === 'image/jpeg'
    ) {

        if ($_FILES['image']['size'] <= 2097152 ) {
            move_uploaded_file($_FILES['image']['tmp_name'], '../.././images/news/'.$_FILES['image']['name']);
            $image = $_FILES['image']['name'];
        } 
        
        else {
          
            $errors['image'] = " Ảnh kích thước không quá 2mb";
        }
    }
    else if( $_FILES['image']['size']<=0){
        $errors['image'] = " Mời chọn file ảnh";
    }
    else {
        $errors['image'] = " Hệ thống chỉ nhận file .jpg .png .jpeg";
    }

    // upload database 
    if (!array_filter($errors)) {

        try {
            $sql = " INSERT INTO tintuc ( title, content, image)
            VALUES ('".$title."', '".$content."', '".$image."')";
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
<title>Thêm mới tin tức</title>
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
                            <label for="title">Tiêu đề tin tức:</label>
                            <input type="text" name="title" class="form-control"
                                value="<?php echo $_POST['title'] ?? '' ?>" placeholder="Nhập tiêu đề"
                                required="required"> <label
                                style="color:red"><?= (isset($errors['title']) ? $errors['title'] : '') ?></label>
                        </div>

                        <div class="form-group">
                            <label for="content">Nội dung:</label>
                            <input type="text" name="content" class="form-control"
                                value="<?php echo $_POST['content'] ?? '' ?>" placeholder="Nhập nội dung"
                                required="required"> <label
                                style="color:red"><?= (isset($errors['content']) ? $errors['content'] : '') ?></label>
                        </div>
                        
                        <div class="form-group">
                            <label for="image">Ảnh tin tức</label>
                            <input type="file" name="image" class="form-control" placeholder="Thêm ảnh"
                                required="required">
                            <label style="color:red"><?= (isset($errors['image']) ? $errors['image'] : '') ?></label>
                        </div>
                        
                        <button type="submit" name="btn-submit" class="btn btn-primary">Thêm tin tức</main></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require "../.././layout/footer.php";?>