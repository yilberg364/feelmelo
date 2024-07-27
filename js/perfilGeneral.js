document.getElementById('boton-editar').addEventListener('click', function () {
    document.getElementById('boton-editar').style.display = 'none';
    document.getElementById('profile-actions').style.display = 'block';
});


function displayImage(src, title, description) {
    const imageCard = document.createElement("div");
    imageCard.classList.add("image-card");

    const image = document.createElement("img");
    image.src = src;
    image.alt = title;

    const imageTitle = document.createElement("h3");
    imageTitle.textContent = title;

    const imageDescription = document.createElement("p");
    imageDescription.textContent = description;

    imageCard.appendChild(image);
    imageCard.appendChild(imageTitle);
    imageCard.appendChild(imageDescription);
    uploadedImagesDiv.appendChild(imageCard);
}

// Añadimos un 'event listener' al botón con el ID 'habilitar-cambio-contrasena'.
// Esto significa que cuando se haga clic en ese botón, se ejecutará la función proporcionada.
document.getElementById('habilitar-cambio-contrasena').addEventListener('click', function () {
    // Obtenemos una referencia al campo de entrada (input) de la contraseña mediante su ID 'contrasena'.
    let inputContrasena = document.getElementById('contrasena');
    
    // Verificamos si el tipo actual del campo de entrada es 'password'.
    if (inputContrasena.type === 'password') {
        // Si el campo es de tipo 'password', cambiamos su tipo a 'text'.
        // Esto hace que el contenido de la contraseña sea visible en lugar de oculto.
        inputContrasena.type = 'text';
        
        // Eliminamos el atributo 'readonly', permitiendo que el usuario pueda editar el campo.
        inputContrasena.removeAttribute('readonly');
        
        // Quitamos la clase 'contrasena' del campo de entrada.
        // Esto es útil si usamos esta clase para aplicar estilos específicos cuando el campo es de tipo 'password'.
        inputContrasena.classList.remove('contrasena');
    } else {
        // Si el campo no es de tipo 'password', cambiamos el tipo a 'password'.
        // Esto oculta el contenido de la contraseña nuevamente.
        inputContrasena.type = 'password';
        
        // Añadimos el atributo 'readonly', haciendo que el campo sea solo de lectura.
        // Esto evita que el usuario pueda modificar el campo directamente.
        inputContrasena.setAttribute('readonly', 'readonly');
        
        // Añadimos la clase 'contrasena' al campo de entrada.
        // Esto es útil para aplicar estilos específicos cuando el campo es de tipo 'password'.
        inputContrasena.classList.add('contrasena');
    }
});

