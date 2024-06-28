<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lab Hub</title>
  <link rel="stylesheet" href="{{ asset('frontend-files/css/styles.css')}}">
</head>
<body>
  <div class="wrapper">
    <form action="{{ route('forget-password-route') }}" method="POST">

        <img class="arrow" src="./images/left-arrrow-circle-svgrepo-com.svg" style="width: 40px; height: 40px;" >

      <h3>forget Password </h3>
      <img src="./images/2.svg" style="width: 100px; height: 100px; margin-left:110px; margin-top: 20px; margin-bottom: 20px;">
      <div class="input-box">
        <p class="par">please enter your email adress to recive a verification code</p>
        <label for="btm">email</label>

        <input type="email" placeholder="email"  name="email" >
         </div>

      <button type="submit" class="btn2">send</button>
    </form>
  </div>
</body>
</html>
