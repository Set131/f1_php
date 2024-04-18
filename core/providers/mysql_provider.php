<?php

require('core/config/db_config.php');

class MySqlProvider{
    public $conn;
    public function __construct(){
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }
}