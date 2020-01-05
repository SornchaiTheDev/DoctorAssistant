<?php

require "../../db/connect.php";
$symptome = $_POST['symp'];
$pill = $_POST['pill'];
$id = $_POST['id'];
$date = $_POST['meet'];
$pill = implode("," ,$pill);

 $noti = $conn->query("SELECT * FROM notification WHERE qr_id = $id")->fetch_array();
 $check = $conn->query("SELECT * FROM user_pill WHERE qr_id = $id")->fetch_array();
if($check[0] != ''){
    $conn->query("UPDATE user_pill SET symptome = '$symptome' , pill = '$pill' , date = '$date' WHERE qr_id = $id");
    
    
}else{
    $conn->query("INSERT INTO user_pill (symptome,pill,date,qr_id) VALUES ('$symptome','$pill','$date',$id)");
}

if($noti[0] != ''){
    $conn->query("UPDATE notification SET notification = '$date' WHERE qr_id = $id");
}else{
    $conn->query("INSERT INTO notification (notification,qr_id) VALUES ('$date',$id)");
}
