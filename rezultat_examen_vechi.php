<?php
session_start();
include "header.php";
include "connection.php";
if(!isset($_SESSION["username"]))
{ 
    ?>
<script type="text/javascript">
    window.location="login.php";
    </script>
 <?php
}
?>

<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

    <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
        <center>
            <h1> Rezultate Examene Anterioare</h1>
        </center>

        <?php
        $count = 0;
        $res = mysqli_query($link, "SELECT * FROM rezultate_examen WHERE username='$_SESSION[username]' ORDER BY id DESC");
        $count = mysqli_num_rows($res);

        if ($count == 0) {
            ?>
            <center>
                <h1>Niciun Rezultat Găsit</h1>
            </center>
            <?php
        }
        else
        {
            echo "<table class='table table-bordered'>";
            echo "<tr style='background-color: #006df0; color: white '>";
            echo "<th>"; echo"Nume"; echo "</th>";
            echo "<th>"; echo"Materie"; echo "</th>";
            echo "<th>"; echo"Întrebări totale"; echo "</th>";
            echo "<th>"; echo"Răspunsuri Corecte"; echo "</th>";
            echo "<th>"; echo"Răspunsuri Greșite"; echo "</th>";
            echo "<th>"; echo"Data"; echo "</th>";
            echo "</tr>";

            while($row=mysqli_fetch_array($res))
            {
                echo "<tr>";
            echo "<td>"; echo $row["username"]; echo "</td>";
            echo "<td>"; echo $row["materie_examen"]; echo "</td>";
            echo "<td>"; echo $row["total_intrebare"]; echo "</td>";
            echo "<td>"; echo $row["raspuns_corect"]; echo "</td>";
            echo "<td>"; echo $row["raspuns_gresit"]; echo "</td>";
            echo "<td>"; echo $row["timp_examen"]; echo "</th>";
            echo "</tr>";
            }

            echo "</table>";

        }

        ?>
    </div>
</div>


<?php
include "footer.php";
?>