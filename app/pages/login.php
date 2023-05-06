<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div id="container">
    <div id="login-form">
        <form method="GET" id="form-login-container">
            <h1 id="form-title">Login</h1>
            <input type="text" autocomplete="off" name="username" id="form-input" placeholder="username">
            <input type="password" autocomplete="off" name="password" id="form-input" placeholder="password">
            <button id="form-submit" name="submit-login" value="true">Login</button>
            <a id="form-extra">Forgot password</a>
            <a id="form-extra">Register</a>  
        </form>
    </div>
    <div id="register-form"></div>
    </div>
   

    <script src="public/scripts/handleLogin.js"></script>
</body>
</html>