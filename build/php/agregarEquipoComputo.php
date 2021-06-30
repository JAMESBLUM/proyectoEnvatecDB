<?php
    include 'conexion.php';
/*========= REGISTRAR EQUIPO =========*/
    $id_equipo = $_POST['Id-equipo'];
    $marca_equipo = $_POST['marca-equipo'];
    $modelo_equipo = $_POST['modelo-equipo'];
    $arq_equipo = $_POST['arquitectura-equipo'];
    $descrip_equipo = $_POST['descripcion-equipo'];
    $id_perifericos = $_POST['Id-perifericos'];

    $query = "INSERT INTO equipos(Id_equipo, marca, modelo, arquitectura, descripcion, Id_perifericos) 
             VALUES('$id_equipo','$marca_equipo','$modelo_equipo','$arq_equipo', '$descrip_equipo', '$id_perifericos')";
    //===== VERIFICA QUE EXISTA EL PERIFERICO =====
    $verificaPeriferico = mysqli_query($conexion,"SELECT * FROM perifericos WHERE Id_perifericos ='$id_perifericos'");

    if(mysqli_num_rows($verificaPeriferico) > 0){
        //-----------------------------------Verificar que el equipo exista-----------------------------------------------------------------------
        $verificarDepto = mysqli_query($conexion,"SELECT * FROM equipos WHERE Id_equipo ='$id_equipo'");
        if(mysqli_num_rows($verificarDepto)>0){                            
                echo '
                <script>
                    alert("El equipo ya existe");
                    window.location = "../../envatec.php";
                </script>
                ';    
            }else{
                $ejecutar = mysqli_query($conexion, $query);

                if(!$ejecutar){
                    echo '
                        <script>
                            alert("Equipo no almacenado");
                            window.location = "../../envatec.php";
                        </script>
                    ';
                }else{
                    echo '
                        <script>
                            alert("Equipo almacenado");
                            window.location = "../../envatec.php";
                        </script>
                    ';
                }
                mysqli_close($conexion);
                }
        }else{
            //Esta parte es para que se pregunte si quiere ingresar departamento, entonces lo llevaría a la ventana de ingresar equipo
            echo '
            <script>
                if(confirm("El periferico no exixte, ¿Quieres ingresarlo")){
                    window.location = "../../perifericos.php";     
                }else{
                    window.location = "../../envatec.php";
                }
            </script>
            ';  
        }
    
?>
