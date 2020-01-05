<?php

require "../../db/connect.php";
$name = $_POST['name'];
$detail = $_POST['detail'];
$time = $_POST['time'];
$pill_id = rand();
$check = $conn->query("SELECT * FROM pill WHERE pill_name = '$name' AND detail = '$detail' AND time = '$time' AND pill_id = '$pill_id'")->fetch_array();
$count = $conn->query("SELECT count(id) FROM pill")->fetch_array();
if($check[0] != ''){
}else {
    $conn->query("INSERT INTO pill (pill_name,detail,time,pill_id) VALUES ('$name','$detail','$time','$pill_id')");
    
    
    echo "<script>
    $('#pills').load('pill.php')
    $('#count').load('count.php')
    $('#pagination').load('pagination.php')
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'เพิ่มยาสำเร็จ',
        showConfirmButton: false,
        timer: 1500
      })
      $('#addpill').modal('hide')
    </script>";
}

