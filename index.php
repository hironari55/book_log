<?php

//DB接続ファイル読み込み、接続
require_once __DIR__ . '/lib/mysqli.php';
require_once __DIR__ . '/lib/escape.php';

function reviewBooks ($link)
{
//表示データ一覧の配列を関数外で定義
$books = [];

//sqlデータ取り込み
$sql = 'SELECT title, writer, status, score, thoughts FROM book_log';
$results = mysqli_query($link, $sql);

while($book = mysqli_fetch_assoc($results))
{
    $books[] = $book;
}

mysqli_free_result($results);

return $books;
}

$link = dbConnect();

$books = reviewBooks($link);
$title = '読書ログ一覧';
$content = __DIR__ . '/views/index.php';
include __DIR__ . '/views/layout.php';
