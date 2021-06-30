<?php   
    //Conexion con la base de datos, puedes eliminarlo o cambiarlo al metodo que tengas
    include 'conexion.php';
    //Declaracion de variables, ya sabes, modifica los nombres de los elementos de la parte visual para lo que tengas
    $id = $_POST['eliminar-Licencia'];
    $nombre = $_POST['eliminar-nomLicencia'];

    //Instruccion de eliminar al usuario
    $query = "DELETE FROM licenciamiento WHERE id_licencia = '$id' AND nombre_licencia='$nombre'";
    
    //----------------------------Verificar que el usaurio exista------------------------------------------------------------------------------------
    $verificarUsuario = mysqli_query($conexion, "SELECT * FROM licenciamiento WHERE id_licencia ='$id' AND nombre_licencia='$nombre'");
    if(mysqli_num_rows($verificarUsuario) > 0){
        $ejecutar = mysqli_query($conexion, $query);

                if(!$ejecutar){
                    echo '
                        <script>
                            alert("Licencia no eliminada");
                            window.location = "../../licenciamiento.php";
                        </script>
                    ';
                }else{
                    echo '
                        <script>
                            alert("Licencia eliminada");
                            window.location = "../../licenciamiento.php";
                        </script>
                    ';
                }
    }else{
        echo'
            <script>
            alert("La licencia ya ha sido eliminada o no existe");
            window.location = "../../licenciamiento.php";
            </script>
        ';
    }
        
?>