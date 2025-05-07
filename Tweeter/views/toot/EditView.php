<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body id="loginBody">
    <h1>Edit Toot</h1>
    <form method="POST" action="update.php">
        <input type="hidden" name="id" value="<?= htmlspecialchars($toot['id']) ?>">
        <textarea name="content" required><?= htmlspecialchars($toot['content']) ?></textarea><br>
        <button type="submit">Update</button>
    </form>
    <a href="index.php">Cancel</a>
</body>
</html>
