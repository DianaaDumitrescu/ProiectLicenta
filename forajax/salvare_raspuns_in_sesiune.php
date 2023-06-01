<?php 
session_start();
$intrebarenr=$_GET["intrebarenr"];
$valoare1=$_GET["valoare1"];
$_SESSION["raspuns"][$intrebarenr]=$valoare1;
?>