<?php   
    //Conexion con la base de datos, puedes eliminarlo o cambiarlo al metodo que tengas
    include 'conexion.php';
    //Declaracion de variables, ya sabes, modifica los nombres de los elementos de la parte visual para lo que tengas
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellidoPaterno = $_POST['apellidoPaterno'];
    $apellidoMaterno = $_POST['apellidoMaterno'];
    $departamento = $_POST['departamento'];
    $sexo = $_POST['sexo'];
    $equipo = $_POST['equipo'];
    $correo = $_POST['correo'];
    

    //Instruccion de eliminar al usuario
    $query = "UPDATE usuarios
            Set nombre = '$nombre',
                apellido_paterno = '$apellidoPaterno',
                apellido_materno = '$apellidoMaterno',
                Id_depto = '$departamento',
                sexo = '$sexo',
                Id_equipo = '$equipo',
                correo = '$correo'
     WHERE id_usuarios = '$id'";
    
    /*$verificarEquipo = mysqli_query($conexion, "SELECT * FROM equipos WHERE Id_equipo ='$equipo'");
    if(mysqli_num_rows($verificarEquipo) > 0){*/

        //-----------------------------------Verificar que el departamento exista-----------------------------------------------------------------------
        /*$verificarDepto = mysqli_query($conexion,"SELECT * FROM departamento WHERE Id_depto ='$departamento'");
        if(mysqli_num_rows($verificarDepto)>0){*/

            //----------------------------Verificar que el usuario no exista---------------------------------------------------------------------------------
            $verificarUsuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE id_usuarios ='$id'");
            if(mysqli_num_rows($verificarUsuario) > 0){  
                $ejecutar = mysqli_query($conexion, $query);

                if(!$ejecutar){
                    echo '
                        <script>
                            alert("Usuario no actualizado");
                            window.location = "../../usuarios.php";
                        </script>
                    ';
                }else{
                    echo '
                        <script>
                            alert("Usuario actualizado");
                            window.location = "../../usuarios.php";
                        </script>
                    ';
                }
                mysqli_close($conexion); 
            }else{      
                echo '
                <script>
                    alert("El usuario no existe, imposible actualizar");
                    window.location = "../../usuarios.php";
                </script>
                ';    
                }
        /*}else{
            echo '
            <script>
                alert("El departamento no existe, ingrese uno existente");
                window.location = "../../usuarios.php";     
            </script>
            ';  
        }*/
    /*}else{
        echo '
        <script>
            alert("El equipo no existe, ingrese uno existente");
            window.location = "../../usuarios.php";     
        </script>
        ';   
    }*/
        
?>