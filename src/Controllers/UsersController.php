<?php

namespace projectPhp\src\Controllers;

use projectPhp\services\ConnectionToDb;
//require_once __DIR__ . '\..\..\services\ConnectionToDb.php';
class UsersController
{
    public function indexAction()
    {
        $connectionToDb = new ConnectionToDb();
        $connection = $connectionToDb->connection();
        return $response = $connection->query("SELECT * FROM `usersphp` limit 20 ")->fetch_all();
    }
}

