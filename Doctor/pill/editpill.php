<?php

require "../../db/connect.php";
$name = $_POST['name'];
$detail = $_POST['detail'];
$time = $_POST['time'];
$id = $_POST['id'];
$conn->query("UPDATE pill SET pill_name = '$name' ,detail = '$detail', time = '$time' WHERE pill_id = $id ");
