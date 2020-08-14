<?php

namespace ProjectPhp\Controllers;

use ProjectPhp\Constants\PaginationConstants;
use ProjectPhp\Models\User;
use ProjectPhp\Services\ConnectionToDb;
use ProjectPhp\Services\PageNumberRetriever;
use ProjectPhp\Services\RequestParametersRetriever;
use ProjectPhp\Services\View;

class UsersController
{
    public function indexAction()
    {
        $recordsPerPage = PaginationConstants::RECORDS_PER_PAGE;
        $currentPage = PageNumberRetriever::getPage();
        $offset = $recordsPerPage * ($currentPage - 1);
        $connectionToDb = new ConnectionToDb();
        $connection = $connectionToDb->connection();
        $countUsers = (int)$connection->query("SELECT COUNT(1) FROM `usersphp`")->fetch_row()[0];
        $usersData = $connection->query("SELECT * FROM `usersphp` limit $recordsPerPage OFFSET $offset")->fetch_all(MYSQLI_ASSOC);
        $countPages = $countUsers / $recordsPerPage;
        $lastPage = ceil($countPages);
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
            'users' => $users,
            'lastPage' => $lastPage,
            'currentPage' => $currentPage
        ]);

    }

    public function deleteAction()
    {
        $userId = (int)$_GET['userId'];
        $connection = new ConnectionToDb();
        $connect = $connection->connection();
        $deleted = $connect->query("DELETE FROM usersphp WHERE id = $userId");
        echo json_encode([
            'success' => (bool)$deleted
        ]);
    }

    public function storeAction()
    {
        $connectionToDB = new ConnectionToDb();
        $connection = $connectionToDB->connection();
        $firstname = $connectionToDB->escape(
            (string)RequestParametersRetriever::getPostParameter('firstname')
        );
        $lastname = $connectionToDB->escape(
            (string)RequestParametersRetriever::getPostParameter('lastname')
        );
        $email = $connectionToDB->escape(
            (string)RequestParametersRetriever::getPostParameter('email')
        );
        $phone = $connectionToDB->escape(
            (string)RequestParametersRetriever::getPostParameter('phone')
        );
        $password = $connectionToDB->escape(
            (string)RequestParametersRetriever::getPostParameter('password')
        );
        $password = hash('sha256', $password);
        $storeUser = $connection->query("
            INSERT INTO `usersphp` (firstname, lastname, email, phone, password)
            VALUES ('$firstname', '$lastname', '$email', '$phone', '$password') 
        ");
        if (is_null($storeUser)) {
            $storeUser = json_encode($storeUser);
            $_SESSION['user'] = $storeUser;
        }

        header("Location: /users");
        exit();
    }

    public function loginAction()
    {
        $connectionToDb = new ConnectionToDb();
        $connection = $connectionToDb->connection();
        $email = RequestParametersRetriever::getPostParameter('email');
        $password = RequestParametersRetriever::getPostParameter('password');
        $password = hash('sha256', $password);
        $userData = $connection->query("
            SELECT * FROM `usersphp` WHERE email = '$email' AND password = '$password' limit 1
        ")->fetch_assoc();

        if (!is_null($userData)) {
            $userData = json_encode($userData);
            $_SESSION['user'] = $userData;
            header("Location: /users");
            exit();
        }

        $queryData = http_build_query(['errorMessage' => 'Invalid credentials']);
        header("Location: /?$queryData");
        exit();

    }

    public function logoutAction()
    {
        unset($_SESSION['user']);
        session_destroy();
        header("Location: /");
        exit();
    }
}
