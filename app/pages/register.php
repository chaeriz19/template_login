<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php 
    $a = new Account(); $c = new Controller();
    if (isset($_POST['submit-logout'])) {$a->logout();}
    if (isset($_POST['submit-register'])) {$a->register($_POST['displayname'],$_POST['username'],$_POST['password']);}
    if (isset($_POST['submit-gohome'])) {$c->redirect("home");}

    ?>
    <div id="container">
    <div id="form">
        <form method="POST" id="form-container">
            <h1 id="form-title">Register</h1>
            <input type="text" autocomplete="off" name="username" id="form-input" placeholder="username">
            <div>
                <svg id="form-svg" width='20' height='20' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>
                <g transform="matrix(0.83 0 0 0.83 12 12)" >
                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" translate(-15, -15)" d="M 18.5 3 C 13.806 3 10 6.806 10 11.5 C 10 12.542294 10.19765 13.536204 10.541016 14.458984 L 3 22 L 3 27 L 8 27 L 8 24 L 11 24 L 11 21 L 14 21 L 15.541016 19.458984 C 16.463796 19.80235 17.457706 20 18.5 20 C 23.194 20 27 16.194 27 11.5 C 27 6.806 23.194 3 18.5 3 z M 20.5 7 C 21.881 7 23 8.119 23 9.5 C 23 10.881 21.881 12 20.5 12 C 19.119 12 18 10.881 18 9.5 C 18 8.119 19.119 7 20.5 7 z" stroke-linecap="round" />
                </g>
                </svg>
                <input type="password" autocomplete="off" name="password" id="form-input" placeholder="password">
            </div>
            <input type="text" autocomplete="off" name="displayname" id="form-input" placeholder="display name">
            <button id="form-submit" name="submit-register" value="true">Create Account</button>
            <div id="notification"></div>
            <a id="form-extra" href="login">Already have an account?</a>  
        </form>
    </div>
    <div id="logout-form">
        <form method="POST">
            <button name="submit-logout">Logout</button>
            <button name="submit-gohome">home</button>

        </form>
    </div>
    <div id="register-form"></div>
    </div>
    <script src="public/scripts/handleLogin.js"></script>
</body>
</html>