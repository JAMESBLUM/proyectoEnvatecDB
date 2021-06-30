<?php
    include 'conexion.php';
    $id = $_POST['actualizar-idMantenimiento'];
    $fecha = $_POST['Actualizar-fecha-mantenimiento'];
    $idEquipo = $_POST['actualizar-IdEquipo-mantenimiento'];

     //Instruccion de actualizar Mantenimiento
     $query = "UPDATE mantenimiento_preventivo
                Set fecha_aplicacion = '$fecha',
                    Id_equipo = '$idEquipo'
                WHERE Id_matenimiento = '$id'";
     $verificarEquipo = mysqli_query($conexion, "SELECT * FROM equipos WHERE Id_equipo ='$idEquipo'");

     if(mysqli_num_rows($verificarEquipo) > 0){
        //-----------------------------------Verificar que la licencia exista-----------------------------------------------------------------------
        $verificarMantenimiento = mysqli_query($conexion,"SELECT * FROM mantenimiento_preventivo WHERE Id_matenimiento ='$id'");
        if(mysqli_num_rows($verificarMantenimiento)>0){
            $ejecutar = mysqli_query($conexion, $query);
            if(!$ejecutar){
                echo '
                    <script>
                        alert("Mantenimiento no actualizado");
                        window.location = "../../mantenimiento.php";
                    </script>
                ';
            }else{
                echo '
                    <script>
                        alert("Licencia actualizada");
                        window.location = "../../mantenimiento.php";
                    </script>
                ';
            }
            mysqli_close($conexion);
            }else{
                echo '
                <script>
                    alert("La licencia no existe, imposible actualizar");
                    window.location = "../../mantenimiento.php";
                </script>
                ';    
                }
        }else{
            //Esta parte es para que se pregunte si quiere ingresar departamento, entonces lo llevaría a la ventana de ingresar equipo
            echo '
            <script>
                if(confirm("El equipo no existe, ¿Quieres ingresarlo")){
                    window.location = "../../envatec.php";     
                }else{
                    window.location = "../../mantenimiento.php";
                }
            </script>
            ';  
        }     
?>