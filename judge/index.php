<?php
require_once '../config/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judge_id = $_POST['judge_id'];
    $user_id = $_POST['user_id'];
    $points = $_POST['points'];

    if ($points >= 1 && $points <= 100) {
        $stmt = $pdo->prepare("INSERT INTO scores (judge_id, user_id, points) VALUES (:judge_id, :user_id, :points)");
        $stmt->execute(['judge_id' => $judge_id, 'user_id' => $user_id, 'points' => $points]);
        echo "<p>Score added successfully!</p>";
    } else {
        echo "<p>Points must be between 1 and 100!</p>";
    }
}

$judges = $pdo->query("SELECT * FROM judges")->fetchAll();
$users = $pdo->query("SELECT * FROM users")->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Judge Portal</title>
    <link rel="stylesheet" href="judge.css">
</head>
<body>
    <h1>Judge Portal</h1>
    <form method="POST">
        <label>Judge: 
            <select name="judge_id" required>
                <?php foreach ($judges as $judge) echo "<option value='{$judge['id']}'>{$judge['display_name']}</option>"; ?>
            </select>
        </label><br>
        <label>User: 
            <select name="user_id" required>
                <?php foreach ($users as $user) echo "<option value='{$user['id']}'>{$user['display_name']}</option>"; ?>
            </select>
        </label><br>
        <label>Points: <input type="number" name="points" min="1" max="100" required></label><br>
        <button type="submit">Submit Score</button>
    </form>
</body>
</html>