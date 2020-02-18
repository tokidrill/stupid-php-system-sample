<?php

require_once __DIR__ . '/../vendor/autoload.php';

use SamplePrj\Database;

// DB 接続の確認.
try {
    $DB = new Database();
    $DB->connect();
    $msg = "データベースへの接続確認が取れました。";
} catch (\PDOException $e) {
    $msg = "データベースへの接続に失敗しました。<br>(" . $e->getMessage() . ")";
}

echo $msg;

// phpinfo.
phpinfo();

