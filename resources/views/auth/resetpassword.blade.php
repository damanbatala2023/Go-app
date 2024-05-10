<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="{{asset('cssfile/forgetpassword.css')}}">
</head>
<body>
<div class="container">
   <h2>Reset Password</h2>
   <hr>
   @if($errors->any())
    @foreach($errors->all() as $error)
      <p style="color:red;">{{$error}}</p>
    @endforeach
  @endif

    <form action="{{route('reset')}}" method="POST">
      @csrf
    <div class="form-group">
        <p>Please, enter a new password.</p>
    </div>
      <div class="form-group">
        
        <input type="hidden" name="id" value="{{$user[0]['id']}}">
        <label for="password">New Password:</label>
        <input type="password" name="password" placeholder="Password" required>
      <br>
        <input type="password" name="password_confirmation" placeholder="Repeat Password" required>
      </div>
      <div class="form-group">
        <button type="submit">Change Password</button>
      </div>
    </form>
  </div>
 
</body>
</html>
