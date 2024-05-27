<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .boton{
            background-color: #DB0058;
            color:white;
        }

        .btabla{
            background-color: #131313;
            border-color: #131313;
            margin-right: 20px;
        }

    </style>
</head>
<body>
</body>
</html>

<?php
class articulo
{
    public $conn;

    public function __construct()
    { 
        $this->conn = new sql();
    }

    public function insertarArticulo($id, $nom, $costo)
    {
        $sql = "insert into articulo values ('$id','$nom','$costo')";
        //echo $sql ."<br><br>";
        $this->conn->ejecutar($sql);
        //echo "ok";
    }

    public function actualizarArticulo($id, $nom, $costo)
    {
        $sql = "update articulo set nom = '$nom', costo = '$costo' where id = '$id'"; 
        $this->conn->ejecutar($sql);

    }

    public function eliminarArticulo ($id)
    {
        $sql = "delete from articulo where id = '$id'";
        $this->conn->ejecutar($sql);
    } 

    public function table()
{
    $sql = "SELECT * FROM articulo";
    $result = $this->conn->ejecutar($sql);

    $line = '<table class="table table-dark table-striped mt-3">
    <tr>
        <th>ID</th>
        <th class="text-center">Nombre</th>
        <th class="text-end">Costo</th>
        <th class="text-center">opciones</th>
    </tr>';

    if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $line .= "<tr>";
    $line .= "<td>" . $row["id"] . "</td>";
    $line .= "<td class='text-center'>" . $row["nom"] . "</td>";
    $line .= "<td class='text-end'>" . $row["costo"] . "</td>";
    
    // Aquí añadimos las columnas para los botones
    $line .= '<td class="text-center">';
    $line .= '<button type="button" class="btn btn-primary btabla" onclick="actualizar(' . $row["id"] . ')">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#15297c" class="bi bi-pen-fill" viewBox="0 0 16 16">
                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001"/>
                </svg>
              </button>';
    $line .= '<button type="button" class="btn btn-danger btabla" onclick="eliminar(' . $row["id"] . ')">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="25" fill="red" class="bi bi-eraser-fill" viewBox="0 0 16 20">
                    <path d="M8.086 2.207a2 2 0 0 1 2.828 0l3.879 3.879a2 2 0 0 1 0 2.828l-5.5 5.5A2 2 0 0 1 7.879 15H5.12a2 2 0 0 1-1.414-.586l-2.5-2.5a2 2 0 0 1 0-2.828zm.66 11.34L3.453 8.254 1.914 9.793a1 1 0 0 0 0 1.414l2.5 2.5a1 1 0 0 0 .707.293H7.88a1 1 0 0 0 .707-.293z"/>
                </svg>
              </button>';
    $line .= '</td>';
    
    $line .= "</tr>";
} 
    } else {
        $line .= '<tr><td colspan="3">No se encontraron resultados</td></tr>';
    }

    

    // Botones al final de la tabla
    $line .= '<div class="text-end mt-3">';
    $line .= '<button type="button" class="btn btn-danger" onclick="insertar()">Insertar</button>';
    $line .= '</div>';

    $line .= "</table>";
    return $line;
}
    function buscar($id)
    {
        $sql = "select * from articulo where id= '" .$id. "'"; 
        $result = $this->conn->ejecutar($sql);
        
        $obj = new stdClass();
        if($result->rowCount() > 0)
        {
            while($row = $result->fetch(PDO::FETCH_ASSOC))
            {
                $obj->id = $row["id"];
                $obj->nom = $row["nom"];
                $obj->costo = $row["costo"];
            }
        }
        return $obj;
    }
}    
?>