<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="public/style/main.css">
    <link rel="stylesheet" href="public/style/style.css">
    <link rel="stylesheet" href="public/style/mobile.css">

</head>
<body>
    <script>if (window.history.replaceState){window.history.replaceState(null, null, window.location.href);}</script>
    <script src="public/scripts/handleNotifications.js"></script>
    <script src="public/scripts/data.js"></script>
    <?php
    session_start();
    require_once('app/lib/controller.php');
    require_once('app/lib/account.php');
    $c = new Controller(); $c->controller();

    ?>
    
</body>
</html>