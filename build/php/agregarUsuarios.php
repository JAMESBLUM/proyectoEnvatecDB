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

    //Instruccion de insertar valores, los que estan en forma de comentarios son los que se planean insertar pero que no estan en las tablas que me enviaste
    $query = "INSERT INTO usuarios(id_usuarios, nombre, apellido_paterno, apellido_materno, id_depto, sexo, id_equipo, correo)
    VALUES('$id','$nombre','$apellidoPaterno','$apellidoMaterno','$departamento','$sexo','$equipo','$correo')";
    
    //----------------------------Verificar que el equipo exista------------------------------------------------------------------------------------
    $verificarEquipo = mysqli_query($conexion, "SELECT * FROM equipos WHERE id_equipo ='$equipo'");
    if(mysqli_num_rows($verificarEquipo) > 0){

        //-----------------------------------Verificar que el departamento exista-----------------------------------------------------------------------
        $verificarDepto = mysqli_query($conexion,"SELECT * FROM departamento WHERE id_depto ='$departamento'");
        if(mysqli_num_rows($verificarDepto)>0){

            //----------------------------Verificar que el usuario no exista---------------------------------------------------------------------------------
            $verificarUsuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE id_usuarios ='$id' AND nombre='$nombre'");
            if(mysqli_num_rows($verificarUsuario) > 0){   
                            
                echo '
                <script>
                    alert("El usuario ya existe");
                    window.location = "../../usuarios.php";
                </script>
                ';    
            }else{
                $ejecutar = mysqli_query($conexion, $query);

                if(!$ejecutar){
                    echo '
                        <script>
                            alert("Usuario no almecenado");
                            window.location = "../../usuarios.php";
                        </script>
                    ';
                }else{
                    echo '
                        <script>
                            alert("Usuario almecenado");
                            window.location = "../../usuarios.php";
                        </script>
                    ';
                }
                mysqli_close($conexion);
                }
        }else{
            //Esta parte es para que se pregunte si quiere ingresar departamento, entonces lo llevaría a la ventana de ingresar equipo
            echo '
            <script>
                if(confirm("El departamento no exixte, ¿Quieres ingresarlo")){
                    window.location = "../../departamentos.php";     
                }else{
                    window.location = "../../usuarios.php";
                }
            </script>
            ';  
        }
    }else{
        //Esta parte es para que se pregunte si quiere ingresar el equipo, entonces lo llevaria a la ventana de ingresar equipo
        echo '
            <script>
                if(confirm("El equipo no exixte, ¿Quieres ingresarlo")){
                    window.location = "../../envatec.php";     
                }else{
                    window.location = "../../usuarios.php";
                }
            </script>
        ';
    }
?>