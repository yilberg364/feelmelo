<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Image Grid Example</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="CSS/cont.css">
    <link rel="stylesheet" href="CSS/galeriaI.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="pp.js"></script>

    <style>
        .image-grid {

            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }

        .image-card {
            border: 1px solid #ccc;
            padding: 5px;
            max-width: 51%;
            margin-left: 20%;
            border-radius: 5px;
        }

        .image-card img {
            max-width: 100%;
            height: auto;

        }

        .border {
            text-align: center;
        }

        /* Estilo por defecto: 1 imagen por fila en dispositivos pequeños */
        .image-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 10px;
        }

        /* Estilo para pantallas medianas y grandes: 3 imágenes por fila */
        @media (min-width: 768px) {
            .image-grid {
                grid-template-columns: repeat(1, 1fr);
            }
        }

        /* css del modal */
        .custom-modal .modal-dialog {
            max-width: 75%;
            height: 85vh;
            overflow-y: auto;
        }

        .custom-modal .modal-content {
            height: 100%;
        }

        .custom-modal .modal-body,
        .custom-modal .modal-body .row,
        .custom-modal .modal-body .row .col-md-6 {
            height: 100%;
            /* Ensure the body, row, and column are all taking up the full height of the modal */
        }

        /* -------------------------------- */
        /* comentarios */
        .fixed-comment-form {
            position: fixed;
            margin-left: -23px;
            bottom: 5px;
            /* Espaciado desde el fondo */
            width: 25%;
            /* Ajusta según necesidad */
            background-color: #fff;
            /* Fondo blanco para destacarlo sobre el contenido del modal */
        }

        .comment-item {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        .comment-username {
            font-weight: bold;
            color: #333;
        }

        .comment-text {
            color: #555;
        }


        /* --------------------------- */
        /* css hastag */
        .hashtag {
            display: inline-block;
            padding: 5px 50px;
            margin: 15px;
            border: none;
            cursor: pointer;
            border-radius: 15px;
            background-color: #AEDFF7;
            /* Azul suave */
            color: #333;
            /* Color de texto oscuro para contrastar con el azul suave */
            font-weight: 600;
            text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.3);
            /* Sombra blanca para el texto para más legibilidad */
            transition: all 0.3s;

            /* Sombras suaves para un efecto elevado */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .hashtag:hover {
            background-color: #8FCCF3;
            /* Un azul un poco más oscuro al pasar el mouse */
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.1);
        }

        .hashtag:active {
            transform: scale(0.95);
            /* Efecto de presionar al hacer clic */
        }

        /* --------------------------------------------------------------------- */
        /* pais */
        #pais-dropdown {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            cursor: pointer;
        }

        #pais-dropdown span {
            padding: 12px 16px;
            display: block;
        }

        /* ------------------------------------------ */
        /* ---------------------------lineas------ debajo------- del --------menu ----------*/
        .links .col {
            position: relative;
            /* Esto permite que el pseudo-elemento se posicione relativo a este contenedor */
            padding-bottom: 5px;
            margin-bottom: 5px;
        }

        .links .col::before {
            content: "";
            /* Esto es necesario para que el pseudo-elemento se muestre */
            position: absolute;
            bottom: 0;
            /* Posiciona el borde en la parte inferior de .col */
            left: 47%;
            /* Empieza en el centro del elemento */
            transform: translateX(-50%);
            /* Centra el borde */
            width: 40%;
            /* Ajusta este valor para controlar la longitud del borde */
            height: 1px;
            background-color: #1763E4;
        }

        .links .col:last-child::before {
            display: none;
            /* Oculta la línea del último elemento */
        }

        .links .col:nth-child(1)::before {
            background-color: #003366;
        }

        /* Azul oscuro */
        .links .col:nth-child(2)::before {
            background-color: #004480;
        }

        .links .col:nth-child(3)::before {
            background-color: #0055aa;
        }

        .links .col:nth-child(4)::before {
            background-color: #0066cc;
        }

        .links .col:nth-child(5)::before {
            background-color: #0077ee;
        }

        .links .col:nth-child(6)::before {
            background-color: #3399ff;
        }

        .links .col:nth-child(7)::before {
            background-color: #66bbff;
        }

        .links .col:nth-child(8)::before {
            background-color: #99ccff;
        }

        .links .col:nth-child(9)::before {
            background-color: #cce0ff;
        }

        /* Azul claro */

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
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        #menu::before {
            content: "";
            position: absolute;
            top: 50px;
            /* Ajusta este valor para controlar dónde comienza la línea */
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
            padding: 10px 44px;
            /* Increased left-right padding */
            transition: color 0.3s, background 0.3s;
            border-radius: 5px;
            /* Rounded corners for hover effect */
        }

        #menu a {
            text-decoration: none;
            color: #333;
            display: flex;
            align-items: center;
            /* Vertically centers icon and text */
            padding: 10px 44px;
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

        /* --------------------------t---------------------- */
        .col-sm-3 {
            width: 20%;
        }

        /* DESCRIPCION DEL MODAL  */
        @font-face {
            font-family: 'Goffik';
            src: url('./CSS/font/Goffik-O.ttf') format('truetype');
        }


        .nmodal {
            font-family: 'Goffik', sans-serif !important;
            font-size: 50px;
            color: #007BFF;
        }

        @font-face {
            font-family: 'SuperRavenPersonalUse';
            src: url('./CSS/font/SuperRavenPersonalUse.ttf') format('truetype');
        }

        .dcmodal {
            font-family: 'SuperRavenPersonalUse', sans-serif !important;
            font-size: 24px;
        }

        #text {
            margin-left: 40px;
        }
    </style>
