<div class="d-flex flex-column">
    <?php
    require "../../db/connect.php";
    if(isset($_POST['pages'])){
        $pages = $_POST['pages'];
    }
    else{
        $pages = 1;
    }
    $start = ($pages-1) * 3;

    //$fetch = $conn->query("SELECT * FROM Users");
    $fetch = $conn->query("SELECT * FROM users ORDER BY id ASC LIMIT $start , 3");
    $id = 'A';

    while ($row = mysqli_fetch_array($fetch)) {

        echo " <div class='card mt-5  shadow shadow-lg' style='width : 50rem ; height : 10rem'>
    <div class='card-body'>
        <div class='d-flex flex-row'>
            <img src='../../" . $row['profile_img'] . "' class='img-fluid' style='border : 2px transparent; border-radius : 100%;' width='100' alt=''>
            <div class='container ml-3'>
                <h4>" . $row['user_name'] . "</h4>
                <h5>ประเภทผู้ป่วย : ทั่วไป</h5>
                <button class='btn btn-warning' id='" . $id . "'>เข้าสู่โปรไฟล์</button>
            </div>

        </div>
    </div>
</div>
<script>
$('#" . $id . "').click(function(){
    window.location.href = 'detail.php?qr=" . $row['qr_id'] . "'
})
</script>
";
        $id++;
    }
    ?>

</div>

  