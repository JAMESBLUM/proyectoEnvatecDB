<?php   
    //Conexion con la base de datos, puedes eliminarlo o cambiarlo al metodo que tengas
    include 'conexion.php';
    //Declaracion de variables, ya sabes, modifica los nombres de los elementos de la parte visual para lo que tengas
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];

    //Instruccion de eliminar al usuario
    $query = "DELETE FROM personal_sistemas WHERE id_personal = '$id' AND nombre ='$nombre'";
    
    //----------------------------Verificar que el usaurio exista------------------------------------------------------------------------------------
    $verificarUsuario = mysqli_query($conexion, "SELECT * FROM personal_sistemas WHERE id_personal ='$id' AND nombre ='$nombre'");
    if(mysqli_num_rows($verificarUsuario) > 0){
        $ejecutar = mysqli_query($conexion, $query);

                if(!$ejecutar){
                    echo '
                        <script>
                            alert("Personal no eliminado");
                            window.location = "../ProyectoDB/Visuales.php";
                        </script>
                    ';
                }else{
                    echo '
                        <script>
                            alert("Personal eliminado");
                            window.location = "../ProyectoDB/Visuales.php";
                        </script>
                    ';
                }
    }else{
        echo'
            <script>
            alert("El personal ya ha sido eliminado o no existe");
            window.location = "../ProyectoDB/Visuales.php";
            </script>
        ';
    }
        
?>