<?php  
require "../.././core/ketnoi.php";

// kiểm tra sự tồn tại của id sản phẩm trên url
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id=$_GET['id'];
        $sql = "SELECT * FROM `tintuc` WHERE id='$id'";
        $news = showDataOnly($sql);
            if ($news == false){  
                header("location: quanly.php");
            }
    }
    else{
        header("location: quanly.php");
    }

    if (isset($_POST['btn-submit']) && !empty($_POST)) {
        $errors = ['title' => '', 'content' => '', 'image' => ''];
        extract($_REQUEST);

        // validator data 
        if ($title == "") {
            $errors['title'] = " Mời nhập tin tức";
        }
        if( $_FILES['image']['size']>0){
            if (
                $_FILES['image']['type'] === 'image/jpg' ||
                $_FILES['image']['type'] === 'image/png' ||
                $_FILES['image']['type'] === 'image/jpeg'
            ) {
        
                if ($_FILES['image']['size'] <= 2097152 ) {
                    unlink("../.././images/news/".$news["image"]);
                    move_uploaded_file($_FILES['image']['tmp_name'], '../.././images/news/'.$_FILES['image']['name']);
                    $image = $_FILES['image']['name'];
                } 
                
                else {
                
                    $errors['image'] = " Ảnh kích thước không quá 2mb";
                }
            }
            else {
                $errors['image'] = " Hệ thống chỉ nhận file .jpg .png .jpeg";
            }
        }
        else{
            $image = $news["image"];
        }

        // upload database 
        if (!array_filter($errors)) {

            try {
                $sql="UPDATE `tintuc` SET title='".$title."',image='".$image."',content='".$content."' WHERE id='$id'";
                $result = $conn->query($sql);
                header("location: quanly.php");
            } catch (Exception $exc) {
                echo"Sửa thất bại!" . $exc->getMessage();
            }
        
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
                            <label for="title">Tiêu đề:</label>
                            <input type="text" name="title" class="form-control"
                                value="<?= $news["title"] ?>" placeholder="Nhập tiêu đề"
                                > <label
                                style="color:red"><?= (isset($errors['title']) ? $errors['title'] : '') ?></label>
                        </div>
                        <div class="form-group">
                            <label for="content">Nội dung:</label>
                            <input type="text" name="content" class="form-control"
                                value="<?= $news["content"] ?>" placeholder="Nhập nội dung"
                                > <label
                                style="color:red"><?= (isset($errors['content']) ? $errors['content'] : '') ?></label>
                        </div>
                        <div class="form-group">
                            <label for="image">Ảnh tin tức</label>
                            <img src="../.././images/news/<?= $news["image"] ?>" alt="" style="width:80px">
                            <input type="file" name="image" class="form-control" placeholder="Nhập ảnh sản phẩm"
                               >
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