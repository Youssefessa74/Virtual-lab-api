<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>new password</title>
  <link rel="stylesheet" href="{{ asset('frontend-files/css/styles.css')}}">
</head>
<body>

  <div class="wrapper">
    <form action="{{ route('reset-password-route') }}" method="POST">
      <h2 class="mm">create new password</h2>
      <img src="./images/2.svg" style="width: 100px; height: 100px; margin-left:120px; margin-top: 20px; margin-bottom: 20px;">

      <p> your new password must be diddrent from previously used password</p>
       <div class="input-box">
        <label for="">New password</label>
        <input  type="password" name="password" placeholder="the new Password" required>
      </div>
      <div class="input-box">
        <label for="">Confirm new password</label>
        <input  type="password" name="password_confirmation" placeholder="the new Password" required>
      </div>

      <button type="submit" class="btn">save</button>
    </form>
  </div>
</body>
</html>
