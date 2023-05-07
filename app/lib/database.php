<?php
class Database {
    public $db;
    function connect() {
        $dbhost = "localhost";$user = "root";$pass = "";$database = "whisper";
        $this->db = mysqli_connect($dbhost, $user, $pass, $database);
        return $this->db;
    }
}