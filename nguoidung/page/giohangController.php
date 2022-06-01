<?php  require ".././core/ketnoi.php";
if (isset($_GET['del']) && !empty($_GET['del'])) {
    $id = $_GET['del'];
    $sql = "SELECT * FROM `order` WHERE id= $id";
    $products = showDataOnly($sql);
  //echo"<pre>";
  // var_dump($_SESSION["user"]["id"],$products['user_id']); die;
  if($_SESSION["user"]["id"]==$products['user_id']){
    $sql = "DELETE FROM `order` WHERE id= $id";
    $result = $conn->query($sql);
  }

}
header("location: http://localhost/webivymoda1/nguoidung/page/giohang.php");

?>