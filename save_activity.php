<?php
require_once 'connection.php';

$query = "SELECT id, title, description, posted_by FROM activities ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Activities</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="sidebar">
        <p><strong>Student:</strong><br>Mercy Too</p>
        <ul>
            <li>🏠 Home</li>
            <li>📚 Units Registered</li>
            <li>🔔 Notifications</li>
            <li class="active">📅 Activities</li>
            <li>💬 Consultations</li>
        </ul>
    </div>

    <div class="main">
        <h1>ACTIVITIES</h1>

        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <div class="activity-card">
                <h2><?= htmlspecialchars($row['title']) ?></h2>
                <p><?= htmlspecialchars($row['description']) ?></p>
                <small>Posted by: <?= htmlspecialchars($row['posted_by']) ?></small>
            </div>
        <?php endwhile; ?>

        <h2>Add New Activity</h2>
        <form action="save_activity.php" method="POST" class="activity-form">
            <input type="text" name="title" placeholder="Activity Title" required>
            <textarea name="description" placeholder="Description" required></textarea>
            <input type="text" name="posted_by" placeholder="Your Name" required>
            <button type="submit">Add Activity</button>
        </form>
    </div>
</div>
</body>
</html>
