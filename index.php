<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="public/style/main.css">
    <link rel="stylesheet" href="public/style/style.css">
</head>
<body>
    <?php
    require_once('app/lib/controller.php');
    $c = new Controller(); $c->controller();
    ?>
    <script src="public/scripts/handleNotifications.js"></script>
    <script src="public/scripts/data.js"></script>
</body>
</html>