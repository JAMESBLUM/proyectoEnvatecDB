<?php   
    //Conexion con la base de datos, puedes eliminarlo o cambiarlo al metodo que tengas
    include 'conexion.php';
    //Declaracion de variables, ya sabes, modifica los nombres de los elementos de la parte visual para lo que tengas
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellidoPaterno = $_POST['apellidoPaterno'];
    $apellidoMaterno = $_POST['apellidoMaterno'];
    $depto = $_POST['departamento'];
    

    //Instruccion de eliminar al usuario
    $query = "UPDATE personal_sistemas
            Set nombre = '$nombre',
            apellidos = '$apellidoPaterno',
            id_depto = '$depto'
     WHERE id_personal = '$id'";
    
    $verificarEquipo = mysqli_query($conexion, "SELECT * FROM departamento WHERE id_depto ='$depto'");
    if(mysqli_num_rows($verificarEquipo) > 0){

        //-----------------------------------Verificar que la licencia exista-----------------------------------------------------------------------
        $verificarDepto = mysqli_query($conexion,"SELECT * FROM personal_sistemas WHERE id_personal ='$id'");
        if(mysqli_num_rows($verificarDepto)>0){

            $ejecutar = mysqli_query($conexion, $query);
            if(!$ejecutar){
                echo '
                    <script>
                        alert("Ocurrio algun problema, vuelve a intentarlo");
                        window.location = "../ProyectoDB/Visuales.php";
                    </script>
                ';
            }else{
                echo '
                    <script>
                        alert("Personal actualizado");
                        window.location = "../ProyectoDB/Visuales.php";
                    </script>
                ';
            }
            mysqli_close($conexion);
            }else{
                echo '
                <script>
                    alert("El personal no existe, imposible actualizar");
                    window.location = "../ProyectoDB/Visuales.php";
                </script>
                ';    
                }
        }else{
            //Esta parte es para que se pregunte si quiere ingresar departamento, entonces lo llevaría a la ventana de ingresar equipo
            echo '
            <script>
                if(confirm("El departamento no exixte, ¿Quieres ingresarlo")){
                    window.location = "../ProyectoDB/Visuales.php";     
                }else{
                    window.location = "../ProyectoDB/Visuales.php";
                }
            </script>
            ';  
        }        
?>