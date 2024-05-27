<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <style>
        body{
            background-image: url(img/fondo2.gif);
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col">
            <?php
                include "sql.php"; 
                include "articulo.php";

                $a = new articulo(); 
                echo $a->table();
                ?>
            </div>
        </div>
    </div>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script>
        function actualizar(id)
        {
            location.href= "actualizar.php?id=" + id + "&r=" + Math.random();
        }
        function eliminar(id)
        {
            location.href= "eliminar.php?id=" + id + "&r=" + Math.random();
        }
        function insertar(){
            location.href= "insertar.php";
        }
    </script>
</body>

</html>