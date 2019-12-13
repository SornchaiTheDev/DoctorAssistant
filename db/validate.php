<?php

require "connect.php";

$id_card = $_POST['id_card'];
$qrcode = $_POST['qrcode'];
$result = $conn->query("SELECT * FROM Users WHERE id_card  = '$id_card' and qr_id = '$qrcode'")->fetch_assoc();
if(!$result){
    echo "<p class='text-danger'>*เลขบัตรประจำตัวประชาชนผิด<p>";
}
else {
 echo '
 <script>
  window.location.href = "home.php"
 </script>
 ';
}

