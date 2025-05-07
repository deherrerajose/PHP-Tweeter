<?php
    try {
        $dsn = 'mysql:host=localhost;dbname=cs_350';
//        $username = 'root';
//        $password = '';
         $username = 'student';
         $password = 'CS350';
        $db = new PDO($dsn, $username, $password);

    } catch (PDOException $e) {

        $msg = $e->getMessage();
        echo "<p>ERROR: $msg</p>";
        
    }
?>