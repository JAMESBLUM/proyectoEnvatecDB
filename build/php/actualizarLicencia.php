<?php   
    //Conexion con la base de datos, puedes eliminarlo o cambiarlo al metodo que tengas
    include 'conexion.php';
    //Declaracion de variables, ya sabes, modifica los nombres de los elementos de la parte visual para lo que tengas
    $id = $_POST['actualizar-idLicencia'];
    $nombre = $_POST['Actualizar-nombreLicencia'];
    $software = $_POST['actualizar-idSoftware'];
    $fechaVen = $_POST['actualizar-fecha'];
    

    //Instruccion de eliminar al usuario
    $query = "UPDATE licenciamiento
            Set nombre_licencia = '$nombre',
                id_software = '$software',
                fecha_vencimiento = '$fechaVen'
     WHERE Id_licencia = '$id'";
    
   $verificarEquipo = mysqli_query($conexion, "SELECT * FROM software WHERE id_software ='$software'");
    if(mysqli_num_rows($verificarEquipo) > 0){

        //-----------------------------------Verificar que la licencia exista-----------------------------------------------------------------------
        $verificarDepto = mysqli_query($conexion,"SELECT * FROM licenciamiento WHERE Id_licencia ='$id'");
        if(mysqli_num_rows($verificarDepto)>0){

            $ejecutar = mysqli_query($conexion, $query);
            if(!$ejecutar){
                echo '
                    <script>
                        alert("Licencia no actualizada");
                        window.location = "../../licenciamiento.php";
                    </script>
                ';
            }else{
                echo '
                    <script>
                        alert("Licencia actualizada");
                        window.location = "../../licenciamiento.php";
                    </script>
                ';
            }
            mysqli_close($conexion);
            }else{
                echo '
                <script>
                    alert("La licencia no existe, imposible actualizar");
                    window.location = "../../licenciamiento.php";
                </script>
                ';    
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