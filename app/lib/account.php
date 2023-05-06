<?php

class Account {
    function auth($username, $password){
        return 'pASS: '.$username . $password;
    }
    function logout(){}
    function register(){}
}