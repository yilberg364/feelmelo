<?php
include "conexion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHAT CON,PHP,MYSQL Y AJAX</title>

<script type="text/javascript">
  function ajax(){
    var req = new XMLHttpRequest();

    req.onreadystatechange = function(){
        if (req.readyState == 4 && req.status == 200){
            document.getElementById('chat').innerHTML = req.responseText;
        }
    }
    req.open('GET', 'chat.php', true)
    req.send();
  }

//linea que hace que se refresque la pagina cada segundo

setInterval(function(){ajax();},1000);
</script>

<style>
   *{
    padding: 0;
    margin: 0;
    border: 0;
   } 
   body{
    background: #972247;
   }
   #contenedor{
    width: 40%;
    background: #fff;
    margin: 0 auto;
    padding: 20px;
    border-radius: 12px;
    -moz-border-radius:12px;
    -o-border-radius:12px;
    -webkit-border-radius:12px;
   }

   #caja-chat{
    width: 90%;
    height: 400px;
   }

   #datos-chat{
    width: 100%;
    padding: 5px;
    margin-bottom: 5px;
    border-bottom: 1px solid silver;
    font-weight: bold;
    font-family:'Courier New', Courier, monospace;
   }
   input[type='text']{
    width: 100%;
    height: 40px;
    border:1px solid gray;
    border-radius: 5px;
    -moz-border-radius:5px;
    -o-border-radius:5px;
    -webkit-border-radius:5px;
   }

   input[type='submit']{
    width: 100%;
    height: 40px;
    border:1px solid gray;
    border-radius: 5px;
    -moz-border-radius:5px;
    -o-border-radius:5px;
    -webkit-border-radius:5px;
    cursor: pointer;
   }

   textarea{
    width: 100%;
    height: 40px;
    border:1px solid gray;
    border-radius: 5px;
    -moz-border-radius:5px;
    -o-border-radius:5px;
    -webkit-border-radius:5px;
   }

   input, textarea{
    margin-bottom: 3px;
   }

</style>
</head>
<body onload="ajax();">


<div id="contenedor">
    <div id="caja-chat">
        <div id="chat"></div>
    </div>
    <form method="POST" action="prueba.php">
      <input type="text" name="nombre" placeholder="Ingresa tu nombre">
      <textarea name="mensaje" placeholder="Ingresa tu mensaje"></textarea>
      <input type="submit" name="enviar" value="Enviar">
    </form>
    <?php
     if (isset($_POST['enviar'])){
        $nombre = $_POST['nombre'];
        $mensaje = $_POST['mensaje'];

        $consulta = "INSERT INTO chat (nombre, mensaje) VALUES ('$nombre', '$mensaje')";
             $ejecutar = $conn->query($consulta);

             if ($ejecutar){
                echo "<embed loop='false' src='beep.mp3' hidden='true' autoplay='true'>";
             }
     }
?>
</div>







</body>
</html>