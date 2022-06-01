<?php 
require ".././core/ketnoi.php";
  if(isset($_POST['submit']) && !empty($_POST)) {
      // thực hiện xử lý đăng nhập 
      $message = '';
      extract($_REQUEST);
      $sql = "SELECT * FROM user WHERE email='$email'";
      $user = showDataOnly($sql);
      
      if ($user != false) {  
        if (password_verify($password, $user['password'])) {
            // var_dump(password_verify($password, $user['password'])); die;     
            $message = "Đăng nhập thành công!";
           // Xóa hết session
           $_SESSION['user'] = $user;   
              
             header("location: trangchu.php");
          
        } else {
            $message = "Tên đăng nhập hoặc mật khẩu sai!";
        }
    } 
    else {
        $message = 'Tên đăng nhập hoặc mật khẩu sai!';
    }
    }

  if(isset($_POST['dk_submit']) && !empty($_POST)) {
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <!-- Font awesome -->
    <link href="http://localhost/webivymoda1/public/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="http://localhost/webivymoda1/public/css/bootstrap.css" rel="stylesheet">
    <!-- Theme color -->
    <link id="switcher" href="http://localhost/webivymoda1/public/css/default-theme.css" rel="stylesheet">
    <!-- Top Slider CSS -->
    <link href="http://localhost/webivymoda1/public/css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="http://localhost/webivymoda1/public/css/style_login.css" rel="stylesheet">

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
</head>

<body>
    <!-- Cart view section -->
    <div class="container">
        <h4 style="text-align: center;">
            <a href="trangchu.php" style="color:black; font-weight: bold;">TRANG CHỦ</a>
        </h4>
    </div>

    <section id="aa-myaccount">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-myaccount-area">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="aa-myaccount-login">
                                    <h4>ĐĂNG NHẬP</h4>

                                    <form method="POST" action="" class="aa-login-form">

                                        <label for="">Nhập tài khoản email<span>*</span></label>
                                        <input type="text" name="email" value="<?php echo $_POST['email'] ?? '' ?>"
                                            placeholder="Nhập email ...">
                                        <label for="">Nhập mật khẩu<span>*</span></label>
                                        <input type="password" name="password" placeholder="Nhập mật khẩu ...">
                                        <button type="submit" name="submit" class="aa-browse-btn">Login</button>
                                        <p class="aa-lost-password"> <label
                                                style="color:red"><?= (isset($message) ? $message : '') ?></label></p>
                                    </form>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="aa-myaccount-register">
                                    <h4>ĐĂNG KÝ</h4>
                                    <form method="POST" action="" class="aa-login-form">
                                        <label for="">Tên tài khoản<span>*</span></label>
                                        <input type="text" name="username"
                                            value="<?php echo $_POST['username'] ?? '' ?>"
                                            placeholder="Username or email">
                                        <label
                                            style="color:red"><?= (isset($errors['username']) ? $errors['username'] : '') ?></label><br>
                                        <label for="">Nhập email<span>*</span></label>
                                        <input type="text" name="email" value="<?php echo $_POST['email'] ?? '' ?>"
                                            placeholder="Username or email">
                                        <label
                                            style="color:red"><?= (isset($errors['email']) ? $errors['email'] : '') ?></label>
                                        <br>
                                        <label for="">Nhập mật khẩu<span>*</span></label>
                                        <input type="password" name="password" placeholder="Password">
                                        <label
                                            style="color:red"><?= (isset($errors['password']) ? $errors['password'] : '') ?></label><br>
                                        <label for="">Nhập lại mật khẩu<span>*</span></label>
                                        <input type="password" name="repassword" placeholder="Password">
                                        <label
                                            style="color:red"><?= (isset($errors['repassword']) ? $errors['repassword'] : '') ?></label><br>
                                        <button type="submit" name="dk_submit" class="aa-browse-btn">Register</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Cart view section -->
</body>

</html>