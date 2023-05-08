<?php
// Whisper posts system
require_once('app/lib/database.php');
require_once('app/lib/account.php');

class Posts {
    public $db; public $a;
    public $output;
    public function __construct(){
        $this->db = new Database();
        $this->a = new Account();
    }

    public function post($msg, $id) {
        $msg = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $msg);
        if ($msg == null | $msg == "") {return false;}
        $prepare = $this->db->connect()->prepare("INSERT INTO `posts` (`id`, `txt`, `creator_id`, `date`) VALUES (NULL, ?, ?, current_timestamp());");
        $prepare->bind_param("si", $msg, $id);
        $prepare->execute();
    }

    // Queries
    public function queryHomeFeed(){
        $result = $this->db->connect()->query("SELECT * FROM `posts`");
        while ($data = $result->fetch_assoc()) {
            $this->output .= '<div id="post">'.'<div id="post-creator">'.$this->a->queryUsername($data['creator_id']).'</div>';
            $this->output .= '<div id="post-msg">'.$data['txt'].'</div></div>';
        }
        return $this->output;
    }
}