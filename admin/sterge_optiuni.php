<?php
session_start();
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
mysqli_query($link,"DELETE FROM intrebari WHERE id=$id");
?>
 
    <script type="text/javascript">
    window.location="adauga_editeaza_intrebari.php?id=<?php echo $id1 ?>";
    </script>