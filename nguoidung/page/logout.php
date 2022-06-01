<?php
session_start();
// cách 1: xóa toàn bộ session tồn tại trong phiên làm việc này
session_destroy();
//quay về trang chủ
header("location: trangchu.php");

?>