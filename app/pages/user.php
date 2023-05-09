<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <?php  require_once("app/lib/posts.php"); $p = new Posts();?>
    <?php if (isset($_POST['home-post'])) $p->post($_POST['txt'], $_SESSION['user_id']);?>
    <?php include_once("app/components/handleLikes.php"); ?>

    
    <div id="container">
        <?php require_once("app/components/bar.php"); ?>
        <div id="home-container">
            <div id="home-feed"><?php
            echo $p->queryUserFeed($_GET['user']);
            ?></div>
        </div>
    </div>
</body>
</html>