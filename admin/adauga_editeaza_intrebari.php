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

$id = $_GET["id"];
$materie_examen = '';
$res = mysqli_query($link, "SELECT * FROM materie_examen WHERE id=$id");
while ($row = mysqli_fetch_assoc($res)) {
    $materie_examen = $row["materie"];
}
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Adaugă Întrebări în
                    <?php echo "<font color='green'>" . $materie_examen . "</font>"; ?>
                </h1>
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

                        <div class="col-lg-6">
                            <form name="form1" action="" method="post" enctype="multipart/form-data">
                                <div class="card">
                                    <div class="card-header"><strong>Adaugă Întrebări Noi cu Text</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="form-group"><label for="intrebare"
                                                class=" form-control-label">Adaugă Întrebare
                                            </label><input type="text" name="intrebare" placeholder="Adaugă Întrebare"
                                                class="form-control">
                                        </div>

                                        <div class="form-group"><label for="opt1" class=" form-control-label">Opțiunea 1
                                            </label><input type="text" name="opt1" placeholder="Adaugă Opțiunea 1"
                                                class="form-control">
                                        </div>

                                        <div class="form-group"><label for="opt2" class=" form-control-label">Opțiunea 2
                                            </label><input type="text" name="opt2" placeholder="Adaugă Opțiunea 2"
                                                class="form-control">
                                        </div>

                                        <div class="form-group"><label for="opt3" class=" form-control-label">Opțiunea 3
                                            </label><input type="text" name="opt3" placeholder="Adaugă Opțiunea 3"
                                                class="form-control">
                                        </div>

                                        <div class="form-group"><label for="opt4" class=" form-control-label">Opțiunea 4
                                            </label><input type="text" name="opt4" placeholder="Adaugă Opțiunea 4"
                                                class="form-control">
                                        </div>

                                        <div class="form-group"><label for="raspuns" class=" form-control-label">Răspuns
                                                Corect
                                            </label><input type="text" name="raspuns"
                                                placeholder="Adaugă Răspunsul Corect" class="form-control">
                                        </div>


                                        <div class="form-group">
                                            <input type="submit" name="submit1" value="Adaugă Întrebare"
                                                class="btn btn-success">
                                        </div>

                                    </div>
                                </div>

                        </div>

                        <div class="col-lg-6">

                            <div class="card">
                                <div class="card-header"><strong>Adaugă Întrebări Noi cu Imagini</strong>
                                </div>
                                <div class="card-body card-block">
                                    <div class="form-group"><label for="intrebare" class=" form-control-label">Adaugă
                                            Întrebare
                                        </label><input type="text" name="intrebare" placeholder="Adaugă Întrebare"
                                            class="form-control">
                                    </div>

                                    <div class="form-group"><label for="opt1" class=" form-control-label">Opțiunea 1
                                        </label><input type="file" name="fopt1" class="form-control"
                                            style="padding-bottom:45px">
                                    </div>

                                    <div class="form-group"><label for="opt2" class=" form-control-label">Opțiunea 2
                                        </label><input type="file" name="fopt2" class="form-control"
                                            style="padding-bottom:45px">
                                    </div>

                                    <div class="form-group"><label for="opt3" class=" form-control-label">Opțiunea 3
                                        </label><input type="file" name="fopt3" class="form-control"
                                            style="padding-bottom:45px">
                                    </div>

                                    <div class="form-group"><label for="opt4" class=" form-control-label">Opțiunea 4
                                        </label><input type="file" name="fopt4" class="form-control"
                                            style="padding-bottom:45px">
                                    </div>

                                    <div class="form-group"><label for="raspuns" class=" form-control-label">Răspuns
                                            Corect
                                        </label><input type="file" name="fraspuns" class="form-control"
                                            style="padding-bottom:45px">
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" name="submit2" value="Adaugă Întrebare"
                                            class="btn btn-success">
                                    </div>




                                </div>
                            </div>

                        </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Nr.</th>
                                <th>Întrebări</th>
                                <th>Opțiune 1</th>
                                <th>Opțiune 2</th>
                                <th>Opțiune 3</th>
                                <th>Opțiune 4</th>
                                <th>Editare</th>
                                <th>Ștergere</th>
                            </tr>

                            <?php
                            $res = mysqli_query($link, "SELECT * FROM intrebari WHERE materie='$materie_examen' ORDER BY intrebare_nr ASC");

                            while ($row = mysqli_fetch_array($res)) {
                                echo "<tr>";
                                echo "<td>";
                                echo $row["intrebare_nr"];
                                echo "</td>";
                                echo "<td>";
                                echo $row["intrebare"];
                                echo "</td>";
                                echo "<td>";
                                if (strpos($row["opt1"], 'opt_imagini/') !== false) {
                                    ?>
                                    <img src="<?php echo $row["opt1"]; ?>" height="50" width="50">
                                    <?php
                                } else {
                                    echo $row["opt1"];
                                }
                                echo "</td>";


                                echo "<td>";
                                if (strpos($row["opt2"], 'opt_imagini/') !== false) {
                                    ?>
                                    <img src="<?php echo $row["opt2"]; ?>" height="50" width="50">
                                    <?php
                                } else {
                                    echo $row["opt2"];
                                }
                                echo "</td>";


                                echo "<td>";
                                if (strpos($row["opt3"], 'opt_imagini/') !== false) {
                                    ?>
                                    <img src="<?php echo $row["opt3"]; ?>" height="50" width="50">
                                    <?php
                                } else {
                                    echo $row["opt3"];
                                }
                                echo "</td>";


                                echo "<td>";
                                if (strpos($row["opt4"], 'opt_imagini/') !== false) {
                                    ?>
                                    <img src="<?php echo $row["opt4"]; ?>" height="50" width="50">
                                    <?php
                                } else {
                                    echo $row["opt4"];
                                }
                                echo "</td>";

                                echo "<td>";
                                if (strpos($row["opt4"], 'opt_imagini/') !== false) {
                                    ?>
                 <a
                                        href="editare_optiuni_imagini.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id; ?>">Editare</a>
                                    <?php
                                } else {
                                    ?>
                                    <a
                                        href="editare_optiuni.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id; ?>">Editare</a>
                                    <?php
                                }

                                echo "</td>";

                                echo "<td>";
                                ?>
                                <a
                                    href="sterge_optiuni.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id; ?>">Ștergere</a>
                                <?php

                                echo "</td>";

                                echo "</tr>";


                            }

                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
