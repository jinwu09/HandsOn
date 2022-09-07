<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json: charset=utf8");
header("Access-Control-Allow-Methods: GET, POST, PATCH");


date_default_timezone_set("Asia/Manila");
set_time_limit(1000);

define("SERVER", "localhost");
define("DBASE", "enrollment_db");
define("USER", "root");
define("PASSWORD", "");

class Connection{
    protected $con_string = "mysql:host=".SERVER.";dbname=".DBASE."; charset=utf8mb4";
    protected $options = [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::ATTR_EMULATE_PREPARES => false
    ];

    public function connect(){
        return new \PDO($this->con_string, USER, PASSWORD, $this->options);
    }
}