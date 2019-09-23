<?php
    if(isset($_GET['editar'])){ 
        $editar_id = $_GET['editar'];

        $consulta = "SELECT * FROM usuarios2 WHERE id='$editar_id'";
        $ejecutar = sqlsrv_query($con, $consulta);

        $fila = sqlsrv_fetch_array($ejecutar);

        $Nombre = $fila['nombre'];
        $pass = $fila['password'];
        $email = $fila['email'];
    }
?>

<br />

<div class="col-md-8 col-md-offset-2">
        <form method="POST" action="">
            <div class="form-group">
                <label>nombre:</label>
                <input type="text" name="nombre" class="form-control" value="<?php echo $Nombre ?>"><br />
                </div>
                <div class="form-group">
                <label>Password:</label>
                <input type="text" name="passw" class="form-control" value="<?php echo $pass ?>"><br />
                </div>
                <div class="form-group">
                <label>email:</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email ?>"><br />
                </div>
                <div class="form-group">
                <input type="submit" name="actualizar" class="btn btn-warning" value="ACTUALIZAR DATOS" ><br />
                </div>
            </form>
</div>

<?php

if(isset($_POST['actualizar'])){
    $actualizar_nombre = $_POST['nombre'];
    $actualizar_password = $_POST['passw'];
    $actualizar_email = $_POST['email'];

    $consulta = "UPDATE usuarios2 SET nombre='$actualizar_nombre' , password='$actualizar_password', email='$actualizar_email'
    WHERE id='$editar_id' ";
    $ejecutar = sqlsrv_query($con, $consulta);

    if($ejecutar){
        echo "<script>alert('Datos actualizados')</script>";
        echo "<script>window.open('formulario2.php' , '_self')</script>";
    }
   
}

?>