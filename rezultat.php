<?php
session_start();
include "connection.php";
$date = date("Y-m-d H:i:s");
$_SESSION["end_time"] = date("Y-m-d H:i:s", strtotime($date . "+ $_SESSION[exam_time] minute"));
include "header.php";
?>

<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

    <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">

        <?php
        $corect = 0;
        $gresit = 0;
        if (isset($_SESSION["raspuns"])) {
            for ($i = 1; $i <= sizeof($_SESSION["raspuns"]); $i++)
             {
                $raspuns = "";
                $res = mysqli_query($link, "SELECT * FROM intrebari WHERE materie='$_SESSION[materie_examen]' && intrebare_nr=$i");
                while ($row = mysqli_fetch_array($res)) {
                    $raspuns = $row["raspuns"];
                }
                if (isset($_SESSION["raspuns"][$i])) {
                    if ($raspuns == $_SESSION["raspuns"][$i]) {
                        $corect = $corect + 1;
                    } else {
                        $gresit = $gresit + 1;
                    }
                } else {
                    $gresit = $gresit + 1;
                }
            }
        }
        $count = 0;
        $res = mysqli_query($link, "SELECT * FROM intrebari WHERE materie='$_SESSION[materie_examen]'");
        $count = mysqli_num_rows($res);
        $gresit = $count - $corect;
        echo "<br>";
        echo "<br>";
        echo "<center>";
        echo "Întrebări totale:" . $count;
        echo "<br>";
        echo "Răspunsuri Corecte:" . $corect;
        echo "<br>";
        echo "Răspunsuri Greșite:" . $gresit;
        echo "<br>";
        echo "</center>";
        ?>
    </div>
</div>

<?php
if (isset($_SESSION["exam_start"])) {
    $date = date("Y-m-d");
    mysqli_query($link,"INSERT INTO rezultate_examen(id,username,materie_examen,total_intrebare,raspuns_corect,raspuns_gresit,timp_examen) VALUES(NULL,'$_SESSION[username]','$_SESSION[materie_examen]','$count','$corect','$gresit','$date')") or die(mysqli_error($link));
}
if(isset($_SESSION["exam_start"]))
{
    unset($_SESSION["exam_start"]);
    ?>
    <script type="text/javascript">
        window.location.href=windo.location.href;
        </script>
    <?php
}
?>


<?php
include "footer.php";
?>