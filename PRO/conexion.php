<?php
$host = "localhost";
$user = "u197522469_feelmelo";
$pass = "M4t5d3l4c*";
$bd = "u197522469_feelmelo";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// Connection is successful
?>
