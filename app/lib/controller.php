<?php
class Controller {
    public function controller() {
        $page = empty($this->get_page(0)) ? 'home' : $this->get_page(0);
        if (file_exists("app/pages/$page.php")){
            include_once("app/pages/$page.php");
        } else {include_once("app/pages/404.php");}
    }
    public function get_page($i){
        if (empty($_GET['url'])) { return 'home';}
        $url = explode("/", $_GET['url']);
        return $url[$i];
    }
    public function redirect($a) {
        header("Location: $a");
    }
}