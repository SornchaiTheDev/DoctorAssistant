<?php

session_start();
$qr = $_SESSION['qr'];
require "connect.php";

$map = $conn->query("SELECT * FROM Map");
$max = mysqli_fetch_array($conn->query("SELECT MAX(id) FROM Map"));
$i = 1;

while ($row = mysqli_fetch_array($map)) {
    echo '
   
        <div class="card mb-3" style="width: 18rem;">
        <div class="card-body">
            <div class="d-flex flex-column">
                <h5 class="card-title">' . $row["shop_name"] . '</h5>
                <p class="card-text">' . $row["adress"] . '</p>
                <a href="' . $row["location"] . '" class="btn btn-warning">เส้นทาง</a>
            </div>
        </div>
    </div>';

    if ($row['id'] ==  $max[0]) {
        echo "<div style='margin-top : 10px;margin-bottom : 100px; '><p class='text-center'>ไม่มีผลลัพธ์เพิ่มเติม</p></div>";
    }
    $i++;
}


if ($max[0] == 0) { 
    echo "
    <div style='margin-top : 125px;margin-bottom : 100px; '>
    <p class='text-center'>ไม่พบร้านยาใกล้ๆ</p>
    <i class='fas fa-map-signs  d-block mx-auto' style='font-size : 250px'></i>
    </div>
    ";
} 
