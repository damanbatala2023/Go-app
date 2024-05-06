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
    <form>
    <div class="form-group">
        <p>Please, enter a new password.</p>
    </div>
      <div class="form-group">
        <label for="psd">New Password:</label>
        <input type="password" id="psd" placeholder="Password" required>
      
        <input type="password" id="psd" placeholder="Repeat Password" required>
      </div>
      <div class="form-group">
        <button type="submit">Change Password</button>
      </div>
    </form>
  </div>
 
</body>
</html>
