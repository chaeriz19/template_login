<?php 
include_once 'app/lib/posts.php';
if (isset($_POST['like-submit']) && $_POST['like-submit'] != null) {
    if (!$_SESSION['logged_in']) {header("Location: login"); return false;};
    $p = new Posts();
    echo $p->saveLike($_POST['like-submit']);
};
?>