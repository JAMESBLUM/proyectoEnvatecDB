<?php
    include 'conexion.php';
    $id = $_POST['actualizar-idEquipo'];
    $marca = $_POST['Actualizar-marcaEquipo'];
    $modelo = $_POST['actualizar-modeloEquipo'];
    $arqui = $_POST['actualizar-arquiEquipo'];
    $descrip = $_POST['actualizar-descripEquipo'];
    $idPeriferico = $_POST['actualizar-idPeriferico-equipo'];

    $query = "UPDATE equipos
            Set marca = '$marca',
                modelo = '$modelo',
                arquitectura = '$arqui',
                descripcion = '$descrip',
                Id_perifericos = '$idPeriferico'
            WHERE Id_equipo = '$id'";
    $verificarPeriferico = mysqli_query($conexion, "SELECT * FROM perifericos WHERE Id_perifericos ='$idPeriferico'");
    if(mysqli_num_rows($verificarPeriferico) > 0){

        //-----------------------------------Verificar que la licencia exista-----------------------------------------------------------------------
        $verificarDepto = mysqli_query($conexion,"SELECT * FROM equipos WHERE Id_equipo ='$id'");
        if(mysqli_num_rows($verificarDepto)>0){
            $ejecutar = mysqli_query($conexion, $query);
            if(!$ejecutar){
                echo '
                    <script>
                        alert("El equipo no se a actualizado");
                        window.location = "../../envatec.php";
                    </script>
                ';
            }else{
                echo '
                    <script>
                        alert("Equipo actualizado");
                        window.location = "../../envatec.php";
                    </script>
                ';
            }
            mysqli_close($conexion);
            }else{
                echo '
                <script>
                    alert("El equipo no existe, imposible actualizar");
                    window.location = "../../envatec.php";
                </script>
                ';    
                }
        }else{
            //Esta parte es para que se pregunte si quiere ingresar departamento, entonces lo llevaría a la ventana de ingresar equipo
            echo '
            <script>
                if(confirm("El Periferico no exixte, ¿Quieres Agregarlo")){
                    window.location = "../../perifericos.php";     
                }else{
                    window.location = "../../envatec.php";
                }
            </script>
            ';  
        }
?>