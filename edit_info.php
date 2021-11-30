<?php
session_start();

require "connect.php";
if (isset($_SESSION['qr'])) {
  $qr_id = $_SESSION['qr'];
  $telephone = $_POST['telephone'];
  $home = $_POST['home'];
  $stmt = $conn->prepare("UPDATE info SET home = ? , telephone = ? WHERE qr_id = ?");
  $stmt->bind_param("sii" ,$home,$telephone,$qr_id);
  $stmt->execute();
  $status = $stmt->get_result();

  if ($stmt->affected_rows > 0) {
    echo "<p class='text-success'>บันทึกข้อมูลสำเร็จ</p>";
  } else {
    echo "<p class='text-danger'>บันทึกข้อมูลไม่สำเร็จ</p>";
  }
}else{
  echo "<p class='text-danger'>บันทึกข้อมูลไม่สำเร็จ กรุณาเข้าสู่ระบบอีกครั้ง</p>";
}


