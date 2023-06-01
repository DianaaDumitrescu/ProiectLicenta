<?php
session_start();
include "header.php";
include "../connection.php";

if(!isset($_SESSION["admin"]))
{
    ?>
    <script type="text/javascript">
        window.location="index.php";
        </script>
    <?php
}

?>


<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Toate Rezultatele</h1>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-body">
                    <center>
            <h1> Rezultate Examene</h1>
        </center>

        <?php
        $count = 0;
        $res = mysqli_query($link, "SELECT * FROM rezultate_examen ORDER BY id DESC");
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

            </div>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>