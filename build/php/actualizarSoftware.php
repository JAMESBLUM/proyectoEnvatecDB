<?php   
    //Conexion con la base de datos, puedes eliminarlo o cambiarlo al metodo que tengas
    include 'conexion.php';
    //Declaracion de variables, ya sabes, modifica los nombres de los elementos de la parte visual para lo que tengas
    $id = $_POST['actualizar-idSoftware'];
    $nombre = $_POST['Actualizar-nombreSoftware'];
    $depto = $_POST['actualizar-idDepto'];
    

    //Instruccion de eliminar al usuario
    $query = "UPDATE software
            Set nombre_software = '$nombre',
            id_depto = '$depto'
     WHERE id_software = '$id'";

//-----------------------------------Verificar que la licencia exista-----------------------------------------------------------------------
    $verificarDepto = mysqli_query($conexion,"SELECT * FROM software WHERE id_software ='$id'");
    if(mysqli_num_rows($verificarDepto)>0){
        $ejecutar = mysqli_query($conexion, $query);
        if(!$ejecutar){
            echo '
            <script>
                alert("Ocurrio algun problema, vuelve a intentarlo");
                window.location = "../../licenciamiento.php";
            </script>
           ';
        }else{
            echo '
            <script>
                alert("Software actualizado");
                window.location = "../../licenciamiento.php";
            </script>
            ';
        }
        mysqli_close($conexion);
    }else{
        echo '
        <script>
            alert("El software no existe, imposible actualizar");
            window.location = "../../licenciamiento.php";
        </script>
        ';    
    }
?>