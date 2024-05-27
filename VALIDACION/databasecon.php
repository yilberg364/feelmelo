<?php

$host = "localhost";
$user = "root";
$pass = "";
$bd = "u197522469_feelmelo";

$con = mysqli_connect($host, $user, $pass);

mysqli_select_db($con, $bd);

return $con;
?>