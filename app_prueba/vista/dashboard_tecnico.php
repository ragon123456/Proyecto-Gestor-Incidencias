<?php
session_start();

// comprobamos que haya sesion activa y que el rol sea el de tecnico
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'tecnico') {
    header("location: ../vista/index.php");
    exit;
}
require_once("../proceso/conexion_bd.php");

$sql = "SELECT id, asunto, prioridad, estado, fecha_creacion FROM incidencias";
$stmt = $pdo->query($sql);
$incidencias = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body class="areas">
    <header class="header"><?php include("../reutilizable/header.php"); ?></header>
    <aside class="aside"><?php include("../reutilizable/menu_lateral.php"); ?></aside>


    <main class="main">
        <h2>dashboard</h2>
        <div class="contenedor-tecnico">
            <section class="tarjetas">
                <div class="tarjeta">
                    <h3>tikets abiertos</h3>
                    <p>nº de tiket abiertos</p>
                </div>
                <div class="tarjeta">
                    <h3>en progreso</h3>
                    <p>nº de tiket en progreso</p>
                </div>
                <div class="tarjeta">
                    <h3>resueltos</h3>
                    <p>nº de tiket resueltos</p>
                </div>
                <div class="tarjeta">
                    <h3>tikets criticos</h3>
                    <p>nº de tiket criticos</p>
                </div>
            </section>
            <hr>
            <section>
                <div class="ticket-recientes">
                    <h2>mis tickets recientes</h2>
                    <form method="GET" action="" class="caja-opcion">
                        <select name="ordenar" onchange="this.form.submit()">
                            <option value="id">por ID</option>
                            <option value="asunto">POR ASUNTO</option>
                            <option value="prioridad">POR PRIORIDAD</option>
                            <option value="fecha">POR FECHA</option>
                        </select>
                    </form>
                </div>
                <div class="bloque-tabla">
                    <table class="tabla">
                        <thead>
                            <tr>
                                <th>id tickets</th>
                                <th>asunto</th>
                                <th>prioridad</th>
                                <th>estado</th>
                                <th>fecha de creacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($incidencias as $incidencia): ?>
                            <tr>
                                <td><?= htmlspecialchars($incidencia ['id']) ?></td>
                                <td><?= htmlspecialchars($incidencia ['asunto']) ?></td>
                                <td><?= htmlspecialchars($incidencia ['prioridad']) ?></td>
                                <td><?= htmlspecialchars($incidencia ['estado']) ?></td>
                                <td><?= htmlspecialchars($incidencia ['fecha_creacion']) ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </section>

        </div>


    </main>




    <footer class="footer"><?php include("../reutilizable/footer.php"); ?></footer>
</body>

</html>