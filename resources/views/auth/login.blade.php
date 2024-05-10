<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="{{asset('cssfile/login.css')}}">
</head>
<body>
<div class="container">
    <h2>Login</h2>
    <hr>
    @if ($errors->any())
      @foreach($errors->all() as $error)
    <div class="alert alert-danger" style="color:red;">
        {{ $error }}
    </div>
    @endforeach
@endif

    <form action="{{route('login')}}" method="POST">
      @csrf
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" id="username" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-group">
      <a href="{{route('forget')}}">Forget Password?</a>
      </div>
     
      <div class="form-group">
        <button type="submit">Login</button>
      </div>
      <p>Are you new here?<a href="register">Click to Register!</p>
    </form>
  </div>
</body>
</html>