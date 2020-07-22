<?php

namespace projectPhp\src\Controllers;
use projectPhp\services\Connection;

//require_once 'services\ConnectionToDb.php';


class ControllerUsers
{
    public function indexAction()
    {
        $connectionToDb = new Connection();
        $connection = $connectionToDb->connectionToDb();
        return $response = $connection->query("SELECT * FROM `usersphp` limit 20 ")->fetch_all();
    }
}

//$db = new ControllerUsers();
//$response = $db->indexAction()->fetch_all();