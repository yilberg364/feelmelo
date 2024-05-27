<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="CSS/cont.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/emoji-picker-element/styles/light.css">

  <style>
    .friend-list-item {
      display: flex;
      align-items: center;
      padding: 10px;
      cursor: pointer;
    }
    .friend-list-item img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      margin-right: 10px;
    }
    .messages {
      padding: 20px;
      border-left: 1px solid #e0e0e0;
      height: 450px;
      overflow-y: auto;
    }
    .message {
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 10px;
      background-color: #f0f0f0;
    }
    /* Agregado para mostrar el perfil seleccionado */
    .friend-list-item.active {
        background-color: #e0e0e0;
    }
    /* deslizante amigos  */
    .friend-list {
    max-height: 550px; /* Adjust this value based on your requirements */
    overflow-y: auto;
}
/* emojiii piker ------------------------------------------*/
.emoji-picker {
    position: absolute;
    top: 200px;
    right: 0;
    background-color: white;
    border: 1px solid #ccc;
    padding: 10px;
    display: none;
    z-index: 100;
    box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.2);
    border-radius: 5px;
    max-height: 200px;
    overflow-y: auto; /* Esto permite que la lista pueda desplazarse si tiene muchos emojis */

    width: 250px; /* Ancho fijo para el contenedor del emoji picker */
max-height: 300px; /* Altura máxima para el contenedor */
    overflow-y: auto; /* Permite desplazarse verticalmente si hay muchos emojis */
}

/* res´ponsive emojis */
@media only screen and (max-width: 600px) {
    .emoji-picker {
        width: 200px; /* Adjusted width for small screens */
        top: 1380px;   /* You might want to adjust the top positioning for small screens */
        right: 5px;  /* Providing a little margin from the right edge */
    }
}

/* For screens smaller than 400px */
@media only screen and (max-width: 400px) {
    .emoji-picker {
        width: 150px; /* Even smaller width for very small screens */
        top: 100px;   /* Further adjust the top positioning */
    }
}

/* ---------------- */
.emoji-list {

list-style-type: none;
padding: 0;
    margin: 0;
    display: block; /* Cambia de flex a block para que los emojis se muestren en una lista vertical */
    gap: 5px; /* Ajusta según prefieras, quizás ya no sea necesario */
}

.emoji-list li {
    font-size: 24px;
cursor: pointer;
padding: 5px;
border-radius: 5px;
transition: background-color 0.3s;
display: inline-block; /* Hace que los emojis se muestren en línea, pero vayan a la siguiente línea si no hay espacio */
margin-right: 10px; /* Espacio a la derecha de cada emoji */
margin-bottom: 10px; /* Espacio debajo de cada emoji */
}

.emoji-list li:hover {
background-color: #f2f2f2;
}

.mt-3.d-flex.align-items-center {
    position: relative;
}
/* mensaje de imagenes tamañoo -------------- */
.message-image {
    max-width: 400px;  /* El ancho máximo que deseas para la imagen */
    max-height: 400px; /* El alto máximo que deseas para la imagen */
    width: auto;
    height: auto;
    border-radius: 10px;  /* Redondea las esquinas de la imagen */
    display: block;
    margin: 10px 0; /* Espacio alrededor de la imagen */
}
/* ---------------------------lineas------ debajo------- del --------menu ----------*/
.links .col {
    position: relative; /* Esto permite que el pseudo-elemento se posicione relativo a este contenedor */
    padding-bottom: 5px;
    margin-bottom: 5px;
}

