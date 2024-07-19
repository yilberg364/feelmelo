<?php
include_once 'config/conexion.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="css/mensajes.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/emoji-picker-element/styles/light.css">


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

  </div>
  <form action="logicaMensajes.php">
    <div class="col-sm-4">
      <h4>Conversación</h4>
      <div class="messages">
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

        </ul>
      </div>
    </div>
  </form>


  <!-- ESTE ESCRIPT PERMITE SELECCIANAR EL USUARIO Y ENVIAR EL MENSAJE -->
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