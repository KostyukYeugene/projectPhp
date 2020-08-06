<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;
use ProjectPhp\Services\ConnectionToDb;

$dotenv = new Dotenv();
$dotenv->usePutenv()->load(__DIR__ . '/../../.env');
$faker = Faker\Factory::create();
$connectionToDb = new ConnectionToDb();
$connection = $connectionToDb->connection();

for ($i = 0; $i < 1000; $i++) {
    $firstname = mysqli_real_escape_string($connection, $faker->firstName);
    $lastname = mysqli_real_escape_string($connection, $faker->lastName);
    $email = mysqli_real_escape_string($connection, $faker->email);
    $phone = mysqli_real_escape_string($connection, $faker->phoneNumber);
    $password = mysqli_real_escape_string($connection, $faker->password);
    $connection->query("
        INSERT INTO `usersphp` (firstname, lastname, email, phone, password)
        VALUES ('$firstname', '$lastname', '$email', '$phone', '$password')
    ");

}
mysqli_close($connection);
