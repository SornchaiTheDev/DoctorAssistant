<ul class="pagination d-flex justify-content-center" style="cursor : pointer">

            <?php
            require "../../db/connect.php";
            $count = mysqli_num_rows($conn->query("SELECT * FROM pill"));
            $total = ceil($count / 10);

            for ($i = 1; $i <= $total; $i++) {



                echo '<li class="page-item"><a id="' . $i . '" class="page-link" >' . $i . '</a></li>';
                echo '<script>
$("#' . $i . '").click(function(){

$.ajax({
url : "pill.php",
data : {pages : ' . $i . '},
type : "POST",
success : function(result){
    $("#pills").html(result)
}


})
})
</script>';
            }
            ?>


        </ul>