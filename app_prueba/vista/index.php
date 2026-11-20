<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body class="formulario">
    <div class="contenedor-formulario">
    <h1>Bienvenida a mi página de Login</h1>

    <!-- El formulario apunta al archivo PHP independiente -->
    <form method="POST" action="../proceso/login_proceso.php">
        
        <label for="email">Usuario:</label>
        <input type="text" name="email" id="email" required>
        
        <br><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>
        
        <br><br>

        <button type="submit">Entrar</button>
    </form>
    </div>
</body>
</html>