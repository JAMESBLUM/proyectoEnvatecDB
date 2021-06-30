<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="build/css/app.css">
    <title>Envatec</title>
</head>

<body>
    <header class="header-envatecHome">
        <div class="header-envatecHome-contenido">
            <div class="header-envatecHome-logo">
                <picture>
                    <a href="envatec.php">
                        <source srcset="build/img/envatecLogo.webp" type="image/webp">
                        <img src="build/img/envatecLogo.png" alt="envatec Logotipo">
                    </a>
                </picture>
            </div>
            <div>
                <nav class="navegacionPrincipal">
                    <a href="departamentos.php">Departamentos</a>
                    <a href="mantenimiento.php" class="here">Mantenimiento</a>
                    <a href="licenciamiento.php">Licenciamiento</a>
                    <a href="perifericos.php">Perifericos</a>
                    <a href="usuarios.php">Usuarios</a>
                    <a href="envatec.php">Equipos</a>
                    <a href="plantas.php">Plantas</a>
                    <a href="index.php">Salir</a>
                </nav>
            </div>
        </div>
    </header>

    <section class="perifericos">
        <h2 class="centrar-texto font-Naranja">Mantenimiento</h2>
        <div class="perifericos-contenido contenedor">
            <div class="agregar-perifericos">
                <fieldset>
                    <legend class="legend">Agregar Mantenimiento Preventivo</legend>
                    <form action="build/php/agregarMantenimiento.php" method="POST" class="formulario-agregar-periferico">
                        <div class="campo">
                            <label for="id-mantenimiento">Id Mantenimiento:</label>
                            <input type="text" id="id-mantenimiento" placeholder="Ingresa el id del Mantenimiento" name="agregar-idMantenimiento">
                        </div>
                        <div class="campo">
                            <label for="Fecha-Aplicacion">Fecha de Aplicación:</label>
                            <input type="text" id="Fecha-Aplicacion" placeholder="Ingresa la Fecha de Aplicación" name="agregar-fechaAplicacion">
                        </div>
                        <!--<div class="campo">
                            <label for="id-equipo">Id del Equipo:</label>
                            <input type="text" id="id-equipo" placeholder="Ingresa el Id del Equipo"  name="agregar-idEquipo-mantenimiento">
                        </div>-->
                        <div class="campo">
                            <label for="">Id del Equipo:</label>
                            <select name="agregar-idEquipo-mantenimiento">
                                <option disabled selected>----- Seleccione una Opción -----</option>
                                    <?php
                                         include 'build/php/conexion.php';
                                         $getEquipos1 = 'SELECT * FROM equipos';
                                         $getEquipos2 = mysqli_query($conexion,$getEquipos1);
                                while($row = mysqli_fetch_array($getEquipos2)){
                                    $id = $row['Id_equipo'];
                                    $marca = $row['marca'];
                                    $modelo = $row['modelo'];
                                    $arquitectura = $row['arquitectura'];
                                    $descripcion = $row['descripcion'];
                                    $idPerifericos = $row['Id_perifericos'];
                            ?>  
                                    <option value="<?php echo $id;?>"><?php echo $id;?></option>
                                    <?php
                                }
                            ?>
                            </select>
                        </div>
                        <input type="submit" value="Agregar" class="btn-principal">
                    </form>
                </fieldset>
            </div>
        </div>
    </section>
    <!--FIN DE AGREGAR PERIFERICO-->
    <main class="perifericos">
        <div class="perifericos-tabla-contenido contenedor">
            <table class="tabla-MostrarDatos">
                <thead>
                    <td><th>Mantenimientos Registrados</th></td>
                </thead>
            <tbody>
                <tr class="titulos-column">
                    <td class="centrar-texto">Id Mantenimiento</td>
                    <td class="centrar-texto">Fecha de Aplicación</td>
                    <td class="centrar-texto">Id Equipo Computo</td>
                </tr>
                <?php
                    include 'build/php/conexion.php';
                    $query = "SELECT * FROM mantenimiento_preventivo";
                    $ejecutar = mysqli_query($conexion, $query);
                    while($mostrar = mysqli_fetch_array($ejecutar)){
                  ?>
                 <tr>
                      <td><?php echo $mostrar['Id_matenimiento'] ?></td>
                      <td><?php echo $mostrar['fecha_aplicacion'] ?></td>
                      <td><?php echo $mostrar['Id_equipo'] ?></td>
                 </tr>
                    <?php 
                      }
                      mysqli_close($conexion);
                    ?>
                </tbody>
            </table>
        </div>
    </main>

    
    <section class="eliminar-actualizar-periferico contenedor">
        <fieldset>
            <legend class="legend">Eliminar Mantenimiento</legend>
        <form action="build/php/eliminarMantenimiento.php" class="eliminar-periferico-form" method="POST">
            <div class="campo">
                <label for="eliminar">Ingresa el Id del Mantenimiento:</label>
                <input type="text" id="eliminar" placeholder="Ingresa el Id" name="eliminar-mantenimiento">
            </div>
            <input type="submit" class="btn-principal" value="Eliminar">
        </form>
        </fieldset>
        
        
        <div class="actualizar-periferico">
        <fieldset>
            <legend class="legend">Actualizar Mantenimiento</legend>
        <form action="build/php/actualizarMantenimiento.php" class="actualizar-periferico-form" method="POST">
            <div class="campo">
                <label for="actualizar-mantenimiento">Ingresa el Id del mantenimiento:</label>
                <input type="text" id="actualizar-mantenimiento" placeholder="Ingresa el Id" name="actualizar-idMantenimiento">
            </div>
            <div class="campo">
                <label for="actualizar-fecha">Actualizar Fecha de Aplicación:</label>
                <input type="text" id="actualizar-fecha" placeholder="Ingresa la fecha" name="Actualizar-fecha-mantenimiento">
            </div>
            <!--<div class="campo">
                <label for="id-equipo-mantenimiento">Actualizar Id del Equipo:</label>
                <input type="text" id="id-equipo-mantenimiento" placeholder="Actualizar Id Equipo" name="actualizar-IdEquipo-mantenimiento">
            </div>-->
            <div class="campo">
                            <label for="">Actualizar Id del Equipo:</label>
                            <select name="actualizar-IdEquipo-mantenimiento">
                                <option disabled selected>----- Seleccione una Opción -----</option>
                                    <?php
                                         include 'build/php/conexion.php';
                                         $getEquipos1 = 'SELECT * FROM equipos';
                                         $getEquipos2 = mysqli_query($conexion,$getEquipos1);
                                while($row = mysqli_fetch_array($getEquipos2)){
                                    $id = $row['Id_equipo'];
                                    $marca = $row['marca'];
                                    $modelo = $row['modelo'];
                                    $arquitectura = $row['arquitectura'];
                                    $descripcion = $row['descripcion'];
                                    $idPerifericos = $row['Id_perifericos'];
                            ?>  
                                    <option value="<?php echo $id;?>"><?php echo $id;?></option>
                                    <?php
                                }
                            ?>
                            </select>
                        </div>
            <input type="submit" class="btn-principal" value="Actualizar">
        </form>
        </fieldset>
        </div>
    </section>
</body>

</html>