<?php
    include 'conexion.php';

    $idPeriferico = $_POST['actualizar-id'];
    $nomPeriferico = $_POST['Actualizar-nombre'];
    $descripPeriferico = $_POST['actualizar-descrip']; 

    $query = "UPDATE perifericos SET nombre_perifericos='$nomPeriferico', descripcion='$descripPeriferico' where Id_perifericos='$idPeriferico'";

//-----------------------------------Verificar que el periferico exista-----------------------------------------------------------------------
    $verificarPeriferico = mysqli_query($conexion,"SELECT * FROM perifericos WHERE Id_perifericos ='$idPeriferico'");
    if(mysqli_num_rows($verificarPeriferico)>0){
        $ejecutar = mysqli_query($conexion, $query);
        if(!$ejecutar){
            echo '
            <script>
                alert("Ocurrio algun problema, vuelve a intentarlo");
                window.location = "../../perifericos.php";
            </script>
           ';
        }else{
            echo '
            <script>
                alert("Periferico actualizado exitosamente");
                window.location = "../../perifericos.php";
            </script>
            ';
        }
        mysqli_close($conexion);
    }else{
        echo '
        <script>
            alert("El periferico no existe, imposible actualizar");
            window.location = "../../perifericos.php";
        </script>
        ';    
    }
    mysqli_close($conexion); 
?>