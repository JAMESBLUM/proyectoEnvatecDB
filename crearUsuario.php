<!DOCTYPE html>
<html lang="en" class="backgroundIndex-img">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario | Envatec</title>
    <link rel="stylesheet" href="build/css/app.css">
</head>

<body class="sinScroll">
    <main class="loginIndex contenedor">
        <a href="index.php">
            <picture>
                <source srcset="build/img/envatecLogo.webp" type="image/webp">
                <img src="build/img/envatecLogo.png" alt="envatec Logotipo">
            </picture>
        </a>
        <h4 class="font-Verde">Crear Usuario</h4>
        <form action="build/php/registrar_usuario.php" method="POST" class="loginIdex-formulario ">
            <div class="campo">
                <label for="usuario">Nombre de Usuario</label>
                <input type="text" id="usuario" placeholder="Nombre de usuario" name="nombre-usuario">
            </div>
            <div class="campo">
                <label for="password">Contraseña</label>
                <input type="password" id="password" placeholder="Ingresa la contraseña" name="password-usuario">
            </div>
            <input type="submit" value="Crear Usuario" class="btn-ingresar" name="crearUsuario">
            <a href="index.php" class="crearUsuario-enlace">Iniciar sesion</a>
        </form>
    </main>
   
</body>
</html>