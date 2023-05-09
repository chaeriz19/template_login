<?php
// Whisper "tweet" logic
require_once('app/lib/database.php');
require_once('app/lib/account.php');

class Posts {
    public $db; public $a;
    public $output; 
    public $user_id = null;
    public function __construct(){
        $this->db = new Database();
        $this->a = new Account();
        $this->user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "0";
    }

    public function post($msg, $id) {
        $msg = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $msg);
        if ($msg == null | $msg == "") {return false;}
        $prepare = $this->db->connect()->prepare("INSERT INTO `posts` (`id`, `txt`, `creator_id`, `date`) VALUES (NULL, ?, ?, current_timestamp());");
        $prepare->bind_param("si", $msg, $id);
        $prepare->execute();    
    }
    public function saveLike($post_id){
        if ($this->checkLike($post_id)) {return false;}
        $prepare = $this->db->connect()->prepare("INSERT INTO `likes` (`id`, `u_id`, `p_id`, `date`, `likes`) VALUES (NULL, ?, ?, DATE, '1')");
        $prepare->bind_param("ss", $this->user_id, $post_id);
        $prepare->execute();
    }
    public function checkLike($post_id) {
        $result = $this->db->connect()->query("SELECT * FROM `likes` WHERE `p_id` = $post_id AND `u_id` = $this->user_id");
        return $result->num_rows;
    }
    private function postLayout($data) {
        $this->output .= '<div id="post">'.'<div id="post-creator">'.$this->a->queryUsername($data['creator_id']).'</div>';
        $this->output .= '<div id="post-msg">'.$data['txt'].'</div>'.'<div id="post-date">'.$data['date'].'</div>';
        $this->output .= '<div><form method="POST">'.$this->queryLikes($data['id'], $_SESSION['user_id']).'</form></div></div>';
        return $this->output;
    }

    // Queries
    public function queryHomeFeed(){
        $result = $this->db->connect()->query("SELECT * FROM `posts`");
        while ($data = $result->fetch_assoc()) {
            $this->postLayout($data);
        }
        return $this->output;
    }
    public function queryUserFeed($user) {
        if ($user == null | $user == "")  {header("Location: home");}
        $result = $this->db->connect()->query("SELECT `id` FROM `users` WHERE `un` = '$user'");
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user_id = $row['id'];
            }
        }
        $prepare = $this->db->connect()->prepare("SELECT * FROM `posts` WHERE `creator_id` = ?");
        $prepare->bind_param("s", $user_id);
        $prepare->execute();
        $result = $prepare->get_result();
        while ($data = $result->fetch_assoc()) {
            $this->postLayout($data);
        }
        if ($result->num_rows == 0) { return 'This user has no posts yet.';}
        $prepare->close();
        return $this->output;
    }
    public function queryLikes($post_id){
        $result = $this->db->connect()->query("SELECT likes,u_id FROM `likes` WHERE `p_id` = $post_id");
        $result2 = $this->db->connect()->query("SELECT likes,u_id FROM `likes` WHERE `p_id` = $post_id AND `u_id` = $this->user_id");


        if ($result->num_rows == 0) {
            return '<button class="" value="'.$post_id.'"name="like-submit" id="post-likes">0 Likes</button>'

            ;}
        while ($row = $result2->fetch_assoc()) {
            if ($row['u_id'] == $this->user_id) {
                return '<button value="'.$post_id.'"name="like-submit" class="liked" id="post-likes">'.$result->num_rows.' Likes</button>'
                // return $row['u_id'].' '.$this->user_id.' '.$post_id;
                ;
            } else {
                return '<button name="like-submit" value="'.$post_id.'" class="" id="post-likes">'.$result->num_rows.' Likes</button>'
                // return $row['u_id'].' '.$this->user_id.' '.$post_id;

                ;
            }
        }
    }
}