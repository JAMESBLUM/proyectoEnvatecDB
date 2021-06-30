<?php   
    //Conexion con la base de datos, puedes eliminarlo o cambiarlo al metodo que tengas
    include 'conexion.php';
    //Declaracion de variables, ya sabes, modifica los nombres de los elementos de la parte visual para lo que tengas
    $id = $_POST['agregar-IdDepto'];
    $nombre = $_POST['agregar-nombreDepto'];
    $planta = $_POST['agregar-IdPlanta'];


    //Instruccion de insertar valores
    $query = "INSERT INTO departamento(id_depto, nombre_depto, id_planta) VALUES('$id','$nombre','$planta')";
    
    //----------------------------Verificar que la planta exista------------------------------------------------------------------------------------
    $verificarEquipo = mysqli_query($conexion, "SELECT * FROM plantas WHERE id_planta ='$planta'");
    if(mysqli_num_rows($verificarEquipo) > 0){

        //-----------------------------------Verificar que el departamento exista-----------------------------------------------------------------------
        $verificarDepto = mysqli_query($conexion,"SELECT * FROM departamento WHERE id_depto ='$id' and nombre_depto = '$nombre'");
        if(mysqli_num_rows($verificarDepto)>0){                            
                echo '
                <script>
                    alert("El departamento ya existe");
                    window.location = "../../departamentos.php";
                </script>
                ';    
            }else{
                $ejecutar = mysqli_query($conexion, $query);

                if(!$ejecutar){
                    echo '
                        <script>
                            alert("Departamento no almecenado");
                            window.location = "../../departamentos.php";
                        </script>
                    ';
                }else{
                    echo '
                        <script>
                            alert("Departamento almecenado");
                            window.location = "../../departamentos.php";
                        </script>
                    ';
                }
                mysqli_close($conexion);
                }
        }else{
            //Esta parte es para que se pregunte si quiere ingresar la planta, entonces lo llevaría a la ventana de ingresar equipo
            echo '
            <script>
                if(confirm("La planta no exixte, ¿Quieres ingresarlo")){
                    window.location = "../../plantas.php";     
                }else{
                    window.location = "../../departamentos.php";
                }
            </script>
            ';  
        }
?>