<?php

namespace projectPhp\services;

use mysqli;

class ConnectionToDb
{
    public $servername = 'localhost';
    public $username = "admin";
    public $password = "0212";
    public $dbname = "database";

    /**
     * @return mysqli
     */
    function  connection()
    {
        return new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    }
}
