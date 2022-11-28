<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Guardar Datos en BD</title>
</head>

<body>
    <?php
    if ($_POST) {
        //Variable de la contrasena
        $Contra = $_POST['contrasena'];
        $Usuario= $_POST['Usuario'];
        #Conectamos con MYSQL
        $conexion = mysqli_connect("localhost", "root", "")
            or die("Fallo en el establecimiento de la conexión");

        #Seleccionamos la base de datos a utilizar
        mysqli_select_db($conexion, "a18300892")
            or die("Error en la selección de la base de datos");

        #Consulta para insertar
        $Resultado = mysqli_query($conexion, "INSERT INTO `a18300892`.`usuarios` (`idusr`, `usuario`, `contrasena`) VALUES (NULL,'$Usuario','$Contra');");

        if ($Resultado == true) {
            echo "¡Gracias! Hemos recibido sus datos. \n";
            header("Location:login.html");
        } else echo "Error en la consulta";
        mysqli_close($conexion); // Cerramos la conexion con la base de datos
    } else {
        echo "No se esta ejecutando por POST";
    }
    ?>
</body>

</html>