<?php

include("connect.php");


$id = $_GET["id"];
$qeu = "delete from info where id='".$id."' ";
 mysqli_query($con , $qeu);
 header("Location:select.php");


?>