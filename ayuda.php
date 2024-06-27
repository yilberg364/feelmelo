<?php

session_start();
$id= $_SESSION['id_usuario'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayuda y Soporte - Fell Melo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/ayuda.css">
</head>
<body>

   <!-- Navbar -->
   <nav class="navbar">
        <div class="nav-container">   
            <a href="cont.php" class="nav-logo">
                <img src="img/fellcortewhite.jpg" alt="Fell Melo Logo" class="logo-img">
               
            </a>
            <ul class="nav-menu">
                <li><a href="cont.php">Inicio</a></li>
                <li><a href="galeriaI.php">Explorar</a></li>
                <li><a href="USUARIO/perfil.php">Mi perfil</a></li>
            
            </ul>
            <button type="button" class="btn-close" aria-label="Close"></button>
            
            
        </div>
    </nav>

    <div class="support-container">
        <h2>Ayuda y Soporte</h2>
        
        <!-- Sección de preguntas frecuentes -->
        <section class="faq">
            <h3>Preguntas frecuentes</h3>
            <div class="faq-item" onclick="toggleAnswer('answer1')">
                <p>¿Cómo subo imágenes?</p>
                <p id="answer1" class="faq-answer">Para subir imágenes tienes que estar "REGISTRADO", haz clic en el botón "Subir Imagen" en el Menu al lado izquierdo de la página.</p>
            </div>
            <!-- otro -->
            <div class="faq-item" onclick="toggleAnswer('answer2')">
                <p>¿Por que en explorar aparecen imagenes y no su informacion?</p>
                <p id="answer2" class="faq-answer">Tienes que darle "CLICK" en la imagen para que se despliegue una ventana y le muestre su informacion.</p>
            </div>
            <!-- Repite el div "faq-item" para más preguntas y respuestas -->
     
        </section>

        <!-- Formulario de contacto para soporte -->
        <section class="contact-form">
    <h3>¿No encuentras lo que buscas? Contáctanos</h3>
    
    <!-- Un solo formulario que apunta a enviar_ayuda.php -->
    <form action="enviar_ayuda.php" method="post">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Mensaje:</label>
        <textarea id="message" name="message" rows="4" required></textarea>

        <input type="submit" value="Enviar">
    </form>
</section>


   

    <script>
function toggleAnswer(answerId) {
    const answer = document.getElementById(answerId);
    if (answer.style.display === "none" || answer.style.display === "") {
        answer.style.display = "block";
    } else {
        answer.style.display = "none";
    }
}
    </script> 
</body>
</html>
