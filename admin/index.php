<?php
require_once '../config/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $display_name = $_POST['display_name'];

    $stmt = $pdo->prepare("INSERT INTO judges (username, display_name) VALUES (:username, :display_name)");
    $stmt->execute(['username' => $username, 'display_name' => $display_name]);
    echo "<p>Judge added successfully!</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - Judge Management</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <h1>Admin Panel - Add Judge</h1>
    <form method="POST">
        <label>Username: <input type="text" name="username" required></label><br>
        <label>Display Name: <input type="text" name="display_name" required></label><br>
        <button type="submit">Add Judge</button>
    </form>

    <h2>Existing Judges</h2>
    <?php
    $judges = $pdo->query("SELECT * FROM judges")->fetchAll();
    echo "<ul>";
    foreach ($judges as $judge) {
        echo "<li>{$judge['display_name']} (Username: {$judge['username']})</li>";
    }
    echo "</ul>";
    ?>
</body>
</html>