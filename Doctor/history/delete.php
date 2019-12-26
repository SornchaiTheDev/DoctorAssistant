<?php


require "../../db/connect.php";

$qr = $_POST['qr_id'];

$conn->query("DELETE FROM Users WHERE qr_id = $qr");
$conn->query("DELETE FROM info WHERE qr_id = $qr");
