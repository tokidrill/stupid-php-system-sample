<?php

use Phpmig\Adapter;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$container = new ArrayObject();

$options = array(\PDO::MYSQL_ATTR_INIT_COMMAND=>"SET CHARACTER SET 'utf8'");
$dbh = new \PDO(getenv('DSN'), getenv('DB_USER_NAME'), getenv('DB_USER_PASSWORD'), $options);
$dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

// replace this with a better Phpmig\Adapter\AdapterInterface
$container['phpmig.adapter'] = new Adapter\PDO\Sql($dbh, 'phpmig');
$container['phpmig.migrations_path'] = __DIR__ . DIRECTORY_SEPARATOR . 'migrations';
$container['db'] = $dbh;

return $container;