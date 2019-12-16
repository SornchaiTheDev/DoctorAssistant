<?php
session_start();

require "connect.php";
if (isset($_SESSION['qr'])) {
  $qr_id = $_SESSION['qr'];
  $telephone = $_POST['telephone'];
  $home = $_POST['home'];

  $status = $conn->query("UPDATE info SET home = '$home' , telephone = '$telephone' WHERE qr_id = '$qr_id'");

  if (!$status) {
    echo "error";
  } else {
    echo "<p class='text-success'>บันทึกข้อมูลสำเร็จ</p>";
  }
}else{
  echo "<p class='text-danger'>บันทึกข้อมูลไม่สำเร็จ กรุณาเข้าสู่ระบบอีกครั้ง</p>";
}


