<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .sidebar {
            width: 200px;
            height: 100vh;
            background-color: #f8f9fa;
            position: fixed;
            top: 0;
            left: 0;
            padding: 20px;
            box-sizing: border-box;
        }
        .main-content {
            margin-left: 220px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Dashboard</h2>
        <ul>
            <li>Home</li>
            <li>Profile</li>
            <li>Settings</li>
            <li><a href="/">Logout</a></li>
        </ul>
    </div>
    <div class="main-content">
        <h1>Welcome to the Admin Dashboard</h1>
        <p>This is the main content area.</p>
    </div>
</body>
</html>
