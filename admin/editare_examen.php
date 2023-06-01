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

$id=$_GET["id"];
$res=mysqli_query($link,"select * from materie_examen where id=$id");
while($row=mysqli_fetch_array($res))
{
    $materie_examen=$row["materie"];
    $timp_examen=$row["timp_examen_in_minute"];
}
?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Editează Materia de Examen</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <form name="form1" action="" method="post">
                            <div class="card-body">
                            <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header"><strong>Editează Materia de Examen</strong>
                        </div>
                            <div class="card-body card-block">
                                <div class="form-group"><label for="numeexamen" class=" form-control-label">Materie examen</label>
                                <input type="text" name="numeexamen" placeholder="Adaugă numele materiei" class="form-control" value="<?php echo $materie_examen; ?>" ></div>
                                  
                                <div class="form-group"><label for="timpexamen" class=" form-control-label">Timpul examenului în minute</label>
                                    <input type="text" placeholder="Adaugă câte Minute" class="form-control" name="timpexamen" value="<?php echo $timp_examen; ?>"></div>

                                    <div class="form-group">
                                        <input type="submit" name="submit1" value="Modifică Examen" class="btn btn-success">
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
 if(isset($_POST["submit1"]))
{
    mysqli_query($link, "UPDATE materie_examen SET materie='$_POST[numeexamen]',timp_examen_in_minute='$_POST[timpexamen]' WHERE id=$id") or die(mysqli_error($link));?>
<script type="text/javascript">
 
    window.location="categorie_examen.php";
    </script>
<?php

}
                              
 ?>

<?php
  include "footer.php";
 ?>