if (isset($_POST["submit1"])) {
    $loop = 0;

    $count = 0;

    $res = mysqli_query($link, "SELECT * FROM intrebari WHERE materie='$materie_examen' ORDER BY id ASC") or die(mysqli_error($link));
    $count = mysqli_num_rows($res);

    if ($count == 0) {

    } else {
        while ($row = mysqli_fetch_assoc($res)) {
            $loop = $loop + 1;
            mysqli_query($link, "UPDATE intrebari SET intrebare_nr='$loop' WHERE id=$row[id]");
        }
    }

    $loop = $loop + 1;

    mysqli_query($link, "INSERT INTO intrebari VALUES(NULL,'$loop','$_POST[intrebare]','$_POST[opt1]','$_POST[opt2]','$_POST[opt3]','$_POST[opt4]','$_POST[raspuns]','$materie_examen')") or die(mysqli_error($link));


    ?>
    <script type="text/javascript">
        alert("Întrebarea a fost adăugată cu succes!");
        window.location.href = window.location.href;
    </script>

    <?php
}
?>

<?php
if (isset($_POST["submit2"])) {
    $loop = 0;

    $count = 0;

    $res = mysqli_query($link, "SELECT * FROM intrebari WHERE materie='$materie_examen' ORDER BY id ASC") or die(mysqli_error($link));
    $count = mysqli_num_rows($res);

    if ($count == 0) {

    } else {
        while ($row = mysqli_fetch_assoc($res)) {
            $loop = $loop + 1;
            mysqli_query($link, "UPDATE intrebari SET intrebare_nr='$loop' WHERE id=$row[id]");
        }
    }

    $loop = $loop + 1;

    $tm = md5(time());

    $fnm1 = $_FILES["fopt1"]["name"];
    $dst1 = "./opt_imagini/" . $tm . $fnm1;
    $dst_db1 = "opt_imagini/" . $tm . $fnm1;
    move_uploaded_file($_FILES["fopt1"]["tmp_name"], $dst1);

    $fnm2 = $_FILES["fopt2"]["name"];
    $dst2 = "./opt_imagini/" . $tm . $fnm2;
    $dst_db2 = "opt_imagini/" . $tm . $fnm2;
    move_uploaded_file($_FILES["fopt2"]["tmp_name"], $dst2);

    $fnm3 = $_FILES["fopt3"]["name"];
    $dst3 = "./opt_imagini/" . $tm . $fnm3;
    $dst_db3 = "opt_imagini/" . $tm . $fnm3;
    move_uploaded_file($_FILES["fopt3"]["tmp_name"], $dst3);

    $fnm4 = $_FILES["fopt4"]["name"];
    $dst4 = "./opt_imagini/" . $tm . $fnm4;
    $dst_db4 = "opt_imagini/" . $tm . $fnm4;
    move_uploaded_file($_FILES["fopt4"]["tmp_name"], $dst4);

    $fnm5 = $_FILES["fraspuns"]["name"];
    $dst5 = "./opt_imagini/" . $tm . $fnm5;
    $dst_db5 = "opt_imagini/" . $tm . $fnm5;
    move_uploaded_file($_FILES["faspuns"]["tmp_name"], $dst5);






    mysqli_query($link, "INSERT INTO intrebari VALUES(NULL,'$loop','$_POST[intrebare]','$dst_db1','$dst_db2','$dst_db3','$dst_db4','$dst_db5','$materie_examen')") or die(mysqli_error($link));


    ?>
    <script type="text/javascript">
        alert("Întrebarea a fost adăugată cu succes!");
        window.location.href = window.location.href;
    </script>

    <?php
}
?>

<?php
include "footer.php";
?>