.links .col::before {
    content: ""; /* Esto es necesario para que el pseudo-elemento se muestre */
    position: absolute;
    bottom: 0; /* Posiciona el borde en la parte inferior de .col */
    left: 47%; /* Empieza en el centro del elemento */
    transform: translateX(-50%); /* Centra el borde */
    width: 40%; /* Ajusta este valor para controlar la longitud del borde */
    height: 1px;
    background-color: #1763E4;
}
.links .col:last-child::before {
    display: none;  /* Oculta la línea del último elemento */
}
.links .col:nth-child(1)::before { background-color: #003366; } /* Azul oscuro */
.links .col:nth-child(2)::before { background-color: #004480; }
.links .col:nth-child(3)::before { background-color: #0055aa; }
.links .col:nth-child(4)::before { background-color: #0066cc; }
.links .col:nth-child(5)::before { background-color: #0077ee; }
.links .col:nth-child(6)::before { background-color: #3399ff; }
.links .col:nth-child(7)::before { background-color: #66bbff; }
.links .col:nth-child(8)::before { background-color: #99ccff; }
.links .col:nth-child(9)::before { background-color: #cce0ff; } /* Azul claro */

/* menu */

#menu {
    width: 326px;
    background: linear-gradient(to bottom, #ffffff, #f6f6f6);
    /* Light gradient background */
    box-shadow: 3px 0 10px rgba(0, 0, 0, 0.1);
    /* Soft shadow for depth */
    height: 100vh;
    padding: 25px 0;
    font-size: 22px;
    position: fixed;
    transition: all 0.3s;
    /* Smooth transition for all properties */
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}
#menu::before {
    content: "";
    position: absolute;
    top: 50px;  /* Ajusta este valor para controlar dónde comienza la línea */
    right: 0;
    bottom: 0;
    width: 1px;
    background-color: #1763E4;
}

#menu a {
    text-decoration: none;
    color: #333;
    display: flex;
    align-items: center;
    /* Vertically centers icon and text */
    padding: 10px 60px;
    /* Increased left-right padding */
    transition: color 0.3s, background 0.3s;
    border-radius: 5px;
    /* Rounded corners for hover effect */
}

#menu a:hover {
    color: #555;
    background-color: #e8e8e8;
    /* Light background on hover */
}

#menu i {
    color: #333;
    font-size: 24px;
    margin-right: 10px;
    transition: transform 0.3s;
    /* Transition for icon animations */
}

#menu a:hover i {
    transform: rotate(5deg);
    /* Small rotation on hover for a playful effect */
}

.dashboard-title img {
    max-width: 60%;
    /* Increased size slightly */
    height: auto;
    display: block;
    margin: 20px auto 30px auto;
    /* Adjusted margin for better spacing */
    transition: transform 0.3s;
    /* Smooth transition for image interactions */
}

.dashboard-title img:hover {
    transform: scale(1.05);
    /* Slight zoom on hover */
}

@media (max-width: 768px) {
    #menu {
        width: 100%;
        height: auto;
        position: relative;
        box-shadow: none;
    }
    .content-container {
        margin-left: 0;
        padding: 10px;
        border-right: none;
    }
}
@font-face {
    font-family: 'SuperRavenPersonalUse';
    src: url('CSS/font/SuperRavenPersonalUse.ttf') format('truetype');
}
h4{
  padding:15px;
  font-family: 'SuperRavenPersonalUse', sans-serif !important;
  height: 60px;
  color: #0D6EFD;
}

/* }--------------------------t---------------------- */

  </style>
</head>
<body>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<!-- link emojiss ------->
<script type="module" src="https://cdn.jsdelivr.net/npm/emoji-picker-element"></script>

<div class="row">
    <div class="col-sm-3">
        <div class="container border">
            <!-- inicio de menu -->
        <div class="links" id="menu">
        <a href="cont.php">
            <img src="img/meloes.png" alt="Dashboard" style="width: 220px; height:90px">
        </a>

        <div class="grupos col">
            <a class="text-primary" href="galeriaI.php"> Publicaciones</a>
        </div>
        <div class="inicio col">
            <a class="text-primary" href="cont.php"> Inicio</a>
        </div>
        <div class="mensajes col">
            <a class="text-primary" href="mensajes.php"> Mensajes</a>
        </div>
        <div class="ayuda col">
            <a class="text-primary" href="LUGAR/zzz.php">Subir imagen</a>
        </div>
        <div class="configuracion col">
            <a class="text-primary" href="configuracion.php"> Configuracion y privacidad</a>
        </div>
        <div class="ayuda col">
            <a class="text-primary" href="ayuda.php"> Ayuda y soporte</a>
        </div>
        <div class="perfil col">
            <a class="text-primary" href="USUARIO/perfil.php"> Perfil</a>
        </div>

        
    </div>
        
        <!-- ----------------------------------------------- -->

        </div>
    </div>

  <!-- Friends Column -->
  <div class="col-sm-3">
    <h4>Amigos</h4>
    <div class="friend-list">
      <div class="friend-list-item">
        <img src="img/perfil1.webp" alt="Friend 1">
        <span>Ana Perez</span>
      </div>
      <div class="friend-list-item">
        <img src="img/perfil2.webp" alt="Friend 2">
        <span>Brayan Lombar</span>
      </div>
      <div class="friend-list-item">
        <img src="img/perfil3.jpg" alt="Friend 2">
        <span>Andres Encizo</span>
      </div>
      <div class="friend-list-item">
        <img src="img/perfil4.jpg" alt="Friend 2">
        <span>Daniela Candas</span>
      </div>
      <div class="friend-list-item">
        <img src="img/perfil5.jpg" alt="Friend 2">
        <span>Luis mera</span>
      </div>
      <div class="friend-list-item">
        <img src="img/perfil6.jpg" alt="Friend 2">
        <span>Marta Menrique</span>
      </div>
      <div class="friend-list-item">
        <img src="img/perfil7.jpg" alt="Friend 2">
        <span>Lopera Gonzales</span>
      </div>
      <div class="friend-list-item">
        <img src="img/perfil8.jpg" alt="Friend 2">
        <span>Felipe ariza</span>
      </div>
      <div class="friend-list-item">
        <img src="img/perfil9.jpg" alt="Friend 2">
        <span>Antonio Mendez</span>
      </div>
      <div class="friend-list-item">
        <img src="img/perfil10.webp" alt="Friend 2">
        <span>Ana socales</span>
      </div>
      
      <!-- ... otros amigos ... -->
    </div>
  </div>

  <!-- Conversation Column -->
  <div class="col-sm-6">
    <h4>Conversación</h4>
    <div class="messages">
    
      <!-- ... otros mensajes ... -->
    </div>

    <div class="mt-3 d-flex align-items-center">    
    <textarea class="form-control flex-grow-1 mr-2" id="messageInput" rows="2" placeholder="Escribe un mensaje..."></textarea>

    <!-- Emoji picker button -->
    <button class="btn btn-outline-secondary mr-2" id="emojiBtn">
        <i class='bx bx-smile'></i>
    </button>

    <!-- Image upload button -->
    <label class="btn btn-outline-secondary mr-2">
        <input type="file" id="imageUpload" accept="image/*" style="display: none;">
        <i class='bx bx-image'></i>
    </label>

    <!-- Send button -->
    <button class="btn btn-primary" id="sendMessageBtn">
        <i class='bx bx-send'></i>
    </button>
</div>

<div class="emoji-picker" style="display: none;">
<ul class="emoji-list">
    <li>😀</li>
    <li>😃</li>
    <li>😄</li>
    <li>😁</li>
    <li>😆</li>
    <li>😅</li>
    <li>😂</li>
    <li>🤣</li>
    <li>😊</li>
    <li>😇</li>
    <li>🙂</li>
    <li>🙃</li>
    <li>😉</li>
    <li>😌</li>
    <li>😍</li>
    <li>🥰</li>
    <li>😘</li>
    <li>😗</li>
    <li>😙</li>
    <li>😚</li>
    <li>😋</li>
    <li>😛</li>
    <li>😜</li>
    <li>😝</li>
    <!-- ... otros emojis ... -->
</ul>

</div>
  </div>

 
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
  const friendItems = document.querySelectorAll(".friend-list-item");
  const messagesContainer = document.querySelector(".messages");
  const messageInput = document.getElementById("messageInput");
  const sendMessageBtn = document.getElementById("sendMessageBtn");
  const emojiBtn = document.getElementById("emojiBtn");
  const imageUpload = document.getElementById("imageUpload");
  const emojiPicker = document.querySelector(".emoji-picker");
  const emojiList = document.querySelector(".emoji-list");
  
  let emojiPickerVisible = false;

  friendItems.forEach(item => {
    item.addEventListener("click", () => {
      friendItems.forEach(item => item.classList.remove("active"));
      item.classList.add("active");
      messagesContainer.innerHTML = "";
      const friendName = item.querySelector("span").textContent;
      const welcomeMessage = document.createElement("div");
      welcomeMessage.textContent = "Estás chateando con " + friendName;
      messagesContainer.appendChild(welcomeMessage);
    });
  });

  sendMessageBtn.addEventListener("click", function() {
    const messageText = messageInput.value.trim();

    if (messageText) {
      const newMessage = document.createElement("div");
      newMessage.classList.add("message");
      newMessage.textContent = messageText;
      messagesContainer.appendChild(newMessage);
      messageInput.value = '';
    }

    // Check if there's an image to send
    const imageFile = imageUpload.files[0];
    if (imageFile) {
      const imageMessage = document.createElement("div");
      imageMessage.classList.add("message", "image-message");

      const image = document.createElement("img");
      image.src = URL.createObjectURL(imageFile);
      image.classList.add("message-image");

      imageMessage.appendChild(image);
      messagesContainer.appendChild(imageMessage);

      // Clear the image upload input
      imageUpload.value = null;
    }
  });

  messageInput.addEventListener("keydown", function(event) {
    if (event.key === "Enter" && !event.shiftKey) {
      event.preventDefault();
      sendMessageBtn.click();
    }
  });

  emojiList.addEventListener("click", function(event) {
    if (event.target.tagName === "LI") {
      messageInput.value += event.target.textContent;
      toggleEmojiPicker();
    }
  });

  function toggleEmojiPicker() {
    emojiPickerVisible = !emojiPickerVisible;
    if (emojiPickerVisible) {
      emojiPicker.style.display = "block";
    } else {
      emojiPicker.style.display = "none";
    }
  }

  emojiBtn.addEventListener("click", function(event) {
    toggleEmojiPicker();
    event.stopPropagation(); // Prevent the event from bubbling up to the document
  });

  document.addEventListener("click", function(event) {
    if (!emojiPicker.contains(event.target) && event.target !== emojiBtn) {
      emojiPicker.style.display = "none";
      emojiPickerVisible = false;
    }
  });
});

</script>



</body>
</html>
