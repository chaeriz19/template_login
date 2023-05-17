<?php 
    $a = new Account(); $c = new Controller();
    if (isset($_POST['submit-logout'])) {$a->logout();}
    if (isset($_POST['submit-register'])) {$a->register($_POST['displayname'],$_POST['username'],$_POST['password']);}
?>

<div class="container">
<form action="" method="POST">
<h1 class="title">Sign up</h1>

    <input type="text" autocomplete="off" name="displayname" id="" placeholder="display name">
    <input type="text" autocomplete="off" name="username" id="" placeholder="username">
    <input type="password" autocomplete="off" name="password" id="" placeholder="password">
    <button class="button"name="submit-register">Register</button>
    <a href="login">Already have an account?</a>
    <p class="error"><?= $a->error ?></p>
</form>

</div>

