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
    if (isset($_POST['sml'])) {$a->check($_POST['username'], $_POST['password']);}
    ?>

    
    <form method="POST">
        <input type="text" name="username" placeholder="username">
        <input type="text" name="password" placeholder="password">
        <button name="sml" value="true">Login</button>
    </form>
</body>
</html>