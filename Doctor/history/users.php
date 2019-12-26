<!--<button class='btn btn-warning' id='" . $edit . "'>แก้ไข</button>-->

<div class="container mt-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ลำดับที่</th>
                <th scope="col">ชื่อผู้ป่วย</th>
                <th scope="col">เลขบัตรประชาชน</th>
                <th scope="col">จัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require "../../db/connect.php";
            $fetch = $conn->query("SELECT * FROM Users");
            $edit = 'A';
            $del = "AA";
            while ($row = mysqli_fetch_array($fetch)) {

                echo " <tr>
        <th scope='row'>" . $row['id'] . "</th>
        <td>" . $row['user_name'] . "</td>
        <td>" . $row['qr_id'] . "</td>
        <td><div class='d-flex flex-column'><button class='btn btn-danger mt-2' id='" . $del . "'>ลบ</button></div></td>
    </tr>
    <script>
    $('#" . $del . "').click(function(){
        Swal.fire({
            title: 'ต้องการลบ ?',
            text: 'test',
            icon: 'info',
            confirmButtonText: 'ลบ',
            confirmButtonColor : 'gold',
            cancelButtonText : 'ยกเลิก',
            cancelButtonColor : 'skyblue',
            showCancelButton : true,
          }).then((result) => {
            if(result.value){
                $.ajax({
                    url : 'delete.php',
                    type : 'POST',
                    data : {qr_id : " . $row['qr_id'] . "}
                    
                })
                Swal.fire({
                    title : 'เรียบร้อย',
                    icon : 'success'
                })
                $('#users').load('users.php')
            }
        
        })
    })
    </script>
    ";
                $edit++;
                $del++;
            }
            ?>
        </tbody>
    </table>
</div>