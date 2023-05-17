<?php

// handle account authentication and creation
require_once('database.php');
require_once('controller.php');
class Account {
    public $db;public $con; public $error = "";
    // Define public variables on loading
    function __construct(){
        $this->db = new Database();
        $this->con = new Controller();
    }
    // check if passed in username and password 
    function check($username, $password){
        $result = $this->db->execute(0, 0, $username);
        $rows = $result->get_result();
        $row = $rows->fetch_assoc();
        if (!$row || !password_verify($password, $row['pw'])) {
            $this->error = "Incorrect username or password, please try again"; return false;
        }
        $this->auth($row['un'], $row['id']);
        $this->con->redirect("home");       
    }
    function register($dp, $un, $pw) {
        if ((empty($dp)) || (empty($un)) || (empty($pw))) {
            $this->error = "Please fill in all your information";
            return false;
        }
        $prot_pass = password_hash($pw, PASSWORD_DEFAULT);
        if ($this->checkifuserexists($un)) {
            $this->db->execute(1, 0, $dp, $un, $prot_pass); // execute database query to database.php
            $this->con->redirect("home");
            $this->check($un, $pw);
        }  else { $this->error = "This username already exists";}
    }
    // check if username exists in database, return true or false
    function checkifuserexists($un) {
        $result = $this->db->execute(0, 1, $un);
        if ($result->num_rows >= 1) {return false;} else {return true;}
    }
    function logout() {
        // destroy sessions and redirect back to login page
        session_destroy();
        session_unset();
        $this->con->redirect("login");
    }
    // Set session paramaters after authentication
    function auth($un, $id) {
        $_SESSION['user_id'] = $id;
        $_SESSION['user_name'] = $un;
        $_SESSION['logged_in'] = true;
    }
}