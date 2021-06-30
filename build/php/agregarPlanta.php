<?php   
    //Conexion con la base de datos, puedes eliminarlo o cambiarlo al metodo que tengas
    include 'conexion.php';
    //Declaracion de variables, ya sabes, modifica los nombres de los elementos de la parte visual para lo que tengas
    $id = $_POST['agregar-IdPlanta'];
    $nombre = $_POST['agregar-nombrePlanta'];
    $ubicacion = $_POST['agregar-ubicacionPlanta'];

    //Instruccion de insertar valores
    $query = "INSERT INTO plantas(id_planta, nombre_planta, ubicacion_planta) VALUES('$id','$nombre','$ubicacion')";

    //-----------------------------------Verificar que el personal de sistemas no exista-----------------------------------------------------------------------
    $verificarDepto = mysqli_query($conexion,"SELECT * FROM plantas WHERE id_planta ='$id'");
    if(mysqli_num_rows($verificarDepto)>0){                            
        echo '
        <script>
            alert("La planta ya existe");
            window.location = "../../plantas.php";
        </script>
        ';    
    }else{
        $ejecutar = mysqli_query($conexion, $query);
        if(!$ejecutar){
            echo '
            <script>
                alert("Ocurrió un problema, vuelve a intentarlo");
                window.location = "../../plantas.php";
            </script>
            ';
        }else{
            echo '
            <script>
                alert("Planta almecenada");
                window.location = "../../plantas.php";
            </script>
            ';
            }
        mysqli_close($conexion);
    }
?>