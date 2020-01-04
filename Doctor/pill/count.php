<?php
require "../../db/connect.php";
$max_pill = $conn->query("SELECT count(id) FROM pill")->fetch_array();
?>
ยาในคลังทั้งหมด <?php echo $max_pill[0] ?> ชิ้น