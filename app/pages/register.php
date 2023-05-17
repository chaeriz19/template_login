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
    ?>

    
    <form action="" method="POST">
        <input type="text" name="displayname" id="">
        <input type="text" name="username" id="">
        <input type="text" name="password" id="">
        <button name="submit-register">REgister</button>
    </form>
</body>
</html>