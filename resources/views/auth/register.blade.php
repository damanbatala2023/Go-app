<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="{{asset('cssfile/registration.css')}}">
    
</head>
<body>
<div class="container">
    <h2>Registration</h2>
    <hr>
    <form action="{{route('register')}}" method="POST">
      @if(Session::has('Success'))
      <div class="alert alert-success">{{Session::get('Success')}}</div>
      @endif
      @if(Session::has('Failed'))
      <div class="alert alert-danger">{{Session::get('Failed')}}</div>
      @endif 
      @csrf
      <div class="form-group">
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-group">
        <button type="submit">Register</button>
      </div>
    </form>
  </div>
</body>
</html>
