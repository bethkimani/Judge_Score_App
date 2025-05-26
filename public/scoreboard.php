<?php
require_once '../config/db_connect.php';

$scores = $pdo->query("
    SELECT u.id, u.display_name, COALESCE(SUM(s.points), 0) as total_points
    FROM users u
    LEFT JOIN scores s ON u.id = s.user_id
    GROUP BY u.id, u.display_name
    ORDER BY total_points DESC
")->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Public Scoreboard</title>
    <link rel="stylesheet" href="scoreboard.css">
    <script src="../js/scoreboard.js"></script>
</head>
<body>
    <h1>Public Scoreboard</h1>
    <table>
        <tr>
            <th>User</th>
            <th>Total Points</th>
        </tr>
        <?php foreach ($scores as $score) {
            $highlight = $score['total_points'] > 90 ? 'highlight' : '';
            echo "<tr class='$highlight'><td>{$score['display_name']}</td><td>{$score['total_points']}</td></tr>";
        } ?>
    </table>
</body>
</html>