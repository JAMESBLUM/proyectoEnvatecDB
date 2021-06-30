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
                    <a href="mantenimiento.php">Mantenimiento</a>
                    <a href="licenciamiento.php" class="here">Licenciamiento</a>
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
        <h2 class="centrar-texto font-Naranja">Software</h2>
        <div class="perifericos-contenido contenedor">
            <div class="agregar-perifericos">
                <fieldset>
                    <legend class="legend">Agregar Software</legend>
                    <form action="build/php/agregarSoftware.php" method="POST" class="formulario-agregar-periferico">
                        <div class="campo">
                            <label for="id-software">Id del Software:</label>
                            <input type="text" id="id-software" placeholder="Ingresa el id del Software" name="agregar-idSoftware">
                        </div>
                        <div class="campo">
                            <label for="nombre-software">Nombre del Software:</label>
                            <input type="text" id="nombre-software" placeholder="Ingresa el nombre" name="agregar-nombreSoftware">
                        </div>
                        <div class="campo">
                            <label>Id del Departamento:</label>
                            <select   placeholder="Ingresa el Id del Depto" name="agregar-idDepto">
                            <option valuer="" disabled selected>----- Seleccione una Opción -----</option>
                            <?php
                                include 'build/php/conexion.php';
                                $getDepartamento1 = 'SELECT * FROM departamento';
                                $getDepartamento2 = mysqli_query($conexion,$getDepartamento1);
                                while($row = mysqli_fetch_array($getDepartamento2)){
                                    $id = $row['Id_depto'];
                                    $nombreDepto = $row['nombre_depto'];
                                    $idPlanta = $row['Id_planta'];
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
                    <td><th>Software Registrados</th></td>
                </thead>
            <tbody>
                <tr class="titulos-column">
                    <td class="centrar-texto">Id Software</td>
                    <td class="centrar-texto">Nombre Software</td>
                    <td class="centrar-texto">Id Depto</td>
                </tr>
                <?php
                    include 'build/php/conexion.php';
                    $query = "SELECT * FROM software";
                    $ejecutar = mysqli_query($conexion, $query);
                    while($mostrar = mysqli_fetch_array($ejecutar)){
                  ?>
                 <tr>
                      <td><?php echo $mostrar['Id_software'] ?></td>
                      <td><?php echo $mostrar['nombre_software'] ?></td>
                      <td><?php echo $mostrar['Id_depto'] ?></td>
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
            <legend class="legend">Eliminar Software</legend>
        <form action="build/php/eliminarSoftware.php" class="eliminar-periferico-form" method="POST">
            <div class="campo">
                <label for="eliminar">Ingresa el Id del Software:</label>
                <input type="text" id="eliminar" placeholder="Ingresa el Id" name="eliminar-software">
                <label for="nom-eliminar">Nombre del Software:</label>
                <input type="text" id="nom-eliminar" placeholder="Ingresa el nombre" name="eliminar-nomSoftware">
            </div>
            <input type="submit" class="btn-principal" value="Eliminar">
        </form>
        </fieldset>
        
        <div class="actualizar-periferico">
        <fieldset>
            <legend class="legend">Actualizar Software</legend>
        <form action="build/php/actualizarSoftware.php" class="actualizar-periferico-form" method="POST">
            <div class="campo">
                <label for="actualizar">Ingresa el Id del Software:</label>
                <input type="text" id="actualizar" placeholder="Ingresa el Id" name="actualizar-idSoftware">
            </div>
            <div class="campo">
                <label for="actualizar-nombre">Actualizar nombre del Software:</label>
                <input type="text" id="actualizar-nombre" placeholder="Ingresa el nombre" name="Actualizar-nombreSoftware">
            </div>
            <!--<div class="campo">
                <label for="actualizar-depto">Actualizar Id Depto:</label>
                <input type="text" id="actualizar-depto" placeholder="Ingresa el nuevo Id" name="actualizar-idDepto">
            </div>-->
            <div class="campo">
                <label for="">Actualizar Id Depto:</label>
                <select  name="actualizar-idDepto">
                            <option value="" disabled selected>----- Seleccione una Opción -----</option>
                            <?php
                                include 'build/php/conexion.php';
                                $getDepartamento1 = 'SELECT * FROM departamento';
                                $getDepartamento2 = mysqli_query($conexion,$getDepartamento1);
                                while($row = mysqli_fetch_array($getDepartamento2)){
                                    $id = $row['Id_depto'];
                                    $nombreDepto = $row['nombre_depto'];
                                    $idPlanta = $row['Id_Planta'];
                            ?>  
                                    <option value="<?php echo $id;?>"><?php echo $id;?></option>
                                    <?php
                                }
                            ?>
                            </select>
            </div>
            <input type="submit" class="btn-principal" value="Actualizar ">
        </form>
        </fieldset>
        </div>
    </section>

    <!--=============================== INICIA LICENCIAMIENTO ===============================-->
    <section class="perifericos">
        <h2 class="centrar-texto font-Naranja">Licenciamiento</h2>
        <div class="perifericos-contenido contenedor">
            <div class="agregar-perifericos">
                <fieldset>
                    <legend class="legend">Agregar Licencia</legend>
                    <form action="build/php/agregarLicencia.php" method="POST" class="formulario-agregar-periferico">
                        <div class="campo">
                            <label for="id-software">Id de la Licencia:</label>
                            <input type="text" id="id-software" placeholder="Ingresa el id del Software" name="agregar-idLicencia">
                        </div>
                        <div class="campo">
                            <label for="nombre-software">Nombre de la Licencia:</label>
                            <input type="text" id="nombre-software" placeholder="Ingresa el nombre" name="agregar-nombreLicencia">
                        </div>
                        <!--
                        <div class="campo">
                            <label for="Id-Depto">Id del Software:</label>
                            <input type="text" id="Id-Depto" placeholder="Ingresa el Id del Depto"  name="agregar-Lic-idSoftware">
                        </div>-->
                        <div class="campo">
                            <label>Id del Software:</label>
                            <select   placeholder="Ingresa el Id del Depto" name="agregar-Lic-idSoftware">
                            <option value="" disabled selected>----- Seleccione una Opción -----</option>
                            <?php
                                include 'build/php/conexion.php';
                                $getSoftware1 = 'SELECT * FROM software';
                                $getSoftware2 = mysqli_query($conexion,$getSoftware1);
                                while($row = mysqli_fetch_array($getSoftware2)){
                                    $id = $row['Id_software'];
                                    $nombreSoftware = $row['nombre_software'];
                                    $idDepto = $row['Id_depto'];
                            ?>  
                                    <option value="<?php echo $id;?>"><?php echo $id;?></option>
                                    <?php
                                }
                            ?>
                            </select>
                        </div>
                        <div class="campo">
                            <label for="vencimiento">Fecha de Vencimiento:</label>
                            <input type="text" id="vencimiento" placeholder="Ingresa el Id del Depto"  name="agregar-vencimiento">
                        </div>
                        <input type="submit" value="Agregar" class="btn-principal">
                    </form>
                </fieldset>
            </div>
        </div>
    </section>
    <section class="perifericos">
        <div class="perifericos-tabla-contenido contenedor">
            <table class="tabla-MostrarDatos">
                <thead>
                    <td><th>Software Registrados</th></td>
                </thead>
            <tbody>
                <tr class="titulos-column">
                    <td class="centrar-texto">Id Licencia</td>
                    <td class="centrar-texto">Nombre Licencia</td>
                    <td class="centrar-texto">Id Software</td>
                    <td class="centrar-texto">Fecha Vencimiento</td>
                </tr>
                <?php
                    include 'build/php/conexion.php';
                    $query = "SELECT * FROM licenciamiento";
                    $ejecutar = mysqli_query($conexion, $query);
                    while($mostrar = mysqli_fetch_array($ejecutar)){
                  ?>
                 <tr>
                      <td><?php echo $mostrar['Id_licencia'] ?></td>
                      <td><?php echo $mostrar['nombre_licencia'] ?></td>
                      <td><?php echo $mostrar['Id_software'] ?></td>
                      <td><?php echo $mostrar['fecha_vencimiento'] ?></td>
                 </tr>
                    <?php 
                      }
                      mysqli_close($conexion);
                    ?>
                </tbody>
            </table>
        </div>
    </section>
    <section class="eliminar-actualizar-periferico contenedor">
        <fieldset>
            <legend class="legend">Eliminar Licencia</legend>
        <form action="build/php/eliminarLicencia.php" class="eliminar-periferico-form" method="POST">
            <div class="campo">
                <label for="eliminarLicencia">Ingresa el Id de la Licencia:</label>
                <input type="text" id="eliminarLicencia" placeholder="Ingresa el Id" name="eliminar-Licencia">
                <label for="nom-eliminarLicencia">Nombre de la Licencia:</label>
                <input type="text" id="nom-eliminarLicencia" placeholder="Ingresa el nombre" name="eliminar-nomLicencia">
            </div>
            <input type="submit" class="btn-principal" value="Eliminar">
        </form>
        </fieldset>
        
        <div class="actualizar-periferico">
        <fieldset>
            <legend class="legend">Actualizar Licencia</legend>
        <form action="build/php/actualizarLicencia.php" class="actualizar-periferico-form" method="POST">
            <div class="campo">
                <label for="actualizarLicencia">Ingresa el Id de la Licencia:</label>
                <input type="text" id="actualizarLicencia" placeholder="Ingresa el Id" name="actualizar-idLicencia">
            </div>
            <div class="campo">
                <label for="actualizar-nombre-Licencia">Actualizar nombre de la Licencia:</label>
                <input type="text" id="actualizar-nombre-Licencia" placeholder="Ingresa el nombre" name="Actualizar-nombreLicencia">
            </div>
            <!--<div class="campo">
                <label for="actualizar-licencia">Actualizar Id Software:</label>
                <input type="text" id="actualizar-licencia" placeholder="Ingresa el nuevo Id" name="actualizar-idSoftware">
            </div>-->
           <div class="campo">
                <label for="">Actualizar Id Software:</label>
                <select  name="actualizar-idSoftware">
                            <option value="" disabled selected>----- Seleccione una Opción -----</option>
                            <?php
                                include 'build/php/conexion.php';
                                $getSoftwareActualizar1 = 'SELECT * FROM software';
                                $getSoftwareActualizar2 = mysqli_query($conexion,$getSoftwareActualizar1);
                                while($row = mysqli_fetch_array($getSoftwareActualizar2)){
                                    $id = $row['Id_software'];
                                    $nombreSoftwareActualizar = $row['nombre_software'];
                                    $idDeptoActualizar = $row['Id_Depto'];
                            ?>  
                                    <option value="<?php echo $id;?>"><?php echo $id;?></option>
                                    <?php
                                }
                            ?>
                            </select>
            </div>
            <div class="campo">
                <label for="actualizar-fecha">Actualizar Fecha de Vencimiento:</label>
                <input type="text" id="actualizar-fecha" placeholder="Ingresa la Fecha" name="actualizar-fecha">
            </div>
            <input type="submit" class="btn-principal" value="Actualizar">
        </form>
        </fieldset>
        </div>
    </section>
</body>

</html>