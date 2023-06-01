<?php
session_start();
include "header.php";
include "../connection.php";

?>
       

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Adaugă Materia de Examen</h1>
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
                            <div class="card-header"><strong>Adaugă Materia de Examen</strong>
                        </div>
                            <div class="card-body card-block">
                                <div class="form-group"><label for="numeexamen" class=" form-control-label">Materie examen</label>
                                <input type="text" name="numeexamen" placeholder="Adaugă numele materiei" class="form-control" ></div>
                                  
                                <div class="form-group"><label for="timpexamen" class=" form-control-label">Timpul examenului în minute</label>
                                    <input type="text" placeholder="Adaugă Minute" class="form-control" name="timpexamen"></div>

                                    <div class="form-group">
                                        <input type="submit" name="submit1" value="Adauga examen" class="btn btn-success">
                                    </div>
                                      
                                                </div>
                                            </div>
                               
                            </div>
                            <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Materii</strong>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Nume Examen</th>
                                            <th scope="col">Timpul Examenului</th>
                                            <th scope="col">Editare</th>
                                            <th scope="col">Ștergere</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $count=0;
                                        $res=mysqli_query($link,"SELECT * FROM materie_examen");
                                        while($row=mysqli_fetch_assoc($res))
                                        {  $count=$count+1;
                                             ?>
                                         <tr>
                                            <th scope="row"><?php echo $count; ?></th>
                                            <td><?php echo $row["materie"]; ?></td>
                                            <td><?php echo $row["timp_examen_in_minute"]; ?></td>
                                            <td><a href="editare_examen.php?id=<?php echo $row["id"]?>">Editare</a></td>
                                            <td><a href="stergere.php?id=<?php echo $row["id"]?>">Ștergere</a></td>
                                        </tr>
                                        <?php
                                        
                                        }
                                        ?>
                                       
                                    </tbody>
                                </table>

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
    mysqli_query($link, "INSERT INTO materie_examen VALUES(NULL,'$_POST[numeexamen]','$_POST[timpexamen]')") or die(mysqli_error($link));?>
<script type="text/javascript">
    alert("Examen adăugat cu succes!");
    window.location.href=window.location.href;
    </script>
<?php

}
                              
 ?>

<?php
  include "footer.php";
 ?>
