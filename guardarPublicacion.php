
<?php
session_start(); // Inicia la sesión para acceder a las variables de sesión


include_once '../config/conexion.php';


// Verificar la conexión
if ($conn->connect_error) {
    die("la conexión falló: " . $conn->connect_error);
}

// Obtener los datos del formulario
$pais = $_POST['pais'] ?? '';
$ubicacion = $_POST['ubicacion'] ?? '';
$descripcion = $_POST['descripcion'] ?? '';
$categoria = $_POST['categoria'] ?? '';
$foto_url = ''; // Initialize as empty, will be set later if file upload is successful

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
         $foto_url = "LUGAR/".$foto_url;
    }else{
         print_r($errors);
    }
}

// Prepare your SQL statements to prevent SQL injection.
$stmt = $conn->prepare("INSERT INTO lugares (nombre_lugar, ubicacion, descripcion, categoria, pais, ciudad, foto_url, user_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssi", $nombre_lugar, $ubicacion, $descripcion, $categoria, $pais, $ciudad, $foto_url, $_SESSION['id_usuario']);

if ($stmt->execute() === TRUE) {
    echo '<script>alert("Lugar guardado");window.location.href = "cont.php";</script>';

} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
