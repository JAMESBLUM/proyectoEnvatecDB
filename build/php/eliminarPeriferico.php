<?php
include 'conexion.php';
$id_perifericoElim = $_POST['eliminar-periferico'];
$query = "DELETE FROM perifericos Where Id_perifericos = '$id_perifericoElim'";

    $verificarPeriferico = mysqli_query($conexion,"SELECT * FROM perifericos WHERE Id_perifericos ='$id_perifericoElim'");
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
                alert("Periferico eliminado exitosamente");
                window.location = "../../perifericos.php";
            </script>
            ';
        }
        mysqli_close($conexion);
    }else{
        echo '
        <script>
            alert("El periferico no existe, imposible eliminar");
            window.location = "../../perifericos.php";
        </script>
        ';    
    }
    mysqli_close($conexion);
?>