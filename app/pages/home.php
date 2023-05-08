<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <?php require_once("app/lib/posts.php"); ?>
    <div id="home-container">
        <div id="home-post">
            <form action="" id="home-post-form">
                <input id="home-post-input" type="text" name="" id="" placeholder="What are you thinking about?"> 
                <button id="home-post-button">Post</button>
            </form>
        </div>
        <div id="home-feed"><?php
        $p = new Posts(); echo $p->queryHomeFeed();
        ?></div>
    </div>
</body>
</html>