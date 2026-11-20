<!-- menu_lateral.php -->
<aside class="sidebar">
    <h3>Menú Principal</h3>
    <ul>
        <li><a href="dashboard_profesor.php">Inicio</a></li>

        <!-- Si el usuario logueado es profesor -->
        <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'profesor'): ?>
            <li><a href="nueva_incidencia.php">Crear Incidencia</a></li>
            <li><a href="mis_incidencias.php">mis incidencias</a></li>
        <?php endif; ?>

        <!-- Si el usuario logueado es técnico -->
        <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'tecnico'): ?>
            <li><a href="dashboard_tecnico.php">Gestión Global</a></li>
            <li><a href="perfil.php">incidencias resueltas</a></li>
            <li><a href="perfil.php">incidencias en proceso</a></li>
        <?php endif; ?>

        <li><a href="../proceso/proceso_logout.php">Cerrar Sesión</a></li>
    </ul>
</aside>