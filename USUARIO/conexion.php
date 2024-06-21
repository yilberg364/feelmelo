<?php

// Conexión a la base de datos
$host = "localhost";
$user = "root";
$pass = "";
$bd = "u197522469_feelmelo";

// Crea una conexión a la base de datos
$conn = mysqli_connect($host, $user, $pass, $bd);

// Comprueba si la conexión fue exitosa
if (!$conn) {
  die("Error en la conexión a la base de datos: " . mysqli_connect_error());
}

// Imprime un mensaje de éxito
echo "";

// Cierra la conexión a la base de datos
// mysqli_close($conn);

?>
