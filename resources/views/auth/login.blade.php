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
    <form action="{{route('login')}}" method="POST">
      @csrf
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-group">
      <a href="">Forget Password?</a>
      </div>
     
      <div class="form-group">
        <button type="submit">Login</button>
      </div>
      <p>Are you new here?<a href="register">Click to Register!</p>
    </form>
  </div>
</body>
</html>