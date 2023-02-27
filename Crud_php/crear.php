<?php
require 'conexion.php';
    if (!empty($_POST)) {
        //Seguimiento de los errores
        $nombreError = null;
        $direccionError = null;
        $emailError = null;
        $telefonoError = null;
        //Seguimiento de los valores enviados
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        //Validacion de la entrada de datos
        $valid = true;
        if (empty($nombre)){
            $nombreError = 'Debes ingresar el nombre';
            $valid = false;
        }
        if (empty($direccion)){
            $direccionError = 'Debes ingresar la direccion';
            $valid = false;
        }
        if (empty($email)){
            $emailError = 'Ingresa el correo electronico';
            $valid = false;
        } else if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $emailError = 'Ingresa una direccion valida. Ej. jgabriela@correo.com';
            $valid = false;
        }
        if (empty($telefono)){
            $telefonoError = 'Debes ingresar un numero de telefono';
            $valid = false;
        } 
        //Insertamos el registro en la tabla
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO user (nombre, direccion, email, telefono) values (?, ?, ?, ?)";
            $query = $pdo->prepare($sql);
            $query ->execute(array($nombre, $direccion, $email, $telefono));
            Database::disconnect();
            header("Location: index.php");
        }
    } 
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset = "UFT-8">
<link rel="stylesheet" href="css/bootstrap.min.css" rel = "stylesheet">
<script src = "js/bootstrap.min.js"></script>
</head>
<body>
    <div class = "container">
        <div class = "span10 offset1">
            <div class = "row">
                <h3>Ingresar datos</h3>
    </div>
<form class = "form-horizontal" action = "crear.php" method ="post">  

    <div class ="control-group <?php echo !empty($nombreError)?'error':'';?>">
<label class = "control-label">Nombre</label>
<div class ="controls">
<input name="nombre" type="text" placeholder="Ingresa el nombre" value="<?php echo !empty($nombre)?$nombre:'';?>">
<?php if(!empty($nombreError)): ?>
    <span class ="help-inline"><?php echo $nombreError;?></span>
<?php endif; ?>
</div>
</div>    

<div class ="control-group <?php echo !empty($direccionError)?'error':'';?>">
<label class = "control-label">Direccion</label>
<div class ="controls">
<input name="direccion" type="text" placeholder="Ingresa la direccion" value="<?php echo !empty($direccion)?$direccion:'';?>">
<?php if(!empty($direccionError)): ?>
    <span class ="help-inline"><?php echo $direccionError;?></span>
<?php endif; ?>
</div>
</div>       

<div class ="control-group <?php echo !empty($emailError)?'error':'';?>">
<label class = "control-label">Correo electronico</label>
<div class ="controls">
<input name="email" type="text" placeholder="Ingresa el correo electronico" value="<?php echo !empty($email)?$email:'';?>">
<?php if(!empty($emailError)): ?>
    <span class ="help-inline"><?php echo $emailError;?></span>
<?php endif; ?>
</div>
</div>       

<div class ="control-group <?php echo !empty($telefonoError)?'error':'';?>">
<label class = "control-label">Numero de Telefono</label>
<div class ="controls">
<input name="telefono" type="text" placeholder="Ingresa el Numero de telefono" value="<?php echo !empty($telefono)?$telefono:'';?>">
<?php if(!empty($telefonoError)): ?>
    <span class ="help-inline"><?php echo $telefonoError;?></span>
<?php endif; ?>
</div>
</div>     
<div class ="forma-action">
<button type ="submit" class="btn btn-success">Registrar</button>
<a class ="btn btn-primary" href="index.php">Regresar</a>
</div>  
</form>
</div>
</div>
</body>
</html>
    