</head>

<body>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <div class="row">
        <div class="col-sm-3">
            <div class="container border">
                <!-- inicio de menu -->
                <div class="links" id="menu" style="height: 700px;">
                    <a href="cont.php">
                        <img src="img/meloes.png" alt="Dashboard" style="width: 220px; height:90px">
                    </a>

                    <div class="grupos col">
                        <a class="text-primary" href="galeriaI.php" id="text"> Publicaciones</a>
                    </div>
                    <div class="inicio col">
                        <a class="text-primary" href="cont.php" id="text"> Inicio</a>
                    </div>
                    <div class="mensajes col">
                        <a class="text-primary" href="mensajes.php" id="text"> Mensajes</a>
                    </div>
                    <div class="ayuda col">
                        <a class="text-primary" href="LUGAR/zzz.php" id="text">Subir imagen</a>
                    </div>
                    <div class="configuracion col">
                        <a class="text-primary" href="configuracion.php"> Configuracion y privacidad</a>
                    </div>
                    <div class="ayuda col">
                        <a class="text-primary" href="ayuda.php" id="text"> Ayuda y soporte</a>
                    </div>
                    <div class="perfil col">
                        <a class="text-primary" href="USUARIO/perfil.php" id="text"> Perfil</a>
                    </div>


                </div>


                <!-- ----------------------------------------------- -->

            </div>
        </div>
        <!--2 contenedor ---------------------------------  -->
        <!-- Contenido de imagenes y busqueda por categoria ------------------------------------------------------------------------------------- -->
        <?php
        require_once('conexion.php');

        function getComentarios($conn, $lugar_id)
        {
            $query = "SELECT cal.comentario, usu.nombre_us 
              FROM calificaciones cal
              JOIN usuarios usu ON cal.user_id = usu.usuario_id
              WHERE cal.lug_id =?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $lugar_id);
            $stmt->execute();
            return $stmt->get_result();
        }

        function getUsuario($conn, $id_usu)
        {
            $query = "SELECT nombre_us from usuarios WHERE usuario_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $id_usu);
            $stmt->execute();
            return $stmt->get_result();
        }



        function getCategories($conn)
        {
            $query = "SELECT DISTINCT categoria FROM lugares";
            $result = mysqli_query($conn, $query);
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }

        function getUniquePaises($conn)
        {
            $query = "SELECT DISTINCT pais FROM lugares";
            $result = mysqli_query($conn, $query);
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }



        function getLugares($conn, $category = 'all', $pais = 'all')
        {
            $query = "SELECT * FROM lugares";
            $params = [];

            if ($category != 'all' && $pais != 'all') {
                $query .= " WHERE categoria = ? AND pais = ?";
                $params = array($category, $pais);
            } elseif ($category != 'all') {
                $query .= " WHERE categoria = ?";
                $params = array($category);
            } elseif ($pais != 'all') {
                $query .= " WHERE pais = ?";
                $params = array($pais);
            }

            $query .= " ORDER BY lugar_id DESC";

            $stmt = $conn->prepare($query);
            if (!empty($params)) {
                $stmt->bind_param(str_repeat("s", count($params)), ...$params);
            }
            $stmt->execute();
            return $stmt->get_result();
        }

        $categories = getCategories($conn);
        $paises = getUniquePaises($conn);

        $category = $_GET['category'] ?? 'all';
        $paisSelected = $_GET['pais'] ?? 'all';

        $lugares = getLugares($conn, $category, $paisSelected);


        // Connection to the database
        require_once('conexion.php');

        // Fetch data
        $categories = getCategories($conn);
        $paises = getUniquePaises($conn);
        $category = $_GET['category'] ?? 'all';
        $paisSelected = $_GET['pais'] ?? 'all';
        $lugares = getLugares($conn, $category, $paisSelected);
        ?>

        <div class="col-md-9"><br><br>
            <div class="container border">
                <div class="category-filter">
                    <span class="hashtag" onclick="togglePaisDropdown()">#país</span>
                    <div id="pais-dropdown" style="display: none;">
                        <?php foreach ($paises as $pais) : ?>
                            <span onclick="filterByPais('<?php echo htmlspecialchars($pais['pais']); ?>')">#<?php echo htmlspecialchars($pais['pais']); ?></span>
                        <?php endforeach; ?>
                    </div>
                    <?php foreach ($categories as $cat) : ?>
                        <span class="hashtag" onclick="filterByCategory('<?php echo htmlspecialchars($cat['categoria']); ?>')">#<?php echo htmlspecialchars($cat['categoria']); ?></span>
                    <?php endforeach; ?>
                </div>

                <div class="image-grid">
                    <?php while ($fila = $lugares->fetch_assoc()) : ?>
                        <div class="image-card">
                            <img src="<?php echo $fila['foto_url']; ?>" alt="Imagen de <?php echo $fila['nombre_lugar']; ?>" style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#imageModal<?php echo $fila['lugar_id']; ?>">
                        </div>

                        <!-- Modal for each image ------------------------------------------m-->
                        <div class="modal fade custom-modal" id="imageModal<?php echo $fila['lugar_id']; ?>" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="row mb-4">
                                            <!-- Column for the Image -->
                                            <div class="col-md-6">
                                                <img src="<?php echo $fila['foto_url']; ?>" alt="Imagen de <?php echo $fila['nombre_lugar']; ?>" class="img-fluid" style="height: 100%; object-fit: cover;">
                                            </div>
                                            <!-- Column for the Information and Comment Form -->
                                            <div class="col-md-6">
                                                <h4 class="nmodal"><?php echo $fila['nombre_lugar']; ?></h4>
                                                <p class="pmodal"><?php echo $fila['pais']; ?></p>
                                                <p class="dmodal"><?php echo $fila['descripcion']; ?></p>
                                                <h5 class="dcmodal"><?php echo $fila['categoria']; ?></h5>

                                                <!-- Section for Comments -->
                                                <!-- Divisor antes de iniciar los comentarios -->
                                                <hr style="border-top: 1px solid black; margin: 10px 0;">

                                                <?php
                                                $comentarios = getComentarios($conn, $fila['lugar_id']);
                                                while ($comentario = $comentarios->fetch_assoc()) :
                                                ?>
                                                    <div class="comment">
                                                        <div class="comment-item" style="margin-bottom: 10px;">
                                                            <!-- Mostrar nombre de usuario en color oscuro -->
                                                            <strong style="color: black;"><?php echo $comentario['nombre_us']; ?></strong>
                                                            <!-- Mostrar comentario en un tono más claro -->
                                                            <span style="color: #888; padding-left: 5px;"><?php echo $comentario['comentario']; ?></span>
                                                        </div>
                                                        <!-- Línea divisoria entre comentarios -->
                                                        <hr style="border-top: 1px solid #eee; margin: 0px 0;">
                                                    </div>

                                                <?php endwhile; ?>
                                                <?php
                                                $id_usu = $_SESSION['id_usuario'];
                                                $usuario = getUsuario($conn, $id_usu);
                                                while ($row = $usuario->fetch_assoc()) :

                                                ?>
                                                    <!-- Comment form -->
                                                    <div class="fixed-comment-form mt-3">
                                                        <form class="publicar-comentario" action="publicar_comentario.php" method="post">
                                                            <div class="form-group">
                                                                <textarea class="form-control" name="comentario" placeholder="Añade un comentario..."></textarea>

                                                                <!-- Campos ocultos para user_id y lug_id -->
                                                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['id_usuario']; ?>">
                                                                <input type="hidden" name="nombre_us" value="<?php echo $row['nombre_us']; ?>"> <!-- Asumiendo que el user_id está en una sesión -->
                                                                <input type="hidden" name="lug_id" value="<?php echo $fila['lugar_id']; ?>">

                                                                <button type="submit" class="btn btn-primary">Publicar comentario</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                <?php endwhile; ?>
                                                <div class="commentSection"></div>


                                                <!-- -------------------------------------------- -->


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>


        <script>
            function togglePaisDropdown() {
                const dropdown = document.getElementById('pais-dropdown');
                dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
            }

            function filterByCategory(category) {
                window.location.href = '?category=' + category;
            }

            function filterByPais(pais) {
                window.location.href = '?pais=' + pais;
            }
        </script>



</body>

</html>