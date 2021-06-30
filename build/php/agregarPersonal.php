<?php   
    //Conexion con la base de datos, puedes eliminarlo o cambiarlo al metodo que tengas
    include 'conexion.php';
    //Declaracion de variables, ya sabes, modifica los nombres de los elementos de la parte visual para lo que tengas
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellidoPaterno = $_POST['apellidoPaterno'];
    $apellidoMaterno = $_POST['apellidoMaterno'];
    $depto = $_POST['departamento'];

    //Instruccion de insertar valores
    $query = "INSERT INTO personal_sistemas(Id_personal, nombre, apellidos, Id_depto) VALUES('$id','$nombre','$apellidoPaterno','$depto')";
    
    //----------------------------Verificar que el departamento exista------------------------------------------------------------------------------------
    $verificarEquipo = mysqli_query($conexion, "SELECT * FROM departamento WHERE Id_depto ='$depto'");
    if(mysqli_num_rows($verificarEquipo) > 0){

        //-----------------------------------Verificar que el personal de sistemas no exista-----------------------------------------------------------------------
        $verificarDepto = mysqli_query($conexion,"SELECT * FROM personal_sistemas WHERE Id_personal ='$id' and nombre = '$nombre'");
        if(mysqli_num_rows($verificarDepto)>0){                            
                echo '
                <script>
                    alert("El personal ya existe");
                    window.location = "../../usuarios.php";
                </script>
                ';    
            }else{
                $ejecutar = mysqli_query($conexion, $query);

                if(!$ejecutar){
                    echo '
                        <script>
                            alert("Ocurrió un problema, vuelve a intentarlo");
                            window.location = "../../usuarios.php";
                        </script>
                    ';
                }else{
                    echo '
                        <script>
                            alert("Personal almecenado");
                            window.location = "../../usuarios.php";
                        </script>
                    ';
                }
                mysqli_close($conexion);
                }
        }else{
            //Esta parte es para que se pregunte si quiere ingresar la planta, entonces lo llevaría a la ventana de ingresar equipo
            echo '
            <script>
                if(confirm("El departamento no existe, ¿Quieres ingresarlo")){
                    window.location = "../../departamentos.php";     
                }else{
                    window.location = "../../usuarios.php";
                }
            </script>
            ';  
        }
?>