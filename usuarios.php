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
                    <a href="usuarios.php" class="here">Usuarios</a>
                    <a href="envatec.php">Equipos</a>
                    <a href="plantas.php">Plantas</a>
                    <a href="index.php">Salir</a>
                </nav>
            </div>
        </div>
    </header>
    <section class="equiposComputo">
        <div class="equiposComputo-contenido contenedor">
            <h2 class="centrar-texto font-Naranja">Usuarios</h2>
            <div class="agregar-equipoComputo">
                <fieldset>
                    <legend class="legend">Agregar Usuarios</legend>
                    <form action="build/php/agregarUsuarios.php" method="POST" class="formulario-agregar-equipoComputo">
                        <div class="campo">
                            <label for="agregar-id">Id del Usuario:</label>
                            <input type="text" id="agregar-id" placeholder="Ingresa el Id" name="id">
                        </div>
                        <div class="campo">
                            <label for="agregar-nombre">Nombre:</label>
                            <input type="text" id="agregar-nombre"  placeholder="Ingresa el Nombre del Usuario" name="nombre">
                        </div>
                        <div class="campo">
                            <label for="agregar-apellidoP">Apellido Paterno:</label>
                            <input type="text" id="agregar-apellidoP"  placeholder="Ingresa el Apellido Paterno" name="apellidoPaterno">
                        </div>
                        <div class="campo">
                            <label for="agregar-apellidoM">Apellido Materno:</label>
                           <input type="text" id="agregar-apellidoM"  placeholder="Ingresa el Apellido Materno" name="apellidoMaterno">
                        </div>
                        <div class="campo">
                            <label>Id del Departamento</label>
                            <select name="departamento">
                            <option disabled selected>----- Seleccione una Opción -----</option>
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
                        <div class="campo">
                            <label>Genero:</label>
                            <select name="sexo">
                                <option disabled selected>----- Seleccione una Opción -----</option>
                                <option >Hombre</option>
                                <option >Mujer</option>
                            </select>
                        </div>
                        <div class="campo">
                            <label>Ingresa el Id del Equipo</label>
                            <select class="select" name="equipo">
                            <option disabled selected>----- Seleccione una Opción -----</option>
                            <?php
                                include 'build/php/conexion.php';
                                $getEquipo1 = 'SELECT * FROM equipos';
                                $getEquipo2 = mysqli_query($conexion,$getEquipo1);
                                while($row = mysqli_fetch_array($getEquipo2)){
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
                        <div class="campo">
                            <label for="agregar-correo">Correo:</label>
                           <input type="text" id="agregar-correo"  placeholder="Ingresa el Correo" name="correo">
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
                    <td><th>Usuarios Disponibles</th></td>
                </thead>
            <tbody>
                <tr class="titulos-column">
                    <td class="centrar-texto">Id Usuario</td>
                    <td class="centrar-texto">Nombre</td>
                    <td class="centrar-texto">Apellido Paterno</td>
                    <td class="centrar-texto">Apellido Materno</td>
                    <td class="centrar-texto">Id Depto</td>
                    <td class="centrar-texto">Genero</td>
                    <td class="centrar-texto">Id del equipo</td>
                    <td class="centrar-texto">Correo</td>
                </tr>
                <?php
                    include 'build/php/conexion.php';
                    $query = "SELECT * FROM usuarios";
                    $ejecutar = mysqli_query($conexion, $query);
                    while($mostrar = mysqli_fetch_array($ejecutar)){
                  ?>
                 <tr>
                      <td><?php echo $mostrar['id_usuarios'] ?></td>
                      <td><?php echo $mostrar['nombre'] ?></td>
                      <td><?php echo $mostrar['apellido_paterno'] ?></td>
                      <td><?php echo $mostrar['apellido_materno'] ?></td>
                      <td><?php echo $mostrar['Id_depto'] ?></td>
                      <td><?php echo $mostrar['sexo'] ?></td>
                      <td><?php echo $mostrar['Id_equipo'] ?></td>
                      <td><?php echo $mostrar['correo'] ?></td>
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
            <legend class="legend">Eliminar Usuario</legend>
        <form action="build/php/eliminarUsuarios.php" class="eliminar-periferico-form" method="POST">
            <div class="campo">
                <label for="eliminar-usuario">Ingresa el Id del Usuario:</label>
                <input type="text" id="eliminar-usuario" placeholder="Ingresa el Id" name="id">
                <label for="eliminar-nombreUsuario">Nombre del Usuario:</label>
                <input type="text" id="eliminar-nombreUsuario" placeholder="Ingresa el nombre" name="nombre">
            </div>
            <input type="submit" class="btn-principal" value="Eliminar Equipo">
        </form>
        </fieldset>

        
        <div class="actualizar-periferico">
        <fieldset>
            <legend class="legend">Actualizar Usuario</legend>
        <form action="build/php/actualizarUsuarios.php" class="actualizar-periferico-form" method="POST">
            <div class="campo">
                <label for="actualizar-id">Id del Usuario</label>
                <input id="actualizar-id" type="text" placeholder="Ingresa el Id" name="id">
            </div>
            <div class="campo">
                <label for="actualizar-nombre">Nombre del Usuario</label>
                <input id="actualizar-nombre" type="text" placeholder="Ingresa el nombre" name="nombre">
            </div>
            <div class="campo">
                <label for="actualizar-apellidoP">Apellido Paterno</label>
                <input id="actualizar-apellidoP" type="text" placeholder="Ingresa el Apellido Paterno" name="apellidoPaterno">
            </div>
            <div class="campo">
                <label for="actualizar-apellidoM">Apellido Materno</label>
                <input id="actualizar-apellidoM" type="text" placeholder="Ingresa el Apellido Materno" name="apellidoMaterno">
            </div>
            <div class="campo">
                <label>Id del Departamento</label>
                <select name="departamento">
                            <option disabled selected>----- Seleccione una Opción -----</option>
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
            <div class="campo">
                <label for="">Genero</label>
                <select name="sexo">
                    <option disabled selected>----- Seleccione una Opción -----</option>
                    <option >Hombre</option>
                    <option >Mujer</option>
                </select>
            </div>
            <div class="campo">
                <label for="">Id del Equipo</label>
                <select class="select" name="equipo">
                            <option disabled selected>----- Seleccione una Opción -----</option>
                            <?php
                                include 'build/php/conexion.php';
                                $getEquipo1 = 'SELECT * FROM equipos';
                                $getEquipo2 = mysqli_query($conexion,$getEquipo1);
                                while($row = mysqli_fetch_array($getEquipo2)){
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
            <div class="campo">
                <label for="actualizar-correo">Correo:</label>
                <input type="text" placeholder="Ingresa el correo" id="actualizar-correo" name="correo">
            </div>
            <input type="submit" class="btn-principal" value="Actualizar Depto">
        </form>
        </fieldset>
        </div>
    </section>
    <!--======================= PERSONAL DE SISTEMAS ================-->
    <section class="equiposComputo">
        <div class="equiposComputo-contenido contenedor">
            <h2 class="centrar-texto font-Naranja">Personal de Sistemas</h2>
            <div class="agregar-equipoComputo">
                <fieldset>
                    <legend class="legend">Agregar Personal de Sistemas</legend>
                    <form action="build/php/agregarPersonal.php" method="POST" class="formulario-agregar-equipoComputo">
                        <div class="campo">
                            <label for="agregar-idPersonal">Id del Personal:</label>
                            <input type="text" id="agregar-idPersonal" placeholder="Ingresa el Id" name="id">
                        </div>
                        <div class="campo">
                            <label for="agregar-nombrePersonal">Ingresa el Nombre:</label>
                            <input type="text" id="agregar-nombrePersonal" placeholder="Ingresa el Nombre" name="nombre">
                        </div>
                        <div class="campo">
                            <label for="agregar-apellidoPPersonal">Apellido Paterno:</label>
                            <input type="text" id="agregar-apellidoPPersonal" placeholder="Ingresa el Apellido Paterno" name="apellidoPaterno">
                        </div>
                        <div class="campo">
                            <label for="agregar-apellidoMPersonal">Apellido Materno:</label>
                            <input type="text" id="agregar-apellidoMPersonal" placeholder="Ingresa Apellido Materno" name="apellidoMaterno">
                        </div>
                        <div class="campo">
                            <label for="">Ingresa Id del Departamento:</label>
                            <select class="select" name="departamento">
                                <option disabled selected>----- Seleccione una Opción -----</option>
                            <?php
                                include 'build/php/conexion.php';
                                $getDepto1 = 'SELECT * FROM departamento';
                                $getDepto2 = mysqli_query($conexion,$getDepto1);
                                while($row = mysqli_fetch_array($getDepto2)){
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

    <section class="perifericos">
        <div class="perifericos-tabla-contenido contenedor">
            <table class="tabla-MostrarDatos">
                <thead>
                    <td><th>Personal Sistemas Disponibles</th></td>
                </thead>
            <tbody>
                <tr class="titulos-column">
                    <td class="centrar-texto">Id Personal</td>
                    <td class="centrar-texto">Nombre</td>
                    <td class="centrar-texto">Apellido Paterno</td>
                    <td class="centrar-texto">Apellido Materno</td>
                    <td class="centrar-texto">Id Depto</td>
                </tr>
                <?php
                    include 'build/php/conexion.php';
                    $query = "SELECT * FROM usuarios";
                    $ejecutar = mysqli_query($conexion, $query);
                    while($mostrar = mysqli_fetch_array($ejecutar)){
                  ?>
                 <tr>
                      <td><?php echo $mostrar['Id_personal'] ?></td>
                      <td><?php echo $mostrar['nombre'] ?></td>
                      <td><?php echo $mostrar['apellido_paterno'] ?></td>
                      <td><?php echo $mostrar['apellido_materno'] ?></td>
                      <td><?php echo $mostrar['Id_depto'] ?></td>
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
            <legend class="legend">Eliminar Personal</legend>
        <form action="build/php/eliminarPersonal.php" class="eliminar-periferico-form" method="POST">
            <div class="campo">
                <label for="eliminar-usuario">Ingresa el Id del Usuario:</label>
                <input type="text" id="eliminar-usuario" placeholder="Ingresa el Id" name="id">
                <label for="eliminar-nombreUsuario">Nombre del Usuario:</label>
                <input type="text" id="eliminar-nombreUsuario" placeholder="Ingresa el nombre" name="nombre">
            </div>
            <input type="submit" class="btn-principal" value="Eliminar Equipo">
        </form>
        </fieldset>

        
        <div class="actualizar-periferico">
        <fieldset>
            <legend class="legend">Actualizar Personal</legend>
        <form action="build/php/actualizarPersonal.php" class="actualizar-periferico-form" method="POST">
            <div class="campo">
                <label for="actualizar-id">Id del Personal:</label>
                <input id="actualizar-id" type="text" placeholder="Ingresa el Id" name="id">
            </div>
            <div class="campo">
                <label for="actualizar-nombre">Nombre del Personal:</label>
                <input id="actualizar-nombre" type="text" placeholder="Ingresa el nombre" name="nombre">
            </div>
            <div class="campo">
                <label for="actualizar-apellidoP">Apellido Paterno:</label>
                <input id="actualizar-apellidoP" type="text" placeholder="Ingresa el Apellido Paterno" name="apellidoPaterno">
            </div>
            <div class="campo">
                <label for="actualizar-apellidoM">Apellido Materno:</label>
                <input id="actualizar-apellidoM" type="text" placeholder="Ingresa el Apellido Materno" name="apellidoMaterno">
            </div>
            <div class="campo">
                <label>Id del Departamento:</label>
                <select name="departamento">
                            <option disabled selected>----- Seleccione una Opción -----</option>
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
            <input type="submit" class="btn-principal" value="Actualizar Depto">
        </form>
        </fieldset>
        </div>
    </section>
</body>

</html>