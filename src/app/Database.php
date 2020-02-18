<?php

namespace SamplePrj;

class Database
{
    private $pdo;

    public function connect()
    {
        $dsn = getenv('DSN');
        $user = getenv('DB_USERNAME');
        $password = getenv('DB_PASSWORD');

        $this->pdo = new \PDO($dsn, $user, $password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
}