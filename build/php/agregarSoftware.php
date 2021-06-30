<?php   
    //Conexion con la base de datos, puedes eliminarlo o cambiarlo al metodo que tengas
    include 'conexion.php';
    //Declaracion de variables, ya sabes, modifica los nombres de los elementos de la parte visual para lo que tengas
    $id = $_POST['agregar-idSoftware'];
    $nombre = $_POST['agregar-nombreSoftware'];
    $depto = $_POST['agregar-idDepto'];

    //Instruccion de insertar valores
    $query = "INSERT INTO software(id_software, nombre_software, id_depto) VALUES('$id','$nombre','$depto')";

    //-----------------------------------Verificar que el personal de sistemas no exista-----------------------------------------------------------------------
    $verificarDepto = mysqli_query($conexion,"SELECT * FROM software WHERE id_software ='$id'");
    if(mysqli_num_rows($verificarDepto)>0){                            
        echo '
        <script>
            alert("El software ya existe");
            window.location = "../../licenciamiento.php";
        </script>
        ';    
    }else{
        $ejecutar = mysqli_query($conexion, $query);
        if(!$ejecutar){
            echo '
            <script>
                alert("Ocurrió un problema, vuelve a intentarlo");
                window.location = "../../licenciamiento.php";
            </script>
            ';
        }else{
            echo '
            <script>
                alert("Software almecenado");
                window.location = "../../licenciamiento.php";
            </script>
            ';
            }
        mysqli_close($conexion);
    }
?>