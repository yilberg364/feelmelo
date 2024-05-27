<?php
session_start();

$host = "localhost";
$dbname = "feel_melo";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password, $dbname);


// Conexión a la base de datos
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("La conexión falló: " . $e->getMessage());
}
// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario'])) {
    echo '<script>alert("Debes iniciar sesión para calificar"); window.location = "index.php";</script>';
    exit;
}
// Obtener los datos del formulario
$calificacion = $_POST['calificacion'] ?? '';
$comentario = $_POST['comentario'] ?? '';
$lugar_id = $_POST['lugar_id'] ?? '';
$user_id = $_SESSION['id_usuario'] ?? ''; // Asegúrate de que esta variable esté definida en tu sesión
$foto_url = '';// Initialize as empty, will be set later if file upload is successful

// Insertar imágenes
if(isset($_FILES['imagen'])){
    // ... (código para manejar la carga de imágenes, como lo tienes en tu código original)
    $errors= array();
    $file_name = $_FILES['imagen']['name'];
    $file_size =$_FILES['imagen']['size'];
    $file_tmp =$_FILES['imagen']['tmp_name'];
    $file_type=$_FILES['imagen']['type'];
    $temp = explode('.', $_FILES['imagen']['name']);
    $file_ext=strtolower(end($temp));
    
    // Add more extensions as needed
    $expensions= array("jpeg","jpg","png","gif","bmp","webp","svg");

    // Validate file extension
    if(in_array($file_ext,$expensions)=== false){
         $errors[]="Extension not allowed, please choose a JPEG, PNG, GIF, BMP, WEBP, or SVG file.";
    }

    // Validate file size
    if ($file_size > 5 * 1024 * 1024) {
        $errors[] = 'File size must be less than or equal to 5 MB';
    }
    

    // Validate MIME type
    $valid_mime_types = array("image/gif", "image/jpeg", "image/jpg", "image/png", "image/bmp", "image/webp", "image/svg+xml");
    $file_info = finfo_open(FILEINFO_MIME_TYPE);
    $mime_type = finfo_file($file_info, $_FILES['imagen']['tmp_name']);

    if (!in_array($mime_type, $valid_mime_types)) {
        $errors[] = "File type not allowed, please upload an image.";
    }

    // Move file to target directory and set $foto_url
    if(empty($errors)==true){
         $target_dir = "images/";
         if (!file_exists($target_dir)) {
             mkdir($target_dir, 0777, true);
         }
         $target_file = $target_dir . basename($file_name);
         move_uploaded_file($file_tmp, $target_file);
         echo "Success";
         $foto_url = $target_file; // Here's your file URL you can store in the database
         $foto_url = "".$foto_url;
    }else{
         print_r($errors);
    }
}

$stmt = $conn->prepare("INSERT INTO calificaciones (calificacion, comentario, user_id, lug_id, foto_url) 
VALUES(?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $calificacion, $comentario, $_SESSION['id_usuario'], $lugar_id, $foto_url);

if ($stmt->execute() === TRUE) {
    echo '<script>alert("Calificación guardada");window.location = "cont.php";</script>';
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();


?>
