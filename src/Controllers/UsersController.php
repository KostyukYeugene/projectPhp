<?php

namespace projectPhp\Controllers;

use projectPhp\Services\ConnectionToDb;

class UsersController
{
    public function indexAction()
    {
        $connectionToDb = new ConnectionToDb();
        $connection = $connectionToDb->connection();
        return $response = $connection->query("SELECT * FROM `usersphp` limit 20 ")->fetch_all();
    }
}
var_dump(connection_status());