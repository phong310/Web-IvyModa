<?php 
 require "../.././core/ketnoi.php";
  if(isset($_POST['submit']) && !empty($_POST)) {
      // thực hiện xử lý đăng nhập 
      $message = '';
      extract($_REQUEST);
      $sql = "SELECT * FROM user WHERE email='$email'";
      $user = showDataOnly($sql);
      if ($user != false) {           
        if (password_verify($password, $user['password'])) {
            $message = "Đăng nhập thành công!";
           // Xóa hết session
            session_destroy();
            $_SESSION["user"] = $user;          
            header("location: ../products/quanly.php");
        } else {
            $message = "Tên đăng nhập hoặc mật khẩu sai!";
        }
    } 
    else {
        $message = 'Tên đăng nhập hoặc mật khẩu sai!';
    }
    }
?>

<?php require "../.././layout/header.php"; ?>
<div class="container-fluid">
    <div class="col-6">
        <form method="POST" action="">
            <div class="form-group">
                <h1>ĐĂNG NHẬP</h1>
                <label for="email">Nhập tài khoản email </label>
                <input name="email"value="<?php echo $_POST['email'] ?? '' ?>" class="form-control" placeholder="Nhập email ..." required="required">
            </div>

            <div class="form-group">
                <label for="password">Nhập mật khẩu </label>
                <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu ..."
                    required="required">
                    <label style="color:red"><?= (isset($message) ? $message : '') ?></label>
            </div>
            <div class="d-flex justify-content-start">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Luôn đăng nhập </label>
                </div>
                <div style="margin-left: 100px;">
                    <a href="register.php">Đăng ký</a>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Đăng nhập</main></button>
        </form>
    </div>
</div>
<?php require "../.././layout/footer.php";?>