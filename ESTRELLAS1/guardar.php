<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "u197522469_feelmelo";

include "conexion.php";
$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
  die("Error en la conexión a la base de datos: " . mysqli_connect_error());
}

$rating = $_POST['rating'];
$review = $_POST['review'];
$image_url= $_FILES['image_url'];
// $lug_id= $_POST['lug_id'];
// $us_id=$_POST['us_id'];
// File upload handling

$image_url = "";
if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] === UPLOAD_ERR_OK) {
    $image_url = $_FILES['image_url']['name'];
    move_uploaded_file($_FILES['image_url']['tmp_name'], "C:\Users\Virtuales\direc" . $image_url);
}

$sql = "INSERT INTO feel_melo.reviews (rating, review, image_url, lug_id, us_id) VALUES ($rating, '$review', '$image_url',1,1)";

$result = mysqli_query($conn, $sql);

if ($result) {
  echo "Los datos se guardaron correctamente en la base de datos.";
} else {
  echo "Hubo un error al guardar los datos en la base de datos: " . mysqli_error($conn);
}

// mysqli_close($conn);
?>