<?php

class Page{
    public $id;
    public $user;
    public $title;
    public $content;
    public $template;
    public $register;
    public $parameter;

    public function __construct(){
        $this->register = require('core/config/register.php');
        $this->id = $this->define_id();
        $this->user = $this->define_user();
        $this->title = $this->register[$this->id];
        $this->content = "public/pages/{$this->id}.php";
        $this->template = "public/pages/_base.php";
    }

    private function define_id(){
        if (isset($_GET['id'])){
            $key = $_GET['id'];
            $pos = strpos($key, "@");

            if ($pos > 0) {
                $parts = explode('@', $key);
                $key = $parts[0];
                $this->parameter = $parts[1];
            } else {
                $this->parameter = '0';
            }

            if(array_key_exists($key, $this->register)){
                return $key;
            } else {
                return 'page404';
            }
        } else {
            return 'main';
        }
    }

    private function define_user(){
        if (isset($_SESSION['user'])){
            return $_SESSION['user'];
        } else{
            if(isset($_COOKIE['user'])){
                return $_COOKIE['user'];
            } else{
                return 'Гість';
            }
        }
    }

    public function load(){
        include($this->template);
    }
}