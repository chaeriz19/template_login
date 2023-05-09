<div id="sidebar-left">
    <h1>Whisper</h1>
    <div id="links">
    <a id="form-submit" href="home">Home</a>
    <?php 
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {echo '    <a id="form-submit" href="login">Logout</a>
            <a id="form-submit" href="user?user='.$_SESSION['user_name'].'">Account</a>';} else {echo '<a id="form-submit" href="login">Login</a>
            <a id="form-submit" href="register">Register</a>';}
    ?>

    </div>


</div>