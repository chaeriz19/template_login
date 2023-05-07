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
        $un = $this->db->connect()->real_escape_string($username);
        $result = $this->db->connect()->prepare("SELECT * FROM `users` WHERE `un` = ?");
        $result->bind_param("s", $username);
        $result->execute();
        if ($result->num_rows !== 1) {return $result->num_rows();}
        $row = $result->get_result()->fetch_assoc();
        $prot_pass = $row['pw'];
        if (!($password == $prot_pass)) {return '2';}
        $this->auth($un, $row['id']);
        $this->con->redirect('home');
        return 'Successfully Authenticated User = '. $row['id'];
    }
    function logout() {
        session_destroy();
        session_reset();
    }
    // Queries
    function queryRows() {
        $query = "SELECT * FROM `users`";
        $results = $this->db->connect()->query($query);
        return $results->num_rows;
    }
    
}