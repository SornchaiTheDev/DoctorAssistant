<?php

session_start();
$qr = $_SESSION['qr'];
require "connect.php";

$map = $conn->query("SELECT * FROM Map");
$max = mysqli_fetch_array($conn->query("SELECT MAX(id) FROM Map"));
$i = 1;

while ($row = mysqli_fetch_array($map)) {
    echo '
   
        <div class="card mb-3" style="width: 20rem;">
        <img src="db/user_pic/123456789.jpg" class="img-fluid">
        <div class="card-body">
            <div class="d-flex flex-column">
                <h5 class="card-title">ยาพารา</h5>
                <p class="card-text">รายละเอียด</p>
                <button class="btn btn-success">ข้อมูลเพิ่มเติม</button>
            </div>
        </div>
    </div>';

    if ($row['id'] ==  $max[0]) {
        echo "<div style='margin-top : 10px;margin-bottom : 100px; '><p class='text-center'>ไม่มีผลลัพธ์เพิ่มเติม</p></div>";
    }
    $i++;
}
