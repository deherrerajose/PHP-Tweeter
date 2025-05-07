<style>
    <?php include 'styles/style.css'; ?>
</style>

<?php
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }
    
    include 'views/toot/FeedView.php';
?>
