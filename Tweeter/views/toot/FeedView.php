<?php
    require 'models/TootModel.php';

    $model = new TootModel();
    $toots = $model->getAllToots();

    echo "<h1>Welcome, " . htmlspecialchars($_SESSION['username']) . "</h1>";
    echo "<p><a href='logout.php'>Logout</a></p>";

    include 'CreateView.php';

    echo "<h2>Toots</h2>";
    foreach ($toots as $toot) {
//        echo "<p><strong>" . htmlspecialchars($toot['username']) . ":</strong> " . htmlspecialchars($toot['content']) . "</p>";

        $username = htmlspecialchars($toot['username']);
        $content = htmlspecialchars($toot['content']);

        echo "<div><strong><h3>" . $username . ":</h3></strong>";
        echo "<p>" . $content . "</p><p>" . $toot['date_created'] . "</p>";

        if ($toot['username'] === $_SESSION['username']) {
            echo "<p><a href='edit.php?id=" . $toot['id'] . "'>Edit</a> | ";
            echo "<a href='delete.php?id=" . $toot['id'] . "'>Delete</a></p>";
        }

        echo "</div><br><br>";
    }
?>
