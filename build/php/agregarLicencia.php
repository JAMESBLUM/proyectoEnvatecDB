<?php   
    //Conexion con la base de datos, puedes eliminarlo o cambiarlo al metodo que tengas
    include 'conexion.php';
    //Declaracion de variables, ya sabes, modifica los nombres de los elementos de la parte visual para lo que tengas
    $id = $_POST['agregar-idLicencia'];
    $nombre = $_POST['agregar-nombreLicencia'];
    $software = $_POST['agregar-Lic-idSoftware'];
    $fechaVen = $_POST['agregar-vencimiento'];


    //Instruccion de insertar valores, los que estan en forma de comentarios son los que se planean insertar pero que no estan en las tablas que me enviaste
    $query = "INSERT INTO licenciamiento(id_licencia, nombre_licencia, id_software, fecha_vencimiento) VALUES('$id','$nombre','$software','$fechaVen')";
    
    //----------------------------Verificar que el equipo exista------------------------------------------------------------------------------------
    $verificarEquipo = mysqli_query($conexion, "SELECT * FROM software WHERE id_software ='$software'");
    if(mysqli_num_rows($verificarEquipo) > 0){

        //-----------------------------------Verificar que el departamento exista-----------------------------------------------------------------------
        $verificarDepto = mysqli_query($conexion,"SELECT * FROM licenciamiento WHERE Id_licencia ='$id'");
        if(mysqli_num_rows($verificarDepto)>0){                            
                echo '
                <script>
                    alert("La licencia ya existe");
                    window.location = "../../licenciamiento.php";
                </script>
                ';    
            }else{
                $ejecutar = mysqli_query($conexion, $query);

                if(!$ejecutar){
                    echo '
                        <script>
                            alert("Licencia no almacenada");
                            window.location = "../../licenciamiento.php";
                        </script>
                    ';
                }else{
                    echo '
                        <script>
                            alert("Licencia almacenada");
                            window.location = "../../licenciamiento.php";
                        </script>
                    ';
                }
                mysqli_close($conexion);
                }
        }else{
            //Esta parte es para que se pregunte si quiere ingresar departamento, entonces lo llevaría a la ventana de ingresar equipo
            echo '
            <script>
                if(confirm("El software no exixte, ¿Quieres ingresarlo")){
                    window.location = "../../licenciamiento.php";     
                }else{
                    window.location = "../../licenciamiento.php";
                }
            </script>
            ';  
        }
?>