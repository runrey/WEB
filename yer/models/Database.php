<?php

class Database
{
    var $host   = ""; //database server
    var $user     = ""; //database login name
    var $pass     = ""; //database login password
    var $database = ""; //database name

    public $link;

    public function __construct($host, $user, $pass, $database)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->database = $database;
    }

    //Conncection to the database
    public function connect()
    {
        $this->link = new mysqli($this->host,$this->user,$this->pass,$this->database);
        if ($this->link->connect_errno) {
            throw new Exception("Cannot connect: " . $this->link->connect_error);
        }
        else {
            return $this->link;
        }
    }
}



