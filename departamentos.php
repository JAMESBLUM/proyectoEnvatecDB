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
                    <a href="departamentos.php" class="here">Departamentos</a>
                    <a href="mantenimiento.php">Mantenimiento</a>
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
        <h2 class="centrar-texto font-Naranja">Departamentos</h2>
        <div class="perifericos-contenido contenedor">
            <div class="agregar-perifericos">
                <fieldset>
                    <legend class="legend">Agregar Departamento</legend>
                    <form action="build/php/agregarDepartamento.php" method="POST" class="formulario-agregar-periferico">
                        <div class="campo">
                            <label for="id-departamento">Id del Departamento:</label>
                            <input type="text" id="id-departamento" placeholder="Ingresa el id del Departamento" name="agregar-IdDepto">
                        </div>
                        <div class="campo">
                            <label for="nombre-departamento">Nombre del Departamento:</label>
                            <input type="text" id="nombre-departamento" placeholder="Ingresa el nombre" name="agregar-nombreDepto">
                        </div>
                        <div class="campo">
                            <label for="Id-planta">Id de la planta:</label>
                            <input type="text" id="Id-planta" placeholder="Ingresa el Id de la planta"  name="agregar-IdPlanta">
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
                    <td class="centrar-texto">Id Departamento</td>
                    <td class="centrar-texto">Nombre Departamento</td>
                    <td class="centrar-texto">Id Planta</td>
                </tr>
                <?php
                    include 'build/php/conexion.php';
                    $query = "SELECT * FROM departamento";
                    $ejecutar = mysqli_query($conexion, $query);
                    while($mostrar = mysqli_fetch_array($ejecutar)){
                  ?>
                 <tr>
                      <td><?php echo $mostrar['Id_depto'] ?></td>
                      <td><?php echo $mostrar['nombre_depto'] ?></td>
                      <td><?php echo $mostrar['Id_planta'] ?></td>
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
            <legend class="legend">Eliminar Departamento</legend>
        <form action="build/php/eliminarDepto.php" class="eliminar-periferico-form" method="POST">
            <div class="campo">
                <label for="eliminar">Ingresa el Id del Departamento:</label>
                <input type="text" id="eliminar" placeholder="Ingresa el Id" name="eliminar-Depto">
                <label for="nom-eliminar">Nombre del Departamento:</label>
                <input type="text" id="nom-eliminar" placeholder="Ingresa el nombre" name="eliminar-nomDepto">
            </div>
            <input type="submit" class="btn-principal" value="Eliminar Depto">
        </form>
        </fieldset>
        
        <div class="actualizar-periferico">
        <fieldset>
            <legend class="legend">Actualizar Departamento</legend>
        <form action="build/php/actualizarDepto.php" class="actualizar-periferico-form" method="POST">
            <div class="campo">
                <label for="actualizar">Ingresa el Id del Departamento:</label>
                <input type="text" id="actualizar" placeholder="Ingresa el Id" name="actualizar-idDepto">
            </div>
            <div class="campo">
                <label for="actualizar-nombre">Actualizar nombre del Departamento:</label>
                <input type="text" id="actualizar-nombre" placeholder="Ingresa el nombre" name="Actualizar-nombreDepto">
            </div>
            <div class="campo">
                <label for="actualizar-ubic">Actualizar Id Planta:</label>
                <input type="text" id="actualizar-ubic" placeholder="Ingresa la nuevo Id" name="actualizar-idPlanta">
            </div>
            <input type="submit" class="btn-principal" value="Actualizar Depto">
        </form>
        </fieldset>
        </div>
    </section>
</body>

</html>