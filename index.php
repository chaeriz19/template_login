<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="public/style/main.css">
    <script src="public/scripts/errorcheck.js"></script>
</head>
<body>
    <script>if (window.history.replaceState){window.history.replaceState(null, null, window.location.href);}</script>
    <?php
    session_start();
    require_once('app/lib/controller.php');
    require_once('app/lib/account.php');
    $c = new Controller(); $c->controller();
    ?>
    
</body>
</html>