<?php

require_once('database.php');
require_once('controller.php');

class Account {
    public $db;
    public $con;
    function __construct(){
        $this->db = new Database();
        $this->con = new Controller();
    }
    function auth($un, $id) {
        $_SESSION['user_id'] = $id;
        $_SESSION['user_name'] = $un;
        $_SESSION['logged_in'] = true;
    }
    function check($username, $password){
        $result = $this->db->connect()->prepare("SELECT * FROM `users` WHERE `un` = ?");
        $result->bind_param("s", $username);
        $result->execute();
        $rows = $result->get_result();
        if ($rows->num_rows !== 1){return false;}
        $row = $rows->fetch_assoc();
        $prot_pass = $row['pw'];
        if (!($password == $prot_pass)) {return false;}
        $this->auth($row['un'], $row['id']);
        $this->con->redirect("home");
    }
    function register($dp, $un, $pw) {
        if ((empty($dp) || (empty($un)) || (empty($pw)))) return 'empty';
        // if ($this->checkifuserexists($un)) {return false;}
        if ($this->checkifuserexists($un)) {
            $prepare = $this->db->connect()->prepare("INSERT INTO `users` (`id`, `dn`, `un`, `pw`) VALUES (NULL, ?, ?, ?);");
            $prepare->bind_param("sss", $dp,$un,$pw);
            $prepare->execute();
            $this->con->redirect("home");
            $this->check($un, $pw);
        } 
    }
    function checkifuserexists($un) {
        $prepare = $this->db->connect()->prepare("SELECT * FROM `users` WHERE `un` = ?");
        $prepare->bind_param("s", $un);
        $prepare->execute();
        $result = $prepare->get_result();
        $prepare->close();   
        if ($result->num_rows >= 1) {return false;} else {return true;}
    }
    function logout() {
        session_destroy();
        session_reset();
        $this->con->redirect("login");
    }
    // Queries
    function queryRows() {
        $query = "SELECT * FROM `users`";
        $results = $this->db->connect()->query($query);
        return $results->num_rows;
    }
    function queryUsername($id) {
        $results = $this->db->connect()->query("SELECT * FROM `users` WHERE `id` = $id");
        $row = $results->fetch_assoc();
        return $row['dn'] .   ' <a href="user?user='.$row['un'].'">'.'@'.$row['un'].'</a>';
    }
    
}