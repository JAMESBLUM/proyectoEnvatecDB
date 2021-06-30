<?php   
    //Conexion con la base de datos, puedes eliminarlo o cambiarlo al metodo que tengas
    include 'conexion.php';
    //Declaracion de variables, ya sabes, modifica los nombres de los elementos de la parte visual para lo que tengas
    $id = $_POST['actualizar-idDepto'];
    $nombre = $_POST['Actualizar-nombreDepto'];
    $planta = $_POST['actualizar-idPlanta'];
    

    //Instruccion de eliminar al usuario
    $query = "UPDATE departamento
            Set nombre_depto = '$nombre',
            id_planta = '$planta'
     WHERE id_depto = '$id'";
    
   $verificarEquipo = mysqli_query($conexion, "SELECT * FROM plantas WHERE id_planta ='$planta'");
    if(mysqli_num_rows($verificarEquipo) < 0){
        
        //Esta parte es para que se pregunte si quiere ingresar departamento, entonces lo llevaría a la ventana de ingresar equipo
        echo '
        <script>
            if(confirm("El software no exixte, ¿Quieres ingresarlo")){
                window.location = "../ProyectoDB/Visuales.php";     
            }else{
            }
        </script>
        ';  
        //-----------------------------------Verificar que la licencia exista-----------------------------------------------------------------------
        $verificarDepto = mysqli_query($conexion,"SELECT * FROM departamento WHERE id_depto ='$id'");
        if(mysqli_num_rows($verificarDepto)>0){                            
            $ejecutar = mysqli_query($conexion, $query);

            if(!$ejecutar){
                echo '
                    <script>
                        alert("Departamento no actualizado");
                        window.location = "../../departamentos.php";
                    </script>
                ';
            }else{
                echo '
                    <script>
                        alert("Departamento actualizado");
                        window.location = "../../departamentos.php";
                    </script>
                ';
            }
            mysqli_close($conexion);
            }else{
                echo '
                <script>
                    alert("El departamento no existe, imposible actualizar");
                    window.location = "../../departamentos.php";
                </script>
                ';    
                
                }
        }else{
            $verificarDepto = mysqli_query($conexion,"SELECT * FROM departamento WHERE id_depto ='$id'");
            if(mysqli_num_rows($verificarDepto)>0){                            
                $ejecutar = mysqli_query($conexion, $query);

                if(!$ejecutar){
                    echo '
                        <script>
                            alert("Departamento no actualizado");
                            window.location = "../../departamentos.php";
                        </script>
                    ';
                }else{
                    echo '
                        <script>
                            alert("Departamento actualizado");
                            window.location = "../../departamentos.php";
                        </script>
                    ';
                }
                mysqli_close($conexion);
            }else{
                    echo '
                    <script>
                        alert("El departamento no existe, imposible actualizar");
                        window.location = "../../departamentos.php";
                    </script>
                    ';                
            }
        }
        
?>