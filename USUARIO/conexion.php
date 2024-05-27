<?php

// Conexión a la base de datos
$host = "localhost";
$user = "u197522469_feelmelo";
$pass = "M4t5d3l4c*";
$bd = "u197522469_feelmelo";

// Crea una conexión a la base de datos
$conn = mysqli_connect($host, $username, $password, $dbname);

// Comprueba si la conexión fue exitosa
if (!$conn) {
  die("Error en la conexión a la base de datos: " . mysqli_connect_error());
}

// Imprime un mensaje de éxito
echo "";

// Cierra la conexión a la base de datos
// mysqli_close($conn);

?>
