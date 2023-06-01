<?php
session_start();
include "../connection.php";
$materie_examen = $_GET["materie_examen"];
$_SESSION["materie_examen"] = $materie_examen;
$res = mysqli_query($link, "select * from materie_examen where materie='$materie_examen'");
while ($row = mysqli_fetch_array($res)) {
    $_SESSION["exam_time"] = $row["timp_examen_in_minute"];
}
$date = date("Y-m-d H:i:s");

$_SESSION["end_time"] = date("Y-m-d H:i:s", strtotime($date . "+$_SESSION[exam_time] minutes"));
$_SESSION["exam_start"] = "yes";
?>