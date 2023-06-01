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

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Modifică Întrebări cu Imagini </h1>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <form name="form1" action="" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="col-lg-12">

                                <div class="card">
                                    <div class="card-header"><strong>Adaugă Întrebări Noi cu Imagini</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="form-group"><label for="intrebare"
                                                class=" form-control-label">Adaugă
                                                Întrebare
                                            </label><input type="text" name="intrebare" placeholder="Adaugă Întrebare"
                                                class="form-control" value="<?php echo $intrebare; ?>">
                                        </div>

                                        <div class="form-group">
                                            <img src="<?php echo $opt1; ?>" height="50" width="50"><br>
                                            <label for="opt1" class=" form-control-label">Opțiunea 1
                                            </label><input type="file" name="fopt1" class="form-control"
                                                style="padding-bottom:45px">
                                        </div>

                                        <div class="form-group">
                                            <img src="<?php echo $opt2; ?>" height="50" width="50"><br>
                                            <label for="opt2" class=" form-control-label">Opțiunea 2
                                            </label><input type="file" name="fopt2" class="form-control"
                                                style="padding-bottom:45px">
                                        </div>

                                        <div class="form-group">
                                            <img src="<?php echo $opt3; ?>" height="50" width="50"><br>
                                            <label for="opt3" class=" form-control-label">Opțiunea 3
                                            </label><input type="file" name="fopt3" class="form-control"
                                                style="padding-bottom:45px">
                                        </div>

                                        <div class="form-group">
                                            <img src="<?php echo $opt4; ?>" height="50" width="50"><br>
                                            <label for="opt4" class=" form-control-label">Opțiunea 4
                                            </label><input type="file" name="fopt4" class="form-control"
                                                style="padding-bottom:45px">
                                        </div>

                                        <div class="form-group">
                                            <img src="<?php echo $raspuns; ?>" height="50" width="50"><br>
                                            <label for="raspuns" class=" form-control-label">Răspuns
                                                Corect
                                            </label><input type="file" name="fraspuns" class="form-control"
                                                style="padding-bottom:45px">
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" name="submit2" value="Modifică Întrebare"
                                                class="btn btn-success">
                                        </div>




                                    </div>
                                </div>

                            </div>


                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<?php
if(isset($_POST["submit2"]))
{
    $opt1=$_FILES["fopt1"]["name"];
    $opt2=$_FILES["fopt2"]["name"];
    $opt3=$_FILES["fopt3"]["name"];
    $opt4=$_FILES["fopt4"]["name"];
    $raspuns=$_FILES["fraspuns"]["name"];
    $tm = md5(time());

    if($opt1!="")
    {
      
        $dst1 = "./opt_imagini/" . $tm . $opt1;
        $dst_db1 = "opt_imagini/" . $tm . $opt1;
        move_uploaded_file($_FILES["fopt1"]["tmp_name"], $dst1);

        mysqli_query($link,"UPDATE intrebari SET intrebare='$_POST[intrebare]',opt1='$dst_db1' where id=$id") or die(mysqli_error($link));
    }

    if($opt2!="")
    {
      
        $dst2 = "./opt_imagini/" . $tm . $opt2;
        $dst_db2 = "opt_imagini/" . $tm . $opt2;
        move_uploaded_file($_FILES["fopt2"]["tmp_name"], $dst2);

        mysqli_query($link,"UPDATE intrebari SET intrebare='$_POST[intrebare]',opt2='$dst_db2' where id=$id") or die(mysqli_error($link));
    }

    if($opt3!="")
    {
      
        $dst3 = "./opt_imagini/" . $tm . $opt3;
        $dst_db3 = "opt_imagini/" . $tm . $opt3;
        move_uploaded_file($_FILES["fopt3"]["tmp_name"], $dst3);

        mysqli_query($link,"UPDATE intrebari SET intrebare='$_POST[intrebare]',opt3='$dst_db3' where id=$id") or die(mysqli_error($link));
    }

    if($opt4!="")
    {
      
        $dst4 = "./opt_imagini/" . $tm . $opt4;
        $dst_db4 = "opt_imagini/" . $tm . $opt4;
        move_uploaded_file($_FILES["fopt4"]["tmp_name"], $dst4);

        mysqli_query($link,"UPDATE intrebari SET intrebare='$_POST[intrebare]',opt4='$dst_db4' where id=$id") or die(mysqli_error($link));
    }

    if($raspuns!="")
    {
      
        $dst5 = "./opt_imagini/" . $tm . $raspuns;
        $dst_db5 = "opt_imagini/" . $tm . $raspuns;
        move_uploaded_file($_FILES["fraspuns"]["tmp_name"], $dst5);

        mysqli_query($link,"UPDATE intrebari SET intrebare='$_POST[intrebare]',raspuns='$dst_db5' where id=$id") or die(mysqli_error($link));
    }

    mysqli_query($link,"UPDATE intrebari SET intrebare='$_POST[intrebare]' where id=$id") or die(mysqli_error($link));

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