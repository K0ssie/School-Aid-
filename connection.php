<?php
session_start();
$conn = new mysqli("localhost", "root", "", "user_registration");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Simulated logged-in user (replace with session variable if needed)
// $current_user_id = $_SESSION['User_ID']; // If using session login
$current_user_id = 2;

// Fetch unread notifications
$sql = "
    SELECT n.id, u.Username AS sender, n.message, n.created_at 
    FROM notifications n
    JOIN user u ON n.sender_id = u.User_ID
    WHERE n.receiver_id = ? AND n.is_read = 0
    ORDER BY n.created_at DESC
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $current_user_id);
$stmt->execute();
$result = $stmt->get_result();

$notifications = [];
while ($row = $result->fetch_assoc()) {
    $notifications[] = $row;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Notifications</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Segoe UI", sans-serif;
            background-color: #f0f0f5;
            display: flex;
        }

        /* Sidebar */
        .sidebar {
            width: 220px;
            background-color: #1a1a1a;
            color: white;
            height: 100vh;
            display: flex;
            flex-direction: column;
            padding-top: 20px;
        }

        .sidebar h2 {
            text-align: center;
            font-size: 20px;
            margin-bottom: 30px;
        }

        .sidebar .logo {
            text-align: center;
            margin-bottom: 15px;
        }

        .sidebar .nav-link {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: white;
            text-decoration: none;
            font-size: 15px;
            border-left: 4px solid transparent;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: #333;
            border-left: 4px solid #00ccff;
        }

        .sidebar .nav-link img {
            width: 20px;
            margin-right: 10px;
        }

        /* Main content */
        .main {
            flex-grow: 1;
            padding: 40px;
            background-color: #f9f9fc;
        }

        .container {
            background-color: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            max-width: 600px;
        }

        .student-name {
            font-size: 16px;
            margin-bottom: 15px;
        }

        .student-name strong {
            font-weight: bold;
        }

        .notifications-box h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 25px;
        }

        .notification {
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 16px;
            color: #000;
        }

        .notification.red {
            background: linear-gradient(to right, #ff6e7f, #ffb6b9);
        }

        .notification.pink {
            background: linear-gradient(to right, #ff66cc, #ffcce6);
        }

        .notification.purple {
            background: linear-gradient(to right, #d3a4ff, #e6ccff);
        }

        .notification p {
            margin: 0;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            🎓
        </div>
        <h2>SCHOOL</h2>
        <a href="#" class="nav-link"><img src="https://img.icons8.com/ios-filled/20/ffffff/home.png"/> Home</a>
        <a href="#" class="nav-link"><img src="https://img.icons8.com/ios-filled/20/ffffff/book.png"/> Units Registered</a>
        <a href="#" class="nav-link active"><img src="https://img.icons8.com/ios-filled/20/ffffff/bell.png"/> Notifications</a>
        <a href="#" class="nav-link"><img src="https://img.icons8.com/ios-filled/20/ffffff/combo-chart.png"/> Activities</a>
        <a href="#" class="nav-link"><img src="https://img.icons8.com/ios-filled/20/ffffff/conference-call.png"/> Consultation</a>
    </div>

    <!-- Main Content -->
    <div class="main">
        <div class="container">
            <div class="student-name">
                Student<br><strong>Mercy Too</strong>
            </div>

            <div class="notifications-box">
                <h2>NOTIFICATIONS</h2>

                <div class="notification red">
                    <p>.A new internship opportunity has been posted</p>
                </div>

                <div class="notification pink">
                    <p>.New&nbsp;&nbsp;activities have been added</p>
                </div>

                <div class="notification purple">
                    <p>.New reference materials uploaded</p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
