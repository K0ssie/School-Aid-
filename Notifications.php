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
