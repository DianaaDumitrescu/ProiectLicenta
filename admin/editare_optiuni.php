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
$id1 = $_GET["id1"];
$intrebare = "";
$opt1 = "";
$opt2 = "";
$opt3 = "";
$opt4 = "";
$raspuns = "";

$res = mysqli_query($link, "SELECT * FROM intrebari WHERE id=$id");
while ($row = mysqli_fetch_array($res)) {
    $intrebare = $row["intrebare"];
    $opt1 = $row["opt1"];
    $opt2 = $row["opt2"];
    $opt3 = $row["opt3"];
    $opt4 = $row["opt4"];
    $raspuns = $row["raspuns"];

}
?>
<header id="header" class="header">

    <div class="header-menu">

        <div class="col-sm-7">

        </div>
    </div>

</header><!-- /header -->
<!-- Header-->

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Modifică Întrebare</h1>
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
                        <div class="col-lg-12">
                            <form name="form1" action="" method="post" enctype="multipart/form-data">
                                <div class="card">
                                    <div class="card-header"><strong>Modifică Întrebări cu Text</strong>
                                    </div>
                                    <div class="card-body card-block">

                                        <div class="form-group"><label for="intrebare"
                                                class=" form-control-label">Adaugă Întrebare
                                            </label><input type="text" name="intrebare" placeholder="Adaugă Întrebare"
                                                class="form-control" value="<?php echo $intrebare; ?>">
                                        </div>

                                        <div class="form-group"><label for="opt1" class=" form-control-label">Opțiunea 1
                                            </label><input type="text" name="opt1" placeholder="Adaugă Opțiunea 1"
                                                class="form-control" value="<?php echo $opt1; ?>">
                                        </div>

                                        <div class="form-group"><label for="opt2" class=" form-control-label">Opțiunea 2
                                            </label><input type="text" name="opt2" placeholder="Adaugă Opțiunea 2"
                                                class="form-control" value="<?php echo $opt2; ?>">
                                        </div>

                                        <div class="form-group"><label for="opt3" class=" form-control-label">Opțiunea 3
                                            </label><input type="text" name="opt3" placeholder="Adaugă Opțiunea 3"
                                                class="form-control" value="<?php echo $opt3; ?>">
                                        </div>

                                        <div class="form-group"><label for="opt4" class=" form-control-label">Opțiunea 4
                                            </label><input type="text" name="opt4" placeholder="Adaugă Opțiunea 4"
                                                class="form-control" value="<?php echo $opt4; ?>">
                                        </div>

                                        <div class="form-group"><label for="raspuns" class=" form-control-label">Răspuns
                                                Corect
                                            </label><input type="text" name="raspuns"
                                                placeholder="Adaugă Răspunsul Corect" class="form-control"
                                                value="<?php echo $raspuns; ?>">
                                        </div>


                                        <div class="form-group">
                                            <input type="submit" name="submit1" value="Modifică Întrebare"
                                                class="btn btn-success">
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>



                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<?php
if(isset($_POST["submit1"]))
{
    mysqli_query($link, "UPDATE intrebari SET intrebare='$_POST[intrebare]',opt1='$_POST[opt1]',opt2=$_POST[opt2],opt3='$_POST[opt3]',opt4='$_POST[opt4]',raspuns='$_POST[raspuns]' WHERE id=$id");
    ?>
    <script type="text/javascript">
    window.location="adauga_editeaza_intrebari.php?id=<?php echo $id1 ?>";
    </script>
    <?php
}


?>


<?php
include "footer.php";
?>