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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/cont.css">
    <link rel="stylesheet" href="css/galeriaI.css">



<body>



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
                        <a class="text-primary" href="lugar/zzz.php">Subir imagen</a>
                    </div>
                    <div class="configuracion col">
                        <a class="text-primary" href="configuracion.php">Config y priv</a>
                    </div>
                    <div class="ayuda col">
                        <a class="text-primary" href="ayuda.php"> Ayuda y soporte</a>
                    </div>
                    <div class="perfil col">
                        <a class="text-primary" href="usuario/perfil.php"> Perfil</a>
                    </div>


                </div>



            </div>
        </div>
        <!--2 contenedor ---------------------------------  -->
        <!-- Contenido de imagenes y busqueda por categoria ------------------------------------------------------------------------------------- -->
        <?php
     include_once 'config/conexion.php';

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
        include_once 'config/conexion.php';

        // Fetch data
        $categories = getCategories($conn);
        $paises = getUniquePaises($conn);
        $category = $_GET['category'] ?? 'all';
        $paisSelected = $_GET['pais'] ?? 'all';
        $lugares = getLugares($conn, $category, $paisSelected);
        ?>

        <div class="col-md-9">
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
                                                <img src="<?php echo $fila['foto_url']; ?>" alt="Imagen de <?php echo $fila['nombre_lugar']; ?>" class="img-fluid" >
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

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<!-- <script src="pp.js"></script> -->