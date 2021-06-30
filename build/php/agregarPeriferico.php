<?php
    include 'conexion.php';

    /*====== REGISTRA EL PERIFERICO ======*/
    $id_periferico = $_POST['Id-periferico-agregar'];
    $nombre_periferico = $_POST['nombre-periferico-agregar'];
    $descrip_periferico = $_POST['descripcion-periferico-agregar'];

    $query = "INSERT INTO perifericos(Id_perifericos, nombre_perifericos, descripcion)
              VALUES('$id_periferico', '$nombre_periferico', '$descrip_periferico')";

    //==== VERIFICA QUE NO SE REPITA EL PERIFERICO
    $verificar_periferico = mysqli_query($conexion, "SELECT * FROM perifericos WHERE Id_perifericos='$id_periferico'");
    if(mysqli_num_rows($verificar_periferico) > 0){
        echo'
            <script>
                alert("El periférico ya existe");
                window.location = "../../perifericos.php";
            </script>
        ';
        exit(); //Termina el script actual sin que se ejecute lo demas debajo de el
        mysqli_close($conexion);
    }
    
        //=== EJECUTA EL QUERY DE AGREGAR PERIFERICO
        $ejecutar = mysqli_query($conexion, $query);
        if($ejecutar){
            echo'
            <script>
                alert("Periférico agregado exitosamente");
                window.location = "../../perifericos.php";
            </script>
            ';
        }else{
            echo'
            <script>
                alert("No se pudo agregar el periférico");
                window.location = "../../perifericos.php";
            </script>
        ';
        }
    mysqli_close($conexion);
?>