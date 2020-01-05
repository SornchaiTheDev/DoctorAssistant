<?php

session_start();
$qr = $_SESSION['qr'];
require "connect.php";

$user_pill = $conn->query("SELECT * FROM user_pill WHERE qr_id = $qr")->fetch_assoc();
$pill_name = explode(",", $user_pill['pill']);
$pill_count  = count($pill_name);
$count = 0;
$info = 'A';
$time = 'AA';
while ($count < $pill_count) {
    $pill = $conn->query("SELECT * FROM pill WHERE pill_name = '$pill_name[$count]'")->fetch_assoc();
        echo '
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
        <div class="card mb-3" style="width: 18rem;">
        <img src="asset/med_icon.png" class="img-fluid">
        <div class="card-body">
            <div class="d-flex flex-column">
                <h5 class="card-title">' . $pill['pill_name'] . '</h5>
                <p class="card-text" id="detail' . $count . '"></p>
                <div class="d-flex flex-row">
                <button class="btn btn-success ml-3" style="
                border: 2px solid transparent; 
                border-radius : 50px; 
                padding-left: 10px; 
                padding-right : 10px; 
                padding-top : 10px;
                padding-bottom : 10px 
                " id="' . $info . '">ข้อมูลเพิ่มเติม</button>
                <button class="btn btn-warning ml-4" id="' . $time . '" style="
                border: 2px solid transparent; 
                border-radius : 50px; 
                padding-left: 10px; 
                padding-right : 10px; 
                padding-top : 10px;
                padding-bottom : 10px 
                ">วิธีการทาน</button>
                </div>
            </div>
        </div>
    </div>
    <script>
    var time' . $count . ' = "' . $pill['time'] . '"
    var detail' . $count . ' = "' . $pill['detail'] . '"
    var thuc' . $count . ' = "' . $pill['detail'] . '".substr(0,60)
    $("#detail' . $count . '").text("รายละเอียด : " + thuc' . $count . ' + "...")

    $("#' . $info . '").click(function(){
        Swal.fire({
            title: "รายละเอียด",
            text: detail' . $count . ',
            icon: "info",
            confirmButtonText: "ปิด",
          })
    })

    $("#' . $time . '").click(function(){
        Swal.fire({
            title: "วิธีการทาน",
            text: "' . $pill['time'] . '",
            icon: "info",
            confirmButtonText: "ปิด",
          })
    })
    </script>
    ';
        if ($count + 1 == $pill_count) {
            echo "<div style='margin-top : 20px; margin-bottom : 100px;'><p class='text-center'>ไม่มีผลลัพธ์เพิ่มเติม</p></div>";
        }
    

    
    if ($pill_name[0] == '') {
        echo " <div style='margin-top : 125px;margin-bottom : 100px; id='no''>
        <p class='text-center'>ไม่พบยาของคุณ</p>
        <i class='fas  d-block mx-auto' style='font-size : 250px'></i>
        </div>";
    }
    $count++;
    $info++;
    $time++;
}
