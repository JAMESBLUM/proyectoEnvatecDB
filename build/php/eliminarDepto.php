<?php   
    //Conexion con la base de datos, puedes eliminarlo o cambiarlo al metodo que tengas
 include 'conexion.php';
    //Declaracion de variables, ya sabes, modifica los nombres de los elementos de la parte visual para lo que tengas
    $id = $_POST['eliminar-Depto'];
    $nombre = $_POST['eliminar-nomDepto'];

    //Instruccion de eliminar al usuario
    $query = "DELETE FROM departamento WHERE id_depto = '$id' AND nombre_depto ='$nombre'";
    
    //----------------------------Verificar que el usaurio exista------------------------------------------------------------------------------------
    $verificarUsuario = mysqli_query($conexion, "SELECT * FROM departamento WHERE id_depto ='$id' AND nombre_depto='$nombre'");
    if(mysqli_num_rows($verificarUsuario) > 0){
        $ejecutar = mysqli_query($conexion, $query);

                if(!$ejecutar){
                    echo '
                        <script>
                            alert("Departamento no eliminado");
                            window.location = "../../departamentos.php";
                        </script>
                    ';
                }else{
                    echo '
                        <script>
                            alert("Departamento eliminado");
                            window.location = "../../departamentos.php";
                        </script>
                    ';
                }
    }else{
        echo'
            <script>
            alert("El departamento ya ha sido eliminado o no existe");
            window.location = "../../departamentos.php";
            </script>
        ';
    }
        
?>