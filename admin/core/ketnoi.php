<?php
    $servername="localhost";
    $usernam="root";
    $password="";
    $database="webivymoda1";

    $conn= mysqli_connect($servername, $usernam, $password, $database);

    if($conn->connect_error){
        echo ("Kết nối không thành công");
    }
   



    function showDataOnly($sql){
        global $conn;
        $result = $conn->query($sql);
        $result = $result->fetch_assoc();
        return $result;
    }

    // Hàm trả về một mảng 
    function showDataAll($sql){
        global $conn;
        // Hàm kêt lỗi
        $result = mysqli_query($conn , $sql);
        $data_list =[];
        while($row = mysqli_fetch_array($result ,1)){
            $data_list[] = $row;
        };
        return $data_list;
    };
    session_start();
?>