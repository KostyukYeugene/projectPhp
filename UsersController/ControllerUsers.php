<?php
require_once 'ConnectionToDb.php';


class ControllerUsers
{
    public function indexAction()
    {
        $connectionToDb = new Connection();
        $connection = $connectionToDb->connectionToDb();
       return $response = $connection->query("SELECT * FROM `usersphp` limit 20 ");
    }
}

$db = new ControllerUsers();
$response = $db->indexAction()->fetch_all();