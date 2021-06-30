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
                    <a href="envatec.php">Equipos</a>
                    <a href="plantas.php" class="here">Plantas</a>
                    <a href="index.php">Salir</a>
                </nav>
            </div>
        </div>
    </header>

    <section class="perifericos">
        <h2 class="centrar-texto font-Naranja">Plantas</h2>
        <div class="perifericos-contenido contenedor">
            <div class="agregar-perifericos">
                <fieldset>
                    <legend class="legend">Agregar Planta</legend>
                    <form action="build/php/agregarPlanta.php" method="POST" class="formulario-agregar-periferico">
                        <div class="campo">
                            <label for="id-planta">Id del Planta:</label>
                            <input type="text" id="id-planta" placeholder="Ingresa el id de la Planta" name="agregar-IdPlanta">
                        </div>
                        <div class="campo">
                            <label for="nombre-planta">Nombre de la Planta:</label>
                            <input type="text" id="nombre-planta" placeholder="Ingresa el nombre de la Planta" name="agregar-nombrePlanta">
                        </div>
                        <div class="campo">
                            <label for="ubicacio-planta">Ubicación del Planta:</label>
                            <input type="text" id="ubicacio-planta" placeholder="Ingresa la ubicación"  name="agregar-ubicacionPlanta">
                        </div>
                        <input type="submit" value="Agregar Planta" class="btn-principal">
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
                    <td><th>Plantas Disponibles</th></td>
                </thead>
            <tbody>
                <tr class="titulos-column">
                    <td class="centrar-texto">Id Planta</td>
                    <td class="centrar-texto">Nombre Planta</td>
                    <td class="centrar-texto">Ubicación</td>
                </tr>
                <?php
                    include 'build/php/conexion.php';
                    $query = "SELECT * FROM plantas";
                    $ejecutar = mysqli_query($conexion, $query);
                    while($mostrar = mysqli_fetch_array($ejecutar)){
                  ?>
                 <tr>
                      <td><?php echo $mostrar['Id_planta'] ?></td>
                      <td><?php echo $mostrar['nombre_planta'] ?></td>
                      <td><?php echo $mostrar['ubicacion_planta'] ?></td>
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
            <legend class="legend">Eliminar Planta</legend>
        <form action="build/php/eliminarPlanta.php" class="eliminar-periferico-form" method="POST">
            <div class="campo">
                <label for="eliminar">Ingresa el Id de la Planta:</label>
                <input type="text" id="eliminar" placeholder="Ingresa el Id" name="eliminar-planta">
                <label for="nom-eliminar">Ingresa el Nombre de la Planta:</label>
                <input type="text" id="nom-eliminar" placeholder="Ingresa el nombre" name="eliminar-nomPlanta">
            </div>
            <input type="submit" class="btn-principal" value="Eliminar Planta">
        </form>
        </fieldset>
        
        <div class="actualizar-periferico">
        <fieldset>
            <legend class="legend">Actualizar Planta</legend>
        <form action="build/php/actualizarPlanta.php" class="actualizar-periferico-form" method="POST">
            <div class="campo">
                <label for="actualizar">Ingresa el Id de la planta:</label>
                <input type="text" id="actualizar" placeholder="Ingresa el Id" name="actualizar-idPlanta">
            </div>
            <div class="campo">
                <label for="actualizar-nombre">Actualizar nombre de la Planta:</label>
                <input type="text" id="actualizar-nombre" placeholder="Ingresa el nombre" name="Actualizar-nombrePlanta">
            </div>
            <div class="campo">
                <label for="actualizar-ubic">Actualizar Ubicación:</label>
                <input type="text" id="actualizar-ubic" placeholder="Ingresa la nueva Ubicación" name="actualizar-ubicacionPlanta">
            </div>
            <input type="submit" class="btn-principal" value="Actualizar Planta">
        </form>
        </fieldset>
        </div>
    </section>
</body>

</html>