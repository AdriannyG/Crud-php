<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css" rel = "stylesheet">
    <script src = "js/bootstrap.min.js"></script>
    <title>CRUD</title>
</head>
<body>
    <div class ="container">
        <div class = "row">
            <h3>CRUD EN PHP</h3>
    </div>
</div class = "row">
<p><a href="crear.php" class = "btn btn-success">Agregar usuario</a></p>
<table class = "table table-striped table-bordered">
    <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Correo electronico</th>
                <th>Telefono</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
    <tbody>

    <?php
    include 'conexion.php';
    $pdo = Database::connect();
    $sql = 'SELECT * FROM user ORDER BY ID DESC';
        foreach ($pdo->query($sql) as $row){
            echo '<tr>';
            echo '<td>'.$row['ID'] .'</td>';
            echo '<td>'.$row['nombre'] .'</td>';
            echo '<td>'.$row['direccion'] .'</td>';
            echo '<td>'.$row['email'] .'</td>';
            echo '<td>'.$row['telefono'] .'</td>';
            echo '<td>
                <form action="editar.php" method="post">
                <input type="hidden" name="ID" value='.$row['ID'].'>
                <input type="hidden" name="nombre" value='.$row['nombre'].'>
                <input type="hidden" name="direccion" value='.$row['direccion'].'>
                <input type="hidden" name="email" value='.$row['email'].'>
                <input type="hidden" name="telefono" value='.$row['telefono'].'>
                <input type="submit" name="editar" value="editar">
                </form>
            </td>';
            echo '<td width = 200>';
    }
    Database::disconnect();
        ?>
</tbody>
</table>
</div>
</div> <!-- Contenedor -->
</body>
</html>