<?php

require "../../db/connect.php";
$symptome = $_POST['symp'];
$pill = $_POST['pill'];
$id = $_POST['id'];
$pill = implode("," ,$pill);


 $check = $conn->query("SELECT * FROM user_pill WHERE qr_id = $id")->fetch_array();
if($check[0] != ''){
    $conn->query("UPDATE user_pill SET symptome = '$symptome' , pill = '$pill' WHERE qr_id = $id");
    echo "UPDATE user_pill SET symptome = '$symptome' , pill = '$pill' WHERE qr_id = $id";
}else{
    echo "n";
    $conn->query("INSERT INTO user_pill (symptome,pill,qr_id) VALUES ('$symptome','$pill',$id)");
}
