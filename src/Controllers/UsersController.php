<?php


//require_once 'services\ConnectionToDb.php';

use Project\services\Connection;

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