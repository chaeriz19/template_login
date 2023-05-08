<div id="bar">
    <h1>Whisper</h1>
    
    <?php if (!(isset($_SESSION['logged_in']) || !empty($_SESSION['logged_in']))) {
        echo '<div id="links"><a href="login">Login</a>
        <a href="register">Register</a></div>';
    } else {echo '<div id="links"><a href="login">Logout</a>
        <a href="account">Account</a></div>';} ?>
</div>