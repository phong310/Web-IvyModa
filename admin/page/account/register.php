<?php require "../.././core/ketnoi.php";
  if(isset($_POST['submit']) && !empty($_POST)) {
      // thực hiện xử lý đăng nhập 
      $errors = ['username' => '', 'email' => '', 'password' => ''];
      $pattern = ['password' => '','email' => ''];
      // chuẩn hóa dữ liệu theo regex
      // https://www.regextester.com/93886
      $pattern['email'] = "/^[a-z][a-z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/";
      extract($_REQUEST);
      $sql = "SELECT * FROM `user` WHERE email='$email'";
      $result = showDataOnly($sql);
    // validator data 
      if ($username == "") {
        $errors['username'] = " Mời nhập họ và tên";
    }
    if ($email == "") {
        $errors["email"] = "Vui lòng nhập email";
    }
    else if (preg_match($pattern['email'], $email) == 0) {// nếu = 0 =>false
        $errors['email'] = "Nhap email ko đúng định dạng";
    }
    else if(!empty($result)){
        $errors["email"] = "Email đã tồn tại";
    }
    if ($password == "") {
        $errors["password"] = "Vui lòng nhập password";
    }
    elseif (strlen($password) < '8') {
        $errors['password'] = "Mật khẩu phải chứa ít nhất 8 kí tự!";
    }
    else if ($password != $repassword) {
        $errors["password"] = "Password xác nhận không đúng";
    }
    if (!array_filter($errors)) {

        try {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql = " INSERT INTO user ( username, email, password)
            VALUES ('".$username."', '".$email."', '".$password."')";
             $result = $conn->query($sql);
             exit(header("Location: login.php"));
        } catch (Exception $exc) {
            echo"Thêm mới thất bại!" . $exc->getMessage();
        }
        $conn->close();
    }
  }
  
?>
<?php   require "../.././layout/header.php";?> 
<div class="container-fluid">
    <form method="POST" action="">
        <div class="form-group">
            <h1>ĐĂNG KÝ</h1>
            <label for="username">Tên tài khoản </label>
            <input name="username" value="<?php echo $_POST['username'] ?? '' ?>" class="form-control">
            <label style="color:red"><?= (isset($errors['username']) ? $errors['username'] : '') ?></label>
        </div>
        <div class="form-group">
            <label for="email">Nhập email </label>
            <input type="email" name="email" value="<?php echo $_POST['email'] ?? '' ?>" class="form-control">
            <label style="color:red"><?= (isset($errors['email']) ? $errors['email'] : '') ?></label>

        </div>
        <div class="form-group">
            <label for="password">Nhập mật khẩu </label>
            <input type="password" name="password" class="form-control">
            <label style="color:red"><?= (isset($errors['password']) ? $errors['password'] : '') ?></label>
        </div>
        <div class="form-group">
            <label for="repassword">Nhập lại mật khẩu </label>
            <input type="password" name="repassword" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Đăng ký</main></button>
    </form>
</div>
<?php require "../.././layout/footer.php";?>