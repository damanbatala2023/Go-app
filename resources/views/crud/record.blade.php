<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
            <li><a href="#">Users record</a></li>
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
           
            <div class="card">
    <div class="card-header">
        <h4>Users Record</h4>
        @if(Session::has('Success'))
      <div class="alert alert-success">{{Session::get('Success')}}</div>
      @endif
      @if(Session::has('Failed'))
      <div class="alert alert-danger">{{Session::get('Failed')}}</div>
      @endif 
      @csrf
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->usertype }}</td>
                        <td>
                        <a href="{{ route('crud.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('crud.delete', $user->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>
        </main>
    </div>

    <script src="{{asset('jsfile/dashboard.js')}}"></script>
</body>
</html>