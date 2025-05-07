<style>
    <?php include 'styles/style.css'; ?>
</style>

<?php
    session_start();

    require 'database/db.php';
    require 'models/UserModel.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = trim($_POST['username']);
        $password = $_POST['password'];

        $userModel = new UserModel($db);
        if ($userModel->getUserByUsername($username)) {
            echo "Username already exists.";
        } else if (empty($username) || empty($password)) {
            echo "Please enter a username and password.";
        } else {
            $hashedPass = password_hash($password, PASSWORD_DEFAULT);

            if ($userModel->createNewUser($username, $hashedPass)) {
                header("Location: login.php");
                exit;
            } else {
                echo "Username already exist.";
            }
        }
    }

    include 'views/auth/RegisterView.php';
?>
