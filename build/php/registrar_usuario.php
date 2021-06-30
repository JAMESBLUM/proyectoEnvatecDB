<?php
    include 'conexion.php';
/*=========== REGISTRAR USUARIO ===========*/
    $nombre = $_POST['nombre-usuario'];
    $password = $_POST['password-usuario'];

    $query = "INSERT INTO login(nombre_usuario, password_usuario)
              VALUES('$nombre','$password')";

    //====== VERIFICAR QUE NO SE REPITA EL USUARIO      
    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM login WHERE nombre_usuario='$nombre'");
    if(mysqli_num_rows($verificar_usuario) > 0){
        echo'
            <script>
                alert("El usuario ya existe, ingresa otro.");
                window.location = "../../crearUsuario.php";
            </script>
        ';
        exit(); //Termina el script actual sin que se ejecute lo demas debajo de el
        mysqli_close($conexion);
    }

    //====== EJECUTA EL QUERY PARA AGREGAR EL USUARIO
    $ejecutar = mysqli_query($conexion, $query);
    if($ejecutar){
        echo'
        <script>
            alert("Usuario registrado exitosamente");
            window.location = "../../index.php";
        </script>
    ';
    }else{
        echo'
        <script>
            alert("No se pudo registrar al usuario");
            window.location = "../../index.php";
        </script>
    ';
    }
    mysqli_close($conexion);
?>