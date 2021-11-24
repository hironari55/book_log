<?php
//接続のファイルを要求
require_once __DIR__ . '/lib/mysqli.php';

function createBook($link, $review)
{

    $sql = <<<EOT
INSERT INTO book_log (
    title,
    writer,
    status,
    score,
    thoughts
) VALUES (
    "{$review['title']}",
    "{$review['writer']}",
    "{$review['status']}",
    "{$review['score']}",
    "{$review['thoughts']}"
);
EOT;

    $result = mysqli_query($link, $sql);
    if (!$result) {
        error_log('データの追加に失敗しました');
        error_log('debuggingError: ' . mysqli_error($link));
    }
}

function validate($review)
{
    $errors = [];

    //書籍名
    if (!strlen($review['title'])) {
        $errors['title'] = '書籍名を入力してください';
    } elseif (strlen($review['title']) > 255) {
        $errors['title'] = '書籍名は255文字以内で入力してください';
    }
    //著者名
    if (!strlen($review['writer'])) {
        $errors['writer'] = '著者名を入力してください';
    } elseif (strlen($review['writer']) > 255) {
        $errors['writer'] = '著者名は255文字以内で入力してください';
    }

    //読書状況
    if (!in_array($review['status'], ['未読', '読んでる', '読了'])) {
        $errors['status'] = '読書状況を[未読],[読んでる],[読了]のいずれかから選択してください';
    }

    //評価
    if ($review['score'] < 0 || $review['score'] > 5) {
        $errors['score'] = '評価は1~5の間で入力してください';
    } elseif (!is_numeric($review['score'])) {
        $errors['score'] = '評価は数字で入力してください';
    }

    //感想
    if (!strlen($review['thoughts'])) {
        $errors['thoughts'] = '感想を入力してください';
    } elseif (strlen($review['thoughts']) > 1000) {
        $errors['thoughts'] = '感想は1000文字以内で入力してください';
    }

    return $errors;
}


//POST型の場合の処理を書く
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //status無いときは空白の値を渡す。statusがあるときは空白に上書きして$_POSTに入っていた値を渡す
    $status = '';
    if (array_key_exists('status', $_POST)) {
        $status = $_POST['status'];
    }

    //変数にPOSTの情報を格納
    $review =
        [
            'title' => $_POST['title'],
            'writer' => $_POST['writer'],
            'status' => $status,
            'score' => $_POST['score'],
            'thoughts' => $_POST['thoughts'],
        ];


    $errors = validate($review);
    if (!count($errors)) {
        //DBに接続する
        $link = dbConnect();
        //DBに登録する
        createBook($link, $review);
        //接続を切断する
        mysqli_close($link);
        //リダイレクト
        header("location: index.php");
    }
}

// docker-compose exec app php book_log/create.php


$title = '読書ログの登録';
$content = __DIR__  . '/views/new.php';
include __DIR__ . '/views/layout.php';
