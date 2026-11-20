<?php
session_start();
$_SESSION = [];
session_destroy();

header("Location: ../vista/index.php");
exit;