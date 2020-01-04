<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="../css/font.css">
    <title>Login</title>
    <style>
        #center {
            margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
    </style>
</head>

<body style="background : url('../asset/bg.png');">

    <div id="center">
        <div class="shadow shadow-lg" style="border : 2px transparent; border-radius : 50px; background-color : white; width : 350px;">

            <div class="p-3">
                <h3 class="text-center">ล็อคอิน</h3>
                <div id="loading" class="text-center" style="display: none">
                    <div class="spinner-grow text-success" role="status"></div>
                </div>
                <div id="status" class="text-center"></div>
                <form id="login" class="form-group">
                    <label for="username">ชื่อผู้ใช้</label>
                    <input type="text" class="form-control mb-2" name="username" id="username">
                    <label for="username">รหัสผ่าน</label>
                    <input type="text" class="form-control" name="password" id="password">
                    <input type="submit" class="btn btn-success form-control mt-4" value="ล็อคอิน">
                </form>
            </div>
        </div>
    </div>
    <script src="../node_modules/jquery/dist/jquery.min.js"> </script>
    <script src="../css/fontawesome/js/all.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script>
        $('#login').submit(function(e) {
            e.preventDefault()
            username = $('#username').val()
            password = $('#password').val()
            $('#status').load("validate.php", {
                username: username,
                password: password
            })
        })
    </script>
</body>

</html>