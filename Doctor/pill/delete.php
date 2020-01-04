<?php

require "../../db/connect.php";
$id = $_POST['pill'];
$conn->query("DELETE FROM pill WHERE pill_id = $id");
