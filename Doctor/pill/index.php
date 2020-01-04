<?php

require "../../db/connect.php";
$pill = $conn->query("SELECT * FROM pill");
$max_pill = $conn->query("SELECT count(id) FROM pill")->fetch_array();

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
    <script src="../../node_modules/jquery/dist/jquery.min.js"> </script>
    <title>Document</title>
</head>

<body style="background : url(../../asset/bg.png)">
    <!--Navbar-->
    <div class="container mt-2 border rounded bg-light shadow ">
        <nav class="navbar navbar-expand-lg navbar-light m-2">
            <a class="navbar-brand" href="#">DoctorAssistant</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                </ul>
                <!-- <form class="form-inline my-2 my-lg-0" id="search">
                    <input class="form-control mr-sm-2" id="val" type="search" placeholder="ค้นหายา" aria-label="ค้นหายา">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">ค้นหา</button>
                </form>
                -->
            </div>
        </nav>
        <!--End Navbar-->
        <hr>
        <button class="btn btn-primary mb-4 d-print-none" onclick="window.location.href='../home.php'"><i class="fas fa-arrow-left"></i></button>
        <div class="bg-light">
            <h2 class="text-warning" id="count"></h2>
            <button class="btn btn-success" onclick='$("#addpill").modal("show")'>เพิ่มยา</button>

            <div class="p-2">
                <div id="pills"></div>
            </div>
        </div>
        <div id="pagination"></div>
    </div>

    <!--AddPill-->
    <div class="modal fade" id="addpill" tabindex="-1" role="dialog" aria-labelledby="addpillLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addpillLabel">เพิ่มยา</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-group" id="add_pill">
                        <label for="pill_name">ชื่อยา</label>
                        <input type="text" class="form-control" name="pill_name" id="pill_name">
                        <label for="pill_detail">คำอธิบายยา</label>
                        <textarea name="pill_detail" class="form-control" id="pill_detail" cols="50" rows="2"></textarea>
                        <label for="pill_time">เวลาทานยา</label>
                        <input type="text" class="form-control" name="pill_time" id="pill_time">
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="เพิ่มยา">
                    </form>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>



    <div id="alert"></div>
    <script src="../../css/fontawesome/js/all.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#pills').load("pill.php")
            $('#count').load("count.php")
            $('#pagination').load("pagination.php")
            reload()
        })

        function reload() {
            setTimeout(() => {
                // $('#pills').load("pill.php")
                $('#count').load("count.php")
                $('#pagination').load("pagination.php")
                reload()
            }, 1000);
        }
        $('#search').submit(function(e) {
            e.preventDefault()
            search = $('#val').val()
            alert(search)
        })

        $('#add_pill').submit(function(e) {
            e.preventDefault()
            pill_name = $('#pill_name').val()
            pill_detail = $('#pill_detail').val()
            pill_time = $('#pill_time').val()
            $.ajax({
                url: 'addpill.php',
                method: 'POST',
                data: {
                    name: pill_name,
                    detail: pill_detail,
                    time: pill_time
                },
                success: function(s) {
                    $('#alert').html(s);
                }
            })
        })
    </script>
</body>

</html>