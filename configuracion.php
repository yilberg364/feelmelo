<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/configuracion.css">
    <script src="scripts.js" defer></script>
    <title>Configuración y Privacidad - Fell melo</title>
</head>

<body>

<!-- Navbar -->
<nav class="navbar">
        <div class="nav-container">
            <a href="cont.php" class="nav-logo">
                <img src="img/fellcortewhite.jpg" alt="Fell Melo Logo" class="logo-img">
               
            </a>
            <ul class="nav-menu">
                <li><a href="cont.php" style="font-weight:bold;">Inicio</a></li>
                <li><a href="galeriaI.php" style="font-weight:bold;">Explorar</a></li>
                <li><a href="USUARIO/perfil.php" style="font-weight:bold;">Mi perfil</a></li>
            
            </ul>
        </div>
    </nav>

<section id="configuracion-privacidad">
    <h2>Configuración y Privacidad</h2>

    <form id="configuracion-form">
        <h3>Configuración de la cuenta</h3>
        <label for="nombreUsuario">Nombre de usuario:</label>
        <input type="text" id="nombreUsuario" name="nombreUsuario">

        <label for="emailUsuario">Email:</label>
        <input type="email" id="emailUsuario" name="emailUsuario">

        <label for="cambiarContrasena">Nueva contraseña:</label>
        <input type="password" id="cambiarContrasena" name="cambiarContrasena">

        <label for="confirmarContrasena">Confirmar nueva contraseña:</label>
        <input type="password" id="confirmarContrasena" name="confirmarContrasena">

        <h3>Privacidad</h3>
        <label for="perfilPublico">¿Deseas que tu perfil sea público?</label>
        <select id="perfilPublico" name="perfilPublico">
            <option value="si">Sí</option>
            <option value="no">No</option>
        </select>

        <label for="mostrarEmail">¿Mostrar tu email en el perfil?</label>
        <select id="mostrarEmail" name="mostrarEmail">
            <option value="si">Sí</option>
            <option value="no">No</option>
        </select>

        <h3>Notificaciones</h3>
        <label for="notificacionesEmail">¿Deseas recibir notificaciones por email?</label>
        <select id="notificacionesEmail" name="notificacionesEmail">
            <option value="si">Sí</option>
            <option value="no">No</option>
        </select>

        <h3>Seguridad</h3>
        <label for="autenticacionDosFactores">¿Activar autenticación de dos factores?</label>
        <select id="autenticacionDosFactores" name="autenticacionDosFactores">
            <option value="si">Sí</option>
            <option value="no">No</option>
        </select>

        <h3>Preferencias de publicidad</h3>
        <label for="publicidadPersonalizada">¿Deseas recibir anuncios personalizados?</label>
        <select id="publicidadPersonalizada" name="publicidadPersonalizada">
            <option value="si">Sí</option>
            <option value="no">No</option>
        </select>

        <input type="submit" value="Guardar Cambios">
        <button id="eliminarCuenta">Eliminar cuenta</button>
    </form>
</section>

<script>
document.getElementById('configuracion-form').addEventListener('submit', function(event) {
    event.preventDefault();
    // Aquí podrías añadir la lógica para guardar los cambios en tu base de datos o sistema
    alert('Cambios guardados');
});

document.getElementById('eliminarCuenta').addEventListener('click', function(event) {
    event.preventDefault();
    const confirmation = confirm("¿Estás seguro de que deseas eliminar tu cuenta? Esta acción es irreversible.");
    if (confirmation) {
        // Aquí la lógica para eliminar la cuenta del usuario
        alert('Cuenta eliminada');
    }
});
</script>

</body>
</html>
