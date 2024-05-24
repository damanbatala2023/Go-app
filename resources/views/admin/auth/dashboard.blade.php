<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{asset('cssfile/dashboard.css')}}">
</head>
<body>
    <nav class="navbar">
        <div class="navbar-brand">Admin Dashboard</div>
        <div class="navbar-toggle" id="navbar-toggle">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <ul class="navbar-menu">
          
            <!-- Add more navbar links if needed -->
            <li><a href="{{route('crud.record')}}">Users record</a></li>
            <li><form action="{{ route('admin.logout') }}" method="POST">
    @csrf
    <button type="submit" id="logoutBtn" style="background: none; border: none; padding: 0; font-family: inherit; font-size: inherit; cursor: pointer; color: inherit;">Logout</button>
</form>
</li>
        </ul>
    </nav>

    <div class="container">
       
        <main class="main-content">
            <!-- Add your dashboard content here -->
            <h2>Welcome to the Admin Dashboard</h2>
        </main>
    </div>

    <script src="{{asset('jsfile/dashboard.js')}}"></script>
</body>
</html>