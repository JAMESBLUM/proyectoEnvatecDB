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
                    <a href="perifericos.php" class="here">Perifericos</a>
                    <a href="usuarios.php">Usuarios</a>
                    <a href="envatec.php">Equipos</a>
                    <a href="plantas.php">Plantas</a>
                    <a href="index.php">Salir</a>
                </nav>
            </div>
        </div>
    </header>

    <section class="perifericos">
        <h2 class="centrar-texto font-Naranja">Periféricos</h2>
        <div class="perifericos-contenido contenedor">
            <div class="agregar-perifericos">
                <fieldset>
                    <legend class="legend">Agregar Periférico</legend>
                    <form action="build/php/agregarPeriferico.php" method="POST" class="formulario-agregar-periferico">
                        <div class="campo">
                            <label for="id-periferico">Id del Periférico:</label>
                            <input type="text" id="id-periferico" placeholder="Ingresa el id del periferico" name="Id-periferico-agregar">
                        </div>
                        <div class="campo">
                            <label for="nombre-periferico">Nombre del periferico:</label>
                            <input type="text" id="nombre-periferico" placeholder="Ingresa el nombre del periferico" name="nombre-periferico-agregar">
                        </div>
                        <div class="campo">
                            <label for="descripcion">Descripción del periférico:</label>
                            <textarea id="descripcion" placeholder="Describe el periferico"  name="descripcion-periferico-agregar"></textarea>
                        </div>
                        <input type="submit" value="Agregar Periférico" class="btn-principal">
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
                    <td><th>Periféricos Disponibles</th></td>
                </thead>
            <tbody>
                <tr class="titulos-column">
                    <td class="centrar-texto">Id Periféricos</td>
                    <td class="centrar-texto">Nombre Periféricos</td>
                    <td class="centrar-texto">Descripción</td>
                </tr>
                <?php
                    include 'build/php/conexion.php';
                    $query = "SELECT * FROM perifericos";
                    $ejecutar = mysqli_query($conexion, $query);
                    while($mostrar = mysqli_fetch_array($ejecutar)){
                  ?>
                 <tr>
                      <td><?php echo $mostrar['Id_perifericos'] ?></td>
                      <td><?php echo $mostrar['nombre_perifericos'] ?></td>
                      <td><?php echo $mostrar['descripcion'] ?></td>
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
            <legend class="legend">Eliminar Periferico</legend>
        <form action="build/php/eliminarPeriferico.php" class="eliminar-periferico-form" method="POST">
            <div class="campo">
                <label for="eliminar">Ingresa el Id del Periférico:</label>
                <input type="text" id="eliminar" placeholder="Ingresa el Id" name="eliminar-periferico">
            </div>
            <input type="submit" class="btn-principal" value="Eliminar Periférico">
        </form>
        </fieldset>

        <div class="actualizar-periferico">
        <fieldset>
            <legend class="legend">Actualizar Periférico</legend>
        <form action="build/php/actualizarPerifericos.php" class="actualizar-periferico-form" method="POST">
            <div class="campo">
                <label for="actualizar">Ingresa el Id del Periférico:</label>
                <input type="text" id="actualizar" placeholder="Ingresa el Id" name="actualizar-id">
            </div>
            <div class="campo">
                <label for="actualizar-nombre">Actualizar nombre del Periférico:</label>
                <input type="text" id="actualizar-nombre" placeholder="Ingresa el Id" name="Actualizar-nombre">
            </div>
            <div class="campo">
                <label for="actualizar-descrip">Actualizar descripción del Periférico:</label>
                <textarea  id="actualizar-descrip" placeholder="Ingresa la nueva descripción" name="actualizar-descrip"></textarea>
            </div>
            <input type="submit" class="btn-principal" value="Actualizar Periférico">
        </form>
        </fieldset>
        </div>
    </section>
</body>

</html>