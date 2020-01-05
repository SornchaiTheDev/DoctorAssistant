<?php

session_start();
$qr = $_SESSION['qr'];
require "connect.php";
$date =  date("Y-m-d");
$noti = $conn->query("SELECT * FROM notification WHERE qr_id = $qr")->fetch_assoc();
$notiloop = $conn->query("SELECT * FROM notification WHERE qr_id = $qr");
$max = mysqli_fetch_array($conn->query("SELECT MAX(id) FROM notification WHERE qr_id = $qr"));
$meet = $noti['notification'];

    if ($date == $meet) {
        
        $i = 1;
        while ($row = mysqli_fetch_array($notiloop)) {

            echo '
        
                <div class="card mb-3 mt-2" style="height: 6rem;" id="' . $i . '">
                    <div class="card-body">
                        <div class="d-flex flex-column">
                            <h5 class="card-title"><b>วันนี้หมอนัด</b></h5>
                            <p class="card-text">แตะเพื่อแสดงเพิ่มเติม</p>
                        </div>
                    </div>
            </div>
            <script>
            noti_count = ' . $i . '
            $("#noti_count").text(' . $i . ')
            
            $("#' . $i . '").click(function () {
                Swal.fire({
                    title: "หมอนัด",
                    text: "รายละเอียด : วันที่ '.$row['notification'].'",
                    icon: "info",
                    confirmButtonText: "ปิด",
                })
            });
            </script>';
            if ($row['id'] ==  $max[0]) {
                echo "<div style='margin-top : 10px;margin-bottom : 100px; '><p class='text-center'>ไม่มีผลลัพธ์เพิ่มเติม</p></div>";
            }

            $i++;
        }

        if ($max[0] == 0) {
            echo "
            <div style='margin-top : 125px;margin-bottom : 100px; '>
            <p class='text-center'>ไม่มีการแจ้งเตือน</p>
            <i class='fas fa-inbox  d-block mx-auto' style='font-size : 250px'></i>
            </div>
            <script>$('#noti_count').text(0)</script>
            ";
        }
}
