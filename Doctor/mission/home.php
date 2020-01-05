<?php

require "../../db/connect.php";
$qrid = $_POST['qr_id'];
$result = $conn->query("SELECT * FROM users WHERE qr_id = $qrid")->fetch_assoc();
$pill = $conn->query("SELECT * FROM pill");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../../node_modules/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="../../css/font.css">
    <title>Document</title>
</head>

<body>
<body style="background : url('../../asset/bg.png');">
    <div class="container mt-5" style="border : 2px transparent; border-radius : 50px; background-color : white;">
        <button class="btn btn-primary mt-5 ml-4" onclick="window.location.href='index.php'"><i class="fas fa-arrow-left"></i></button>
        <div class="d-flex flex-column">
            <u>
                <h4 class="text-center">ข้อมูลคนไข้</h4>
            </u>
            <img src="../../<?php echo $result['profile_img']; ?>" class="img-fluid mx-auto mt-3" style="border : 2px transparent; border-radius : 100px;" width="200" alt="">
            <h5 class="text-center mt-3">ชื่อ : <?php echo $result['user_name']; ?></h5>
            <hr>
            <form action="" class="form-group" id="submit">
                <label for="symptome">อาการ</label>
                <textarea name="" class="form-control" id="symptome" cols="30" rows="2" required></textarea>
                <label for="pill">ยา</label>
                <select multiple class="form-control" id="pill" required>
                    <?php
                    while ($row = mysqli_fetch_row($pill)) {
                        echo "<option>" . $row[1] . "</option>";
                    }
                    ?>
                </select>
                <label for="date" class="mt-2">วันหมอนัดครั้งต่อไป</label>
                <input class="form-control mt-2" type="date" name="date" id="meet">
                <div class="d-flex flex-column mt-3">
                    <input type="submit" class="btn btn-success" value="ส่งข้อมูล">
                </div>
            </form>

        </div>
    </div>
    <script src="../../node_modules/jquery/dist/jquery.min.js"> </script>
    <script src="../../css/fontawesome/js/all.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script>
        $('#submit').submit(function(e) {
            e.preventDefault()
            symptome = $('#symptome').val()
            pill = $('#pill').val()
            meet = $('#meet').val()
            $.ajax({
                url: "send.php",
                method: "POST",
                data: {
                    symp: symptome,
                    pill: pill,
                    id: <?php echo $result['qr_id']; ?>,
                    meet : meet
                },
                success: function(s) {
                    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'บันทึกข้อมูลสำเร็จ',
        showConfirmButton: false,
        timer: 1500
      })
      setTimeout(() => {
          location.reload()
      }, 1500);
                }
            })
        });
    </script>
</body>

</html>