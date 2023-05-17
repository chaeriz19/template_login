
<?php 
    $a = new Account(); $c = new Controller();
    if (isset($_POST['sml'])) {$a->check($_POST['username'], $_POST['password']);}
?>

<div class="container">

    <form method="POST">
        <h1>Login</h1>
        <input type="text" autocomplete="off" name="username" placeholder="username">
        <input class="turn" type="password" autocomplete="off"  name="password" placeholder="password">
        <button class="button" autocomplete="off"  name="sml" value="true">Login</button>
        <a href="register">Create account</a>
        <p class="error"><?= $a->error ?></p>
    </form>
    
</div>