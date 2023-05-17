<?php

// handle database connections and queries
include_once("account.php");
class Database {
    public $db;public $q;
    function connect() {
        // connect to sql database
        $db = "localhost"; $user = "root"; $pass = ""; $database = "whisper";
        $this->db = mysqli_connect($db, $user, $pass, $database);
        return $this->db;
    }
    // prepare and execute database queries
    // [1]: select statement [2]: return result [3]: input
    function execute($i, $return, ...$params) {
        // Save statements and params in objects
        $this->q = [ 
            ["statement" => "SELECT * FROM `user` WHERE `un` = ?","params"=> "s",],
            ["statement" => "INSERT INTO `user` (`id`, `dn`, `un`, `pw`) VALUES (NULL, ?, ?, ?);","params"=> "sss",]
        ];
        $q = $this->q[$i];
        $statement = $this->connect()->prepare($q['statement']);
        // if params are not empty, execute database query and return object
        if (!empty($params)) {$statement->bind_param($q['params'], ...$params);}
        $statement->execute();
        // if $o == 0 return without the results, if $o == 1 return with results
        if ($return == 0) { return $statement; } else { 
            $results = $statement->get_result(); return $results;
        }
    }
}