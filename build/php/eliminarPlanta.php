<?php   
    //Conexion con la base de datos, puedes eliminarlo o cambiarlo al metodo que tengas
    include 'conexion.php';
    //Declaracion de variables, ya sabes, modifica los nombres de los elementos de la parte visual para lo que tengas
    $id = $_POST['eliminar-planta'];
    $nombre = $_POST['eliminar-nomPlanta'];

    //Instruccion de eliminar al usuario
    $query = "DELETE FROM plantas WHERE id_planta = '$id'";
    
    //----------------------------Verificar que el usaurio exista------------------------------------------------------------------------------------
    $verificarUsuario = mysqli_query($conexion, "SELECT * FROM plantas WHERE id_planta ='$id' AND nombre_planta ='$nombre'");
    if(mysqli_num_rows($verificarUsuario) > 0){
        $ejecutar = mysqli_query($conexion, $query);

                if(!$ejecutar){
                    echo '
                        <script>
                            alert("Planta no eliminada");
                            window.location = "../../plantas.php";
                        </script>
                    ';
                }else{
                    echo '
                        <script>
                            alert("Planta eliminada");
                            window.location = "../../plantas.php";
                        </script>
                    ';
                }
    }else{
        echo'
            <script>
            alert("La planta ya ha sido eliminada o no existe");
            window.location = "../../plantas.php";
            </script>
        ';
    }
        
?>