<?php
//Iniciar variables
session_start();
if ($_POST) {
    $Usr = $_POST['Usr'];
    $Contra = $_POST['contrasena'];
    echo $Nombre;
    echo "<br>" . $password;

    #Conectamos con MYSQL
    $conexion = mysqli_connect("localhost", "root", "")
        or die("Fallo en el establecimiento de la conexión");

    #Seleccionamos la base de datos a utilizar
    mysqli_select_db($conexion, "a13800892")
        or die("Error en la selección de la base de datos");

    #Consulta para validar
    $Resultado = mysqli_query($conexion, "SELECT * FROM `usuarios` WHERE `usuario` ='$Usr' and `contrasena` ='$Contra';");
    if (mysqli_num_rows($Resultado) == 1) {
        echo '<span class="Etiquetas">¡Bienvenido!</span>';

        #Crear variable de sesion
        $_SESSION["usuario"] = "$Usr";
        $_SESSION["pass"] = $Contra;

        header("Location:index.html");
    } else {
        echo "No Aceptado";
        header("Location:index.html");
        mysqli_close($conexion); // Cerramos la conexion con la base de datos
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/
xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Guardar Datos en BD</title>
</head>

<body>

</body>

</html>