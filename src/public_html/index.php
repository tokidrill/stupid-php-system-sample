<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use SamplePrj\Database;

$dotenv = Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();

// 環境変数の確認.
$test_env_val = getenv('HOGE');
echo "環境変数テスト: ${test_env_val}<br>";

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

