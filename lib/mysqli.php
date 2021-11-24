<?php
//vender下層読み込み
require __DIR__ . '/../../vendor/autoload.php';

function dbConnect ()
{
//env読み込み
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->load();

//envの内容読み込み
$dbHost = $_ENV['DB_HOST'];
$userName = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$database = $_ENV['DB_DATABASE'];

$link = mysqli_connect($dbHost, $userName, $password, $database);
    $link->set_charset('utf8mb4');
if (!$link){
echo 'データベースに接続できませんでした' . PHP_EOL;
echo 'debugging_error: ' . mysqli_connect_error() . PHP_EOL;
exit;
}

return $link;
}
