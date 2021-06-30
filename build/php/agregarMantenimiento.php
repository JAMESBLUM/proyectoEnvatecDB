<?php
    include 'conexion.php';
    $id = $_POST['agregar-idMantenimiento'];
    $fechaAplicacion = $_POST['agregar-fechaAplicacion'];
    $idEquipo = $_POST['agregar-idEquipo-mantenimiento'];

    $query = "INSERT INTO mantenimiento_preventivo(Id_matenimiento , fecha_aplicacion, Id_equipo) VALUES('$id','$fechaAplicacion','$idEquipo')";
    $verificaEquipo = mysqli_query($conexion, "SELECT * FROM equipos WHERE Id_equipo ='$idEquipo'");
    if(mysqli_num_rows($verificaEquipo) > 0){
        //-----------------------------------Verificar que el departamento exista-----------------------------------------------------------------------
        $verificarDepto = mysqli_query($conexion,"SELECT * FROM mantenimiento_preventivo WHERE Id_matenimiento  ='$id'");
        if(mysqli_num_rows($verificarDepto)>0){                            
                echo '
                <script>
                    alert("El mantenimiento ya esta registrado");
                    window.location = "../../mantenimiento.php";
                </script>
                ';    
            }else{
                $ejecutar = mysqli_query($conexion, $query);

                if(!$ejecutar){
                    echo '
                        <script>
                            alert("Mantenimiento No Registrado");
                            window.location = "../../mantenimiento.php";
                        </script>
                    ';
                }else{
                    echo '
                        <script>
                            alert("Mantenimiento Registrado con Exito");
                            window.location = "../../mantenimiento.php";
                        </script>
                    ';
                }
                mysqli_close($conexion);
                }
        }else{
            //Esta parte es para que se pregunte si quiere ingresar departamento, entonces lo llevaría a la ventana de ingresar equipo
            echo '
            <script>
                if(confirm("El Equipo no existe, ¿Quieres ingresarlo")){
                    window.location = "../../envatec.php";     
                }else{
                    window.location = "../../mantenimiento.php";
                }
            </script>
            ';  
        }
?>