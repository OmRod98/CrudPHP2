<!DOCTYPE html>
<?php
    include("Conexion_sis2.php");
?>
<meta charset="UTF-8">
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewpoint" content="width=device-width, initial-scale=1">
    
    <title>CRUD PHP & SQL</title>
    <!--Boostrap core CSS-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
<body>
    <div class="col-md-8 col-md-offset-2">
        <h1>Crud con PHP & SQL</h1>

        <form method="POST" action="formulario2.php">
            <div class="form-group">
                <label>nombre:</label>
                <input type="text" name="nombre" class="form-control" placeholder="Escriba su Nombre"><br />
                </div>
                <div class="form-group">
                <label>Password:</label>
                <input type="text" name="passw" class="form-control" placeholder="Escriba su Contraseña"><br />
                </div>
                <div class="form-group">
                <label>email:</label>
                <input type="text" name="email" class="form-control" placeholder="Escriba su Email"><br />
                </div>
                <div class="form-group">
                <input type="submit" name="insert" class="btn btn-warning" value="INSERTAR DATOS" ><br />
                </div>
            </form>
        </div>
<br /><br /><br />

    <?php
        if(isset($_POST['insert'])){
            $nombre = $_POST['nombre'];
            $pass = $_POST['passw'];
            $email = $_POST['email'];

            $insertar = "INSERT INTO usuarios2(nombre,password,email)VALUES('$nombre' , '$pass' , '$email')";

            $ejecutar = sqlsrv_query($con, $insertar);

            if($ejecutar){
                echo "<h3>Insertado correctamente</h3>";
            }
        }



?>

        <div class="col-md-9 col-md-offset-2">
        <table class="table table-bordered table-responsive">
            <tr>
                <td>ID</td>
                <td>Nombre</td>
                <td>Password</td>
                <td>Email</td>
                <td>Action</td>
                <td>Action</td>
            </tr>

            <?php
                $consulta = "SELECT * FROM usuarios2";

                $ejecutar = sqlsrv_query($con, $consulta);

                $i = 0;

                while($fila = sqlsrv_fetch_array($ejecutar)){
                    $id = $fila['id'];
                    $Nombre = $fila['nombre'];
                    $pass = $fila['password'];
                    $email = $fila['email'];
                    $i++;
                
            ?>
            <tr align="center">
                <td><?php echo $id ?></td>
                <td><?php echo $Nombre ?></td>
                <td><?php echo $pass ?></td>
                <td><?php echo $email ?></td>
                <td><a href="formulario2.php?editar=<?php echo $id; ?>">Editar</a></td>
                <td><a href="formulario2.php?borrar=<?php echo $id; ?>">Borrar</a></td>
            </tr>

            <?php }?>
        </table>
        </div> 

        <?php
            if(isset($_GET['editar'])){
                include ("editar.php");
            }


        ?>  
    <?php
if(isset($_GET['borrar'])){ 
        $borrar_id = $_GET['borrar'];

        $borrar = "DELETE FROM usuarios2 WHERE id='$borrar_id'";
        $ejecutar = sqlsrv_query($con, $borrar);

        if($ejecutar){
            echo "<script>alert('Usuario Eliminado')</script>";
            echo "<script>window.open('formulario2.php' , '_self')</script>";
        }
    }
?>
</body>
</html>