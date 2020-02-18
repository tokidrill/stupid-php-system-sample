<?php

// DB 接続の確認.
$db_connection = getenv('DB_CONNECTION');
$db_name = getenv('DB_DATABASE');
$db_host = getenv('DB_HOST');

$dsn = "${db_connection}:host=${db_host};dbname=${db_name}";
$user = getenv('DB_USERNAME');
$password = getenv('DB_PASSWORD');

try {
  $pdo = new \PDO($dsn, $user, $password);
  $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
  $msg = "${db_connection} への接続確認が取れました。";
} catch (\PDOException $e) {
  $msg = "${db_connection} への接続に失敗しました。<br>(" . $e->getMessage() . ")";
}

echo $msg;

// phpinfo.
phpinfo();

