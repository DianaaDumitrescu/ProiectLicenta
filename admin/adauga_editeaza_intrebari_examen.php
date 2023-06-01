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
            <div class="col-sm-12">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Selectează Materia de Examen pentru Adăugarea sau Editarea Întrebărilor</h1>
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
                            <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Nume Examen</th>
                                            <th scope="col">Timpul Examenului</th>
                                            <th scope="col">Selectează</th>
                                           
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
                                            <td><a href="adauga_editeaza_intrebari.php?id=<?php echo $row["id"]?>">Selectează</a></td>
                                          
                                        </tr>
                                        <?php
                                        
                                        }
                                        ?>
                                       
                                    </tbody>
                                </table>
                               
                            </div>
                        </div>

                    </div>
                    <!--/.col-->
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->
        <?php
        include "footer.php";
        ?>
