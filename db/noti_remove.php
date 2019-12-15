<?php

require "connect.php";
$id = $_POST['id'];
echo $id;
$conn->query("DELETE FROM Notification WHERE id = $id");
