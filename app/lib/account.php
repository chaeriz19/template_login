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
        if ($rows->num_rows !== 1){return print_r($rows);}
        $row = $rows->fetch_assoc();
        $prot_pass = $row['pw'];
        if (!($password == $prot_pass)) {return '2';}
        $this->auth($row['un'], $row['id']);
        return 'Successfully Authenticated User = '. $row['id'];
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
    
}