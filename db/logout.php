<?php
session_start();
unset($_SESSION['qr']);
header("Location:../home.php");

