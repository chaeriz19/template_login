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
        
            <div id="home-post">
                <?php if (isset($_SESSION['logged_in']) || !empty($_SESSION['logged_in'])) {
                    echo '<form method="POST" id="home-post-form">
                    <input id="home-post-input" type="text" name="txt" id="" placeholder="What are you thinking about?"> 
                    <button id="home-post-button" name="home-post">Post</button>
                    </form>';}?>
            </div>
            <div id="home-feed"><?php
            echo $p->queryHomeFeed();
            ?></div>
        </div>
    </div>
</body>
</html>