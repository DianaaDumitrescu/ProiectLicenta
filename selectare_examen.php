<?php
session_start();
if (!isset($_SESSION["username"])) {
    ?>
    <script type="text.javascript">

               window.location="login.php";
                </script>
    <?php
}
?>
<?php
include "connection.php";
include "header.php";
?>

<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

    <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
        <?php
        $res = mysqli_query($link, "SELECT * FROM materie_examen");
        while ($row = mysqli_fetch_array($res)) {
            ?>
            <input type="button" class="btn btn-success form-control" value="<?php echo $row["materie"] ?>"
                style="margin-top: 10; background-color: blue; color: white" onclick="set_exam_type_session(this.value);">
            <?php
        }


        ?>
    </div>
</div>


<?php
include "footer.php";
?>

<script type="text/javascript">
    function set_exam_type_session(materie_examen) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                window.location = "dashboard.php";
            }
        };
        xmlhttp.open("GET", "forajax/set_exam_type_session.php?materie_examen=" + materie_examen, true);
        xmlhttp.send(null);
    }
</script>