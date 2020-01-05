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
    <link rel="stylesheet" href="../../css/font.css">
</head>

<body style="background : url('../../asset/bg.png');">

    <div class="container mt-2">
        <div class="shadow shadow-lg" style="border : 2px transparent; border-radius : 50px; background-color : white;">
            <button class="btn btn-primary mt-5 ml-4" onclick="window.location.href='../home.php'"><i class="fas fa-arrow-left"></i></button>
            <h3 class="text-center mt-4">รายชื่อผู้ป่วย</h3>
            <div class="d-flex flex-column">
                <div id='users' class="mx-auto"></div>
                <nav class="mx-auto mt-5 mb-2">
                    <ul class="pagination" style="cursor : pointer">

                        <?php
                        require "../../db/connect.php";
                        $count = mysqli_num_rows($conn->query("SELECT * FROM users"));
                        $total = ceil($count / 3);

                        for ($i = 1; $i <= $total; $i++) {
                            /*Before*/


                            echo '<li class="page-item"><a id="' . $i . '" class="page-link" >' . $i . '</a></li>';
                            echo '<script>
                $("#' . $i . '").click(function(){
                
                    $.ajax({
                        url : "users.php",
                        data : {pages : ' . $i . '},
                        type : "POST",
                        success : function(result){
                            $("#users").html(result)
                            
                        },
                        

                    })
                })
                </script>';
                        }
                        ?>


                    </ul>
                </nav>

            </div>

        </div>
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