<?php
session_start();
include "../connection.php";
$total_int=0;
$res1=mysqli_query($link,"SELECT * FROM intrebari WHERE materie='$_SESSION[materie_examen]'");
$total_int=mysqli_num_rows($res1);
echo $total_int;

?>