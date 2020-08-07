<?php

namespace ProjectPhp\Services;

use mysqli;

class ConnectionToDb
{
    /** @var mysqli */
    private $connection;

    public function __construct()
    {
        $this->connection = new mysqli(
            getenv('DB_HOST'),
            getenv('DB_USER'),
            getenv('DB_PASSWORD'),
            getenv('DB_NAME')
        );
    }

    /**
     * @return mysqli
     */
    public function connection(): mysqli
    {
        return $this->connection;
    }

    public function __destruct()
    {
        mysqli_close($this->connection);
    }
}
