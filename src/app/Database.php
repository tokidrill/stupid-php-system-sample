<?php

namespace SamplePrj;

class Database
{
    private $pdo;

    public function connect()
    {
        $db_connection = getenv('DB_CONNECTION');
        $db_name = getenv('DB_DATABASE');
        $db_host = getenv('DB_HOST');

        $dsn = "${db_connection}:host=${db_host};dbname=${db_name}";
        $user = getenv('DB_USERNAME');
        $password = getenv('DB_PASSWORD');

        $this->pdo = new \PDO($dsn, $user, $password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
}