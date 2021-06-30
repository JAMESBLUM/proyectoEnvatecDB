<?php   
    //Conexion con la base de datos, puedes eliminarlo o cambiarlo al metodo que tengas
    include 'conexion.php';
    //Declaracion de variables, ya sabes, modifica los nombres de los elementos de la parte visual para lo que tengas
    $id = $_POST['eliminar-equipo'];
    $marca = $_POST['eliminar-marcaEquipo'];

    //Instruccion de eliminar al usuario
    $query = "DELETE FROM equipos WHERE Id_equipo = '$id' AND marca='$marca'";
    
    //----------------------------Verificar que el equipo exista------------------------------------------------------------------------------------
    $verificarEquipo = mysqli_query($conexion, "SELECT * FROM equipos WHERE Id_equipo ='$id' AND marca='$marca'");
    if(mysqli_num_rows($verificarEquipo) > 0){
        $ejecutar = mysqli_query($conexion, $query);

                if(!$ejecutar){
                    echo '
                        <script>
                            alert("Equipo no eliminado");
                            window.location = "../../envatec.php";
                        </script>
                    ';
                }else{
                    echo '
                        <script>
                            alert("Equipo eliminado exitosamente");
                            window.location = "../../envatec.php";
                        </script>
                    ';
                }
    }else{
        echo'
            <script>
            alert("El equipo ya ha sido eliminado o no existe");
            window.location = "../../envatec.php";
            </script>
        ';
    }
        
?>