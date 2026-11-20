<?php
$host = "localhost";
$dbname = "db_prueba"; // Cambia esto por el nombre de tu BD en phpMyAdmin
$usuario = "root";             // Por defecto en Laragon es root
$password = "";                // Por defecto en Laragon va en blanco

try {
    // Aquí se establece la conexión usando el driver PDO
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4", 
        $usuario, $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );

    
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>