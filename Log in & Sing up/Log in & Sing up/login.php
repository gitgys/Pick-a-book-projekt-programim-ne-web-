<html>
  <head>
    <title>Login</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="http://localhost//PW/Log%20in%20&%20Sing%20up/loginScript.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/PW/Log%20in%20&%20Sing%20up/loginStyle.css">
  </head>
  <body>
    <div id="all">
      <div id="logo">
        <h3>Login</h3>
      </div>
      <div id="inputet">
        <div id="usernameDiv">
          <input type="text" name="username" class="form-control" id="username" placeholder="Username">
        </div>
        <div id="passwordDiv">
          <input type="password" name="password" class="form-control" id="password" placeholder="Password">
        </div>
        <div id="informacion"></div>
      </div>
      <div id="buttons">
        <div id="loginButton">
          <input type="submit" class="btn btn-outline-secondary" name="login" id="login" value="Log in" onclick="login()">
        </div>
        <div id="singupButton">
          <a href="singup.php"><input type="submit" class="btn btn-outline-secondary" name="singup" id="singup" value="Sing up"></a>
        </div>
      </div>
    </div>
  </body>
</html>
