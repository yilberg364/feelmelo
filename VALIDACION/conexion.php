<?php
include "databasecon.php";
$con = new mysqli($host,$user,$pass,$bd);

if (mysqli_connect_errno()) {
    echo "No Conectado", mysqli_connect_errno();
    exit();
}else {
   
}
?>