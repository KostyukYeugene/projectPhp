<?php

namespace ProjectPhp\Controllers;

use ProjectPhp\Models\User;
use ProjectPhp\Services\ConnectionToDb;
use ProjectPhp\Services\View;

class UsersController
{
    public function indexAction()
    {
        $connectionToDb = new ConnectionToDb();
        $connection = $connectionToDb->connection();
        $usersData = $connection->query("SELECT * FROM `usersphp` limit 10")->fetch_all(MYSQLI_ASSOC);
        $users = [];
        foreach ($usersData as $userItem) {
            $user = new User();
            $user->setFirstName((string)$userItem['firstname']);
            $user->setLastName((string)$userItem['lastname']);
            $user->setEmail((string)$userItem['email']);
            $user->setPhone((string)$userItem['phone']);
            $user->setPassword((string)$userItem['password']);
            $user->setId((int)$userItem['id']);
            $users[] = $user;
        }
        View::render('users.php', [
            'users'=>$users
        ]);
    }
    public function deleteAction()
    {
        $userId = (int)$_GET['userId'];
        $connectionToDb = new ConnectionToDb();
        $connect = $connectionToDb->connection();
        $deleted = $connect->query("DELETE FROM usersphp WHERE id = $userId");
        echo json_encode([
            'success'=> (bool)$deleted
        ]);
    }
}
