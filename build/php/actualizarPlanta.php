<?php   
    //Conexion con la base de datos, puedes eliminarlo o cambiarlo al metodo que tengas
    include 'conexion.php';
    //Declaracion de variables, ya sabes, modifica los nombres de los elementos de la parte visual para lo que tengas
    $id = $_POST['actualizar-idPlanta'];
    $nombre = $_POST['Actualizar-nombrePlanta'];
    $ubicacion = $_POST['actualizar-ubicacionPlanta'];
    

    //Instruccion de eliminar al usuario
    $query = "UPDATE plantas
            Set nombre_planta = '$nombre',
            ubicacion_planta = '$ubicacion'
     WHERE id_planta = '$id'";

//-----------------------------------Verificar que la licencia exista-----------------------------------------------------------------------
    $verificarDepto = mysqli_query($conexion,"SELECT * FROM plantas WHERE id_planta ='$id'");
    if(mysqli_num_rows($verificarDepto)>0){
        $ejecutar = mysqli_query($conexion, $query);
        if(!$ejecutar){
            echo '
            <script>
                alert("Ocurrio algun problema, vuelve a intentarlo");
                window.location = "../../plantas.php";
            </script>
           ';
        }else{
            echo '
            <script>
                alert("Planta actualizada");
                window.location = "../../plantas.php";
            </script>
            ';
        }
        mysqli_close($conexion);
    }else{
        echo '
        <script>
            alert("La planta no existe, imposible actualizar");
            window.location = "../../plantas.php";
        </script>
        ';    
    }
?>