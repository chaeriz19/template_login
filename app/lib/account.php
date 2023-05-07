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
    function check($username, $password){
        $un = mysqli_real_escape_string($this->db->connect(),$username);
        $query = "SELECT * FROM `users` WHERE `un` = '$un'";
        $result = $this->db->connect()->query($query);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $prot_pass = $row['pw'];
            if ($password == $prot_pass) {
                $this->auth($un, $row['id']);
                $this->con->redirect('home');
                return 'Successfully Authenticated User = '. $row['id'];
            } else { return 'Nope';}
        }
    }
    // Queries
    function queryRows() {
        $query = "SELECT * FROM `users`";
        $results = $this->db->connect()->query($query);
        return $results->num_rows;
    }
    function auth($un, $id) {
        $_SESSION['user_id'] = $id;
        $_SESSION['user_name'] = $un;
        $_SESSION['logged_in'] = true;
    }
}