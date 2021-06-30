<?php
/*=========== INCIAR SESION ===========*/
    include 'conexion.php';
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $query = "SELECT*FROM login WHERE nombre_usuario='$usuario' and password_usuario='$password'";
    $ejecutar = mysqli_query($conexion, $query);

    $filas = mysqli_num_rows($ejecutar);
    if($filas){
        header("location:../../envatec.php");
    }else{
        echo'
        <script>
            alert("Contraseña o Usuario incorrectos");
            window.location = "../../index.php";
        </script>
    ';
    }
    mysqli_close($conexion);
?>