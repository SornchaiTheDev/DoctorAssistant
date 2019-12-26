<?php

session_start();
$qr = $_SESSION['qr'];
require "connect.php";

$pill = $conn->query("SELECT * FROM pill WHERE qr_id = $qr");
$max = mysqli_fetch_array($conn->query("SELECT MAX(id) FROM pill WHERE qr_id = $qr"));
$info = 'A';
$time = 'AA';

while ($row = mysqli_fetch_array($pill)) {

    echo '
   
        <div class="card mb-3" style="width: 20rem;">
        <img src="asset/med_icon.png" class="img-fluid">
        <div class="card-body">
            <div class="d-flex flex-column">
                <h5 class="card-title">' . $row['pill_name'] . '</h5>
                <p class="card-text" id="detail"></p>
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
    var time = "' . $time . '"
    var detail = "' . $row['detail'] . '"
    var thuc = "' . $row['detail'] . '".substr(0,60)
    $("#detail").text("รายละเอียด : " + thuc + "...")

    $("#' . $info . '").click(function(){
        Swal.fire({
            title: "รายละเอียด",
            text: detail,
            icon: "info",
            confirmButtonText: "ปิด",
          })
    })

    $("#' . $time . '").click(function(){
        Swal.fire({
            title: "วิธีการทาน",
            text: "' . $row['time'] . '",
            icon: "info",
            confirmButtonText: "ปิด",
          })
    })
    </script>
    ';

    if ($row['id'] ==  $max[0]) {
        echo "<div style='margin-top : 10px;'><p class='text-center'>ไม่มีผลลัพธ์เพิ่มเติม</p></div>";
    }
    $info++;
    $time++;
}

if ($max[0] == '') {
    echo " <div style='margin-top : 125px;margin-bottom : 100px; '>
    <p class='text-center'>ไม่พบยาของคุณ</p>
    <i class='fas  d-block mx-auto' style='font-size : 250px'></i>
    </div>";
}
