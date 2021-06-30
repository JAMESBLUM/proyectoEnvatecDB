<?php   
    //Conexion con la base de datos, puedes eliminarlo o cambiarlo al metodo que tengas
    include 'conexion.php';
    //Declaracion de variables, ya sabes, modifica los nombres de los elementos de la parte visual para lo que tengas
    $id = $_POST['eliminar-software'];
    $nombre = $_POST['eliminar-nomSoftware'];

    //Instruccion de eliminar al usuario
    $query = "DELETE FROM software WHERE id_software = '$id'";
    
    //----------------------------Verificar que el usaurio exista------------------------------------------------------------------------------------
    $verificarUsuario = mysqli_query($conexion, "SELECT * FROM software WHERE id_software ='$id' AND nombre_software ='$nombre'");
    if(mysqli_num_rows($verificarUsuario) > 0){
        $ejecutar = mysqli_query($conexion, $query);

                if(!$ejecutar){
                    echo '
                        <script>
                            alert("Software no eliminada");
                            window.location = "../../licenciamiento.php";
                        </script>
                    ';
                }else{
                    echo '
                        <script>
                            alert("Software eliminado");
                            window.location = "../../licenciamiento.php";
                        </script>
                    ';
                }
    }else{
        echo'
            <script>
            alert("El software ya ha sido eliminado o no existe");
            window.location = "../../licenciamiento.php";
            </script>
        ';
    }
        
?>