<style>
    <?php include 'styles/style.css'; ?>
</style>

<?php
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }
    require 'controllers/TootController.php';
    $controller = new TootController();
    $controller->edit();
?>
