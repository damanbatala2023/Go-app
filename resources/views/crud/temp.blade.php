<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('cssfile/dashboard.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar">
        <div class="navbar-brand"><a href="{{route('admin.dashboard')}}" style="background: none; text-decoration:none; color:white">Admin Dashboard</div>
        <div class="navbar-toggle" id="navbar-toggle">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <ul class="navbar-menu">

            <!-- Add more navbar links if needed -->
            <li><a href="{{route('crud.record')}}">Users record</a></li>
            <li><a href=" {{route('crud.role')}} ">Roles</a></li>
            <li>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" id="logoutBtn" style="background: none; border: none; padding: 0; font-family: inherit; font-size: inherit; cursor: pointer; color: inherit;">Logout</button>
                </form>
            </li>
        </ul>
    </nav>

    <div class="container">
        @yield('content')

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>