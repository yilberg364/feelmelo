<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div class="row">
    <div class="col s8 offset-s2">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>rating</th>
                    <th>review</th>
                    <th>Image_Url</th>
                    <th>Created_At</th>
                    <th>UPdate_At</th>
                </tr>
            </thead>

            <?php
           
           include_once 'config/conexion.php';

             $query="SELECT * FROM ratings";
             $execute=mysqli_query($conn, $query) or die (mysqli_error($conexion));

             while($fila=mysqli_fetch_array($execute)){

             
            ?>

            <tbody>
                <tr>
                    <td><?php echo $fila['id'] ?></td>
                    <td><?php echo $fila['rating'] ?></td>
                    <td><?php echo $fila['review'] ?></td>
                    <td><img src="<?php echo $fila['image_url'] ?>" width="120" alt="Image" /></td>
                    <td><?php echo $fila['created_at'] ?></td>
                    <td><?php echo $fila['updated_at'] ?></td>
                    <img src="{{rating.image_url}}" alt="Image">
                </tr>
            </tbody>
            <?php
             }
            ?>
        </table>
    </div>
</div>

</body>
</html>