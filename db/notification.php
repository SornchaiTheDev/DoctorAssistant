<?php

session_start();
$qr = $_SESSION['qr'];
require "connect.php";

$noti = $conn->query("SELECT * FROM Notification WHERE qr_id = $qr");
$i = 1;

while ($row = mysqli_fetch_array($noti)) {
    echo '
   
        <div class="card mb-3 mt-2" style="height: 6rem;" id="' . $i . '">
            <div class="card-body">
                <div class="d-flex flex-column">
                    <h5 class="card-title"><b>' . $row["notification"] . '</b></h5>
                    <p class="card-text">แตะเพื่อแสดงเพิ่มเติม</p>
                </div>
            </div>
    </div>
    <script>
    noti_count = ' . $i . '
    $("#noti_count").text(' . $i . ')
    $("#' . $i . '").click(function () {
        Swal.fire({
            title: "' . $row["notification"] . '",
            text: "รายละเอียด :",
            icon: "info",
            confirmButtonText: "ปิด",
          })
    });
    </script>';
    $i++;
}
