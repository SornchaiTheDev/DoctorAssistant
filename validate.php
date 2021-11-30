<?php
require "connect.php";

$id_card = $_POST['id_card'];
$qrcode = $_POST['qrcode'];

$stmt = $conn->prepare("SELECT * FROM Users WHERE id_card  = ? and qr_id = ?");
$stmt->bind_param("ii", $id_card , $qrcode);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){
     echo '
     <script>
     window.location.href = "home.php"
     </script>
     ';
}
else {
     echo "<p class='text-danger'>*เลขบัตรประจำตัวประชาชนผิด<p>";
}

