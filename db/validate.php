<?php

require "connect.php";

$id_card = $_POST['card'];

$result = $conn->query("SELECT * FROM Users WHERE qr_id  = $id_card")->fetch_assoc();

echo $result['username'];
