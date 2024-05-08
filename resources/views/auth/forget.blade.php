<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link rel="stylesheet" href="{{asset('cssfile/forgetpassword.css')}}">
</head>
<body>
<div class="container">
   
    <form action="" method="POST">
      @csrf
    <div class="form-group">
        <p>Enter the email address associated with your account and we'll send you a link to reset your password.
    </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <button type="submit">Send reset link</button>
      </div>
    </form>
  </div>
</body>
</html>
