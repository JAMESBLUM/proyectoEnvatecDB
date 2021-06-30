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
                    <a href="licenciamiento.php">Licenciamiento</a>
                    <a href="perifericos.php">Perifericos</a>
                    <a href="usuarios.php">Usuarios</a>
                    <a href="envatec.php" class="here">Equipos</a>
                    <a href="plantas.php">Plantas</a>
                    <a href="index.php">Salir</a>
                </nav>
            </div>
        </div>
    </header>
    <section class="equiposComputo">
        <div class="equiposComputo-contenido contenedor">
            <h2 class="centrar-texto font-Naranja">Equipos de Computo</h2>
            <div class="agregar-equipoComputo">
                <fieldset>
                    <legend class="legend">Agregar Equipo de Computo</legend>
                    <form action="build/php/agregarEquipoComputo.php" method="POST" class="formulario-agregar-equipoComputo">
                        <div class="campo">
                            <label for="Id-equipo">Id del equipo:</label>
                            <input type="text" id="Id-equipo" placeholder="Ingresa el Id del equipo" name="Id-equipo">
                        </div>
                        <div class="campo">
                            <label for="marca">Marca:</label>
                            <input type="text" id="marca"  placeholder="Ingresa la marca del equipo" name="marca-equipo">
                        </div>
                        <div class="campo">
                            <label for="modelo">Modelo:</label>
                            <input type="text" id="modelo"  placeholder="Ingresa el modelo del equipo" name="modelo-equipo">
                        </div>
                        <div class="campo">
                            <label for="arquitectura">Arquitectura:</label>
                            <select  name="arquitectura-equipo">
                                <option valuer="" disabled selected>----- Seleccione una Opción -----</option>
                                <option value="DVR">DVR</option>
                                <option value="laptop">Laptop</option>
                                <option value="AllinOne">All in one</option>
                            </select>
                        </div>
                        <div class="campo">
                            <label for="descripcion">Descripción:</label>
                            <textarea type="textarea" id="descripcion" placeholder="Ingresa la descripción del equipo" name="descripcion-equipo"></textarea>
                        </div>
                        <div class="campo">
                            <label>Id de los perifericos:</label>
                            <select name="Id-perifericos">
                            <option disabled selected>----- Seleccione una Opción -----</option>
                            <?php
                                include 'build/php/conexion.php';
                                $getPeriferico1 = 'SELECT * FROM perifericos';
                                $getPeriferico2 = mysqli_query($conexion,$getPeriferico1);
                                while($row = mysqli_fetch_array($getPeriferico2)){
                                    $id = $row['Id_perifericos'];
                                    $nombrePeriferico = $row['nombre_perifericos'];
                                    $decripPeriferico = $row['descripcion'];
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

    <main class="perifericos">
        <div class="perifericos-tabla-contenido contenedor">
            <table class="tabla-MostrarDatos">
                <thead>
                    <td><th>Equipos Disponibles</th></td>
                </thead>
            <tbody>
                <tr class="titulos-column">
                    <td class="centrar-texto">Id Equipo</td>
                    <td class="centrar-texto">Marca</td>
                    <td class="centrar-texto">Modelo</td>
                    <td class="centrar-texto">Arquitectura</td>
                    <td class="centrar-texto">Descripcion</td>
                    <td class="centrar-texto">Id Periferico</td>
                </tr>
                <?php
                    include 'build/php/conexion.php';
                    $query = "SELECT * FROM equipos";
                    $ejecutar = mysqli_query($conexion, $query);
                    while($mostrar = mysqli_fetch_array($ejecutar)){
                  ?>
                 <tr>
                      <td><?php echo $mostrar['Id_equipo'] ?></td>
                      <td><?php echo $mostrar['marca'] ?></td>
                      <td><?php echo $mostrar['modelo'] ?></td>
                      <td><?php echo $mostrar['arquitectura'] ?></td>
                      <td><?php echo $mostrar['descripcion'] ?></td>
                      <td><?php echo $mostrar['Id_perifericos'] ?></td>
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
            <legend class="legend">Eliminar Equipo</legend>
        <form action="build/php/eliminarEquipo.php" class="eliminar-periferico-form" method="POST">
            <div class="campo">
                <label for="eliminarEquipo">Ingresa el Id del Equipo:</label>
                <input type="text" id="eliminarEquipo" placeholder="Ingresa el Id" name="eliminar-equipo">
                <label for="nom-eliminarLicencia">Marca del Equipo:</label>
                <input type="text" id="nom-eliminarLicencia" placeholder="Ingresa la Marca" name="eliminar-marcaEquipo">
            </div>
            <input type="submit" class="btn-principal" value="Eliminar Equipo">
        </form>
        </fieldset>

        
        <div class="actualizar-periferico">
        <fieldset>
            <legend class="legend">Actualizar Equipo</legend>
        <form action="build/php/actualizarEquipo.php" class="actualizar-periferico-form" method="POST">
            <div class="campo">
                <label for="actualizarEquipo">Ingresa el Id del Equipo:</label>
                <input type="text" id="actualizarEquipo" placeholder="Ingresa el Id" name="actualizar-idEquipo">
            </div>
            <div class="campo">
                <label for="actualizar-marca-equipo">Actualizar Marca del Equipo:</label>
                <input type="text" id="actualizar-marca-equipo" placeholder="Ingresa La Marca" name="Actualizar-marcaEquipo">
            </div>
            <div class="campo">
                <label for="actualizar-Modelo">Actualizar Modelo del Equipo:</label>
                <input type="text" id="actualizar-Modelo" placeholder="Ingresa el Nuevo Modelo" name="actualizar-modeloEquipo">
            </div>
            <div class="campo">
                            <label for="arquitectura">Actualizar Arquitectura de Equipo:</label>
                            <select id="arquitectura" class="select" name="actualizar-arquiEquipo">
                                <option valuer="" disabled selected>----- Seleccione una Opción -----</option>
                                <option value="DVR">DVR</option>
                                <option value="laptop">Laptop</option>
                                <option value="AllinOne">All in one</option>
                            </select>
                        </div>
            <div class="campo">
                <label for="actualizar-descrip">Actualizar Descripción del Equipo:</label>
                <input type="text" id="actualizar-descrip" placeholder="Ingresa la Descrip" name="actualizar-descripEquipo">
            </div>
            <!--<div class="campo">
                <label for="actualizar-idPerifericos">Actualizar Id Periferico del Equipo:</label>
                <input type="text" id="actualizar-idPerifericos" placeholder="Ingresa el Id del periferico" name="actualizar-idPeriferico-equipo">
            </div>-->
            <div class="campo">
                <label for="actualizar-idPeriferico">Id Perifericos del Equipo:</label>
                <select name="actualizar-idPeriferico-equipo">
                            <option disabled selected>----- Seleccione una Opción -----</option>
                            <?php
                                include 'build/php/conexion.php';
                                $getPerifericos1 = 'SELECT * FROM perifericos';
                                $getPerifericos2 = mysqli_query($conexion,$getPerifericos1);
                                while($row = mysqli_fetch_array($getPerifericos2)){
                                    $id = $row['Id_perifericos'];
                                    $nombrePeriferico = $row['nombre_perifericos'];
                                    $descripcion = $row['descripcion'];
                            ?>
                                    <option value="<?php echo $id;?>"><?php echo $id;?></option>
                                    <?php
                                }
                            ?>
                </select>
            </div>
            <input type="submit" class="btn-principal" value="Actualizar Depto">
        </form>
        </fieldset>
        </div>
    </section>

</body>

</html>