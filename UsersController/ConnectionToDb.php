<?php

class Connection
{
    public $servername = 'localhost';
    public $username = "root";
    public $password = "";
    public $dbname = "basa";

    /**
     * @return mysqli
     */
    function connectionToDb()
    {
        return new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    }
}
