<?php

session_start();
$qr = $_SESSION['qr'];
require "connect.php";

$map = $conn->query("SELECT * FROM Map");
$i = 1;

while ($row = mysqli_fetch_array($map)) {
    echo '
   
        <div class="card mb-3" style="width: 20rem;">
        <div class="card-body">
            <div class="d-flex flex-column">
                <h5 class="card-title">' . $row["shop_name"] . '</h5>
                <p class="card-text">' . $row["adress"] . '</p>
                <a href="' . $row["location"] . '" class="btn btn-warning">เส้นทาง</a>
            </div>
        </div>
    </div>';
    $i++;
}
