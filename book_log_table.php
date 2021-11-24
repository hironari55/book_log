<?php

require_once __DIR__ . '/lib/mysqli.php';

function dropTable ($link)
{
    $dropTableSql = 'DROP TABLE IF EXISTS book_log';
    $result = mysqli_query($link, $dropTableSql);
    if ($result) {
        echo 'テーブルの削除に成功しました' . PHP_EOL;
    } elseif(!$result) {
        echo 'Error: テーブルの削除に失敗しました' . PHP_EOL;
        echo 'debuggingError: ' . mysqli_error($link) . PHP_EOL;
    }
}

function createTable($link)
{
$createTableSql = <<<EOT
    CREATE TABLE book_log (
id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
title VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
writer VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
status VARCHAR(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
score INTEGER,
thoughts VARCHAR(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) DEFAULT CHARACTER SET=utf8mb4;
EOT;

    $result = mysqli_query($link, $createTableSql);
    if ($result) {
        echo 'テーブルの作成に成功しました' . PHP_EOL;
    } elseif (!$result) {
        echo 'Error: テーブルの作成に失敗しました' . PHP_EOL;
        echo 'debuggingError: ' . mysqli_error($link) . PHP_EOL;
    }
}


$link = dbConnect();
dropTable($link);
createTable($link);
mysqli_close($link);
echo 'データベースとの接続を切断しました' . PHP_EOL;

// docker-compose exec app php book_log/book_log_table.php
