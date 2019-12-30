<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Doctor Assistant</title>
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../../node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="../../node_modules/jquery/dist/jquery.min.js"> </script>
</head>

<body>
    <div class="container mt-5">
        <button class="btn btn-primary" onclick="window.location.href='../'"><i class="fas fa-arrow-left"></i></button>
        <h3 class="text-center mt-4">รายชื่อผู้ป่วย</h3>

        <div id='users' style="margin-left : 22vw"></div>


    </div>

    <script>
        $(document).ready(function() {
            $('#users').load('users.php')

        });
    </script>
    <script src="../../css/fontawesome/js/all.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</body>

</html>