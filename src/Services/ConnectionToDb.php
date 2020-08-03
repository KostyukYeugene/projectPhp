<?php

namespace ProjectPhp\Services;

use mysqli;

class ConnectionToDb
{
    /**
     * @return mysqli
     */
    public function connection()
    {
        return new mysqli(
            getenv('DB_HOST'),
            getenv('DB_USER'),
            getenv('DB_PASSWORD'),
            getenv('DB_NAME')
        );
    }
}

