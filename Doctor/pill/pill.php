<table class="table mt-5 text-center">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ชื่อยา</th>
            <th scope="col">รายละเอียด</th>
            <th scope="col">จัดการ</th>
        </tr>
    </thead>

    <tbody>



        <?php
        require "../../db/connect.php";
        if (isset($_POST['pages'])) {
            $pages = $_POST['pages'];
        } else {
            $pages = 1;
        }
        $start = ($pages - 1) * 10;

        $fetch = $conn->query("SELECT * FROM pill ORDER BY id ASC LIMIT $start , 10");
        $id = 'A';
        $print = 'AA';
        $i = $start + 1;
        while ($row = mysqli_fetch_array($fetch)) {

            echo  "  
                <tr> 
                <th scope='row'>" . $i . "</th>
                <td>" . $row['pill_name'] . "</td>
                <td>" . $row['detail'] . "</td>
                <td><div class='d-flex flex-column'><button class='btn btn-warning mb-2' id='edit" . $id . "'>แก้ไข</button><button class='btn btn-danger' id='delete" . $id . "'>ลบ</button></div></td>
                </tr>
                <script>
                $('#edit" . $id . "').click(function(){
                   $('#editpill" . $id . "').modal('show')
                })

                $('#edit_pill$id').submit(function(e){
                    e.preventDefault()
                    pill_name = $('#pill_name$id').val()
                    detail = $('#pill_detail$id').val()
                    time = $('#pill_time$id').val()
                    $.ajax({
                        url : 'editpill.php',
                        method : 'POST',
                        data : {name : pill_name , detail : detail , time : time,id : ".$row['pill_id']."},
                        success : function(a) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'แก้ไขสำเร็จ',
                                showConfirmButton: false,
                                timer: 1500
                              }),
                              $('#editpill$id').modal('hide')
                        }
                    })
                })
                
                $('#delete" . $id . "').click(function(){
                    Swal.fire({
                        title: 'ต้องการลบ',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: 'red',
                        cancelButtonColor: 'skyblue',
                        confirmButtonText: 'ลบ'
                      }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url : 'delete.php',
                                method : 'POST',
                                data : {pill : " . $row['pill_id'] . "},
                                success : function(e){
                                    Swal.fire({
                                        title : 'ลบแล้ว',
                                        icon : 'success'
                                    })
                                    $('#pills').load('pill.php')
                                    $('#count').load('count.php')
                                    $('#pagination').load('pagination.php')
                                }
                            })
                        }
                    })
                })

              
              
                </script>
        ";
            $id++;
            $print++;
            $i++;
        }

        ?>



    </tbody>
</table>
<?php

$fetch = $conn->query("SELECT * FROM pill ORDER BY id ASC LIMIT $start , 10");
$id = 'A';
$print = 'AA';
$i = $start + 1;
while ($row = mysqli_fetch_array($fetch)) {

    echo "              
        <div class='modal fade' id='editpill$id' tabindex='-1' role='dialog' aria-labelledby='editpillLabel' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='editpillLabel'>เพิ่มยา</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                <div class='modal-body'>
                    <form class='form-group' id='edit_pill" . $id . "'>
                        <label for='pill_name'>ชื่อยา</label>
                        <input type='text' class='form-control' name='pill_name' id='pill_name" . $id . "' value='" . $row['pill_name'] . "'>
                        <label for='pill_detail'>คำอธิบายยา</label>
                        <textarea name='pill_detail' class='form-control' id='pill_detail" . $id . "' cols='50' rows='2'>" . $row['detail'] . "</textarea>
                        <label for='pill_time'>เวลาทานยา</label>
                        <input type='text' class='form-control' name='pill_time' id='pill_time" . $id . "' value='" . $row['time'] . "'>
                        <div class='modal-footer'>
                        <input type='submit' class='btn btn-success' value='แก้ไข'>
                        <button type='button' class='btn btn-danger' data-dismiss='modal'>ยกเลิก</button>
                        </div>
                    </form>
                </div>
               
                    
                
            </div>
        </div>
        </div>";
    $id++;
    $print++;
    $i++;
}

?>