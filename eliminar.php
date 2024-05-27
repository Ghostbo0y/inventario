<?php
include "sql.php";
include "articulo.php";

$a = new articulo();

$id = isset($_GET["id"])?$_GET["id"]: "";

$obj = $a->buscar($id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>Document</title>
    <style>
        body{
            background-image:url(img/fondo.jpg);
        }
        
        .letra{
            color:red;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-4">
            </div>
            <div class="col-12 col-sm-4 mt-3">
                <div class="mb-3">
                    <label for="id" class="form-label letra">ID: </label>
                    <input type="text" class="form-control" id="id" value="<?php echo $obj->id; ?>">
                </div>
                <div class="mb-3">
                    <label for="nom" class="form-label letra">Nombre:</label>
                    <input type="text" class="form-control" id="nom" value="<?php echo $obj->nom; ?>">
                </div>
                <div class="mb-3">
                    <label for="costo" class="form-label letra">Costo:</label>
                    <input type="text" class="form-control" id="costo" value="<?php echo $obj->costo; ?>">
                </div>
                <div class="d-grid">
                    <button type="button" class="btn btn-danger" id="button1">Eliminar</button>
                </div>
            </div>
            <div class="col-12 col-sm-4">
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="modalInsert">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-tittle">Información</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="insertText"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>

                </div>
            </div>
        </div>
    </div>
    <script src="bootstrap/js/jquery-3.7.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script>
        (function() {
            $("#button1").click(function(){
                var id= $("#id").val();
                var nom= $("#nom").val();
                var costo= $("#costo").val();

                var error= "";

                if (id == ""){
                    error +="falta el ID<br>";
                }
                if (nom == ""){
                    error +="falta el Nombre<br>";
                }
                if (costo == ""){
                    error +="falta el Costo<br>";
                }

                if (error == ""){
                    var dir = "http://localhost/proyecto2/procesos.php?tipo=3&id=" + id + "&nom=" + nom + "&costo=" + costo + "&r=" + Math.random();
                    $.get(dir, function(result) {
                        //alert(result);
                        location.href="mostrar.php?r=" + Math.random();
                        /*
                        $(#"id").val("");
                        $(#"nom").val("");
                        $(#"costo").val("");
                        */
                    });
                }
                else
                {
                    $("#insertText").html(error);
                    $("#modalInsert").modal("show");
                }
            });
        })();
    </script>
</body>

</html>