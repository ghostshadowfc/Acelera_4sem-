<?php
session_start();

if (!isset($_SESSION['email'])) {
    // O usuário não está autenticado, redirecione para a tela de login
    header('Location: login.php');
    exit();
}

?>
