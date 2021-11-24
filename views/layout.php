<?php
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheets/css/app.css">
    <title><?php echo $title; ?></title>
</head>

<body>
    <h2>
        <a href="index.php" class="d-block m-3 text-dark text-decoration-none">読書ログ</a>
    </h2>
    <div class="row">
        <span class="border-bottom w-100 mb-5"></span>
    </div>
    <div class="container">
        <?php include $content; ?>
    </div>
</body>

</html>
