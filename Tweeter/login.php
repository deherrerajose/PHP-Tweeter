<style>
    <?php include 'styles/style.css'; ?>
</style>

<?php
    session_start();

    require 'database/db.php';
    require 'controllers/AuthController.php';

    $auth = new AuthController($db);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = trim($_POST['username']);
        $password = $_POST['password'];

        if (empty($username) || empty($password)) {
            echo "Please enter a username and password.";
        }

        if ($auth->login($username, $password)) {
            header("Location: index.php");
            exit;
            
        } else {
            $error = "Incorrect login. No toot for you!";
        }
    }

    include 'views/auth/LoginView.php';
?>
