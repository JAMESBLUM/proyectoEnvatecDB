<!DOCTYPE html>
<html lang="en" class="backgroundIndex-img">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envatec</title>
    <link rel="stylesheet" href="build/css/app.css">
</head>

<body class="sinScroll">
    <main class="loginIndex contenedor">
        <picture>
            <source srcset="build/img/envatecLogo.webp" type="image/webp">
            <img src="build/img/envatecLogo.png" alt="envatec Logotipo">
        </picture>

        <form action="build/php/login.php" method="POST" class="loginIdex-formulario">
            <div class="campo-login">
                <label for="usuario">Usuario</label>
                <input type="text" id="usuario" placeholder="Nombre de usuario" name="usuario">
            </div>
            <div class="campo-login">
                <label for="password"> Contraseña</label>
                <input type="password" id="password" placeholder="Ingresa la contraseña" name="password">
            </div>
            <a href="crearUsuario.php" class="crearUsuario-enlace">Crear usuario</a>
            <input type="submit" value="Ingresar" class="btn-ingresar" name="submit">
        </form>
    </main>
    
</body>
</html>