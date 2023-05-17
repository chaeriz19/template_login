<?php

// Controlling files and directions of website

class Controller {
    public function controller() {
        $page = empty($this->get_page(0)) ? 'home' : $this->get_page(0);
        // If file exists in webserver , show to user.
        if (file_exists("app/pages/$page.php")){
            include_once("app/pages/$page.php");
        } else {$this->handle_error(404);}
    }
    // Handle errors from controller
    public function handle_error($i){
        include_once("app/pages/error_pages/{$i}.php");
    }
    // Redirect user to specific direction
    public function redirect($a) {
        header("Location: $a");
        exit();
    }
    // Get value of current page
    private function get_page($i){
        if (empty($_GET['url'])) { return 'home';} 
        $url = explode("/", $_GET['url']); // clean URL from htaccess
        return $url[$i];
    }
    
}