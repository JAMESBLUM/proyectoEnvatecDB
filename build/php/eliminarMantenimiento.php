<?php
    include 'conexion.php';
    $id = $_POST['eliminar-mantenimiento'];

     //Instruccion de eliminar al usuario
     $query = "DELETE FROM mantenimiento_preventivo WHERE Id_matenimiento  = '$id'";
    
     //----------------------------Verificar que el mantenimiento exista------------------------------------------------------------------------------------
     $verificarUsuario = mysqli_query($conexion, "SELECT * FROM mantenimiento_preventivo  WHERE Id_matenimiento ='$id'");
     if(mysqli_num_rows($verificarUsuario) > 0){
         $ejecutar = mysqli_query($conexion, $query);
 
                 if(!$ejecutar){
                     echo '
                         <script>
                             alert("Mantenimiento no eliminada");
                             window.location = "../../mantenimiento.php";
                         </script>
                     ';
                 }else{
                     echo '
                         <script>
                             alert("Mantenimiento eliminado exitosamente");
                             window.location = "../../mantenimiento.php";
                         </script>
                     ';
                 }
     }else{
         echo'
             <script>
             alert("El mantenimiento ya ha sido eliminado o no existe");
             window.location = "../../mantenimiento.php";
             </script>
         ';
     }
?>