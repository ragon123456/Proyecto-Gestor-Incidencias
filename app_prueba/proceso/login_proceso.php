<?php
session_start();
require_once("conexion_bd.php");

if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    header("Location: ../vista/index.php");
    exit;
}

$email = trim($_POST["email"] ?? "");
$password = $_POST["password"] ?? "";


if ($email === "" || $password === ""){
    header("Location: ../vista/index.php?error=campos_vacios");
    exit;
}

$sql = "SELECT  id, nombre, email, password, rol FROM usuarios WHERE email = :email LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute([":email" => $email]);
$usuario = $stmt->fetch();

if ($usuario && password_verify($password, $usuario["password"])){
    $_SESSION["id_usuario"] = $usuario["id"];
    $_SESSION["nombre"]     = $usuario["nombre"];
    $_SESSION["email"]      = $usuario["email"];
    $_SESSION["rol"]        = $usuario["rol"];

    if ($usuario["rol"] === "tecnico") {
        header("Location: ../vista/dashboard_tecnico.php");
    }else{
        header("Location: ../vista/dashboard_profesor.php");
    }
    exit;
}else {
    header("Location: ../vista/index.php?error=credenciales");
    exit;
}
