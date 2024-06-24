<?php
include ("config/conexion.php"); // Asegúrate de que este archivo esté en la misma ubicación que db_config.php

// Asumo que el usuario está registrado y tienes su ID en una variable de sesión
session_start();
$id_usuario =  $_SESSION['id_usuario']; // Ajusta esto según cómo manejes las sesiones




if (
    $_POST['name'] =='' ||
    $_POST['email']=='' ||
    $_POST['message'] == ''


) {
    echo '<script>
        alert("Debes completar todos los campos");
        location.href = ("ayuda.php");        
 </script>';
} else {
    $id_usuario =  $_SESSION['id_usuario']; // Ajusta esto según cómo manejes las sesiones

    $nombre = $_POST['name'];
    $correo = $_POST['email'];
    $mensaje = $_POST['message'];
    
    //ejecutar la consulta de update

    $query_INSERT = "INSERT INTO d_ayuda (id_usuario, nombre, correo, mensaje) VALUES ( '$id_usuario','$nombre', '$correo', '$mensaje') ";
                            

    $execute_INSERT= mysqli_query($conn, $query_INSERT) or die(mysqli_error($conn));

    if ($execute_INSERT) {
        echo '<script>
                    alert("AYUDA ENVIADA");
                    location.href = ("ayuda.php");        
             </script>';
    } else {
        echo '<script>
                    alert("Lo siento algo salió mal");
                    location.href = ("ayuda.php");        
             </script>';
    }
}

