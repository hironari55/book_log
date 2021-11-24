<?php
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>読書ログ一覧</title>
</head>

<body>
    <h2 class="text-dark">読書ログ一覧</h2>

    <a href="new.php" class="btn btn-primary mt-3 mb-5">読書ログを登録する</a>

    <?php if (count($books) > 0) : ?>
        <?php foreach ($books as $book) : ?>
            <section class="card shadow-lg mt-4">
                <div class="card-body">
                    <h3 class="mb-3"><?php echo escape($book['title']) ?></h3>
                    <div class="row ml-1 mb-3">
                        <div><?php echo escape($book['writer']) ?>&nbsp;/&nbsp;</div>
                        <div><?php echo escape($book['status']) ?>&nbsp;/&nbsp;</div>
                        <div><?php echo escape($book['score']) ?>点</div>
                    </div>
                    <div class="text-body"><?php echo escape($book['thoughts']) ?></div>
                </div>
            </section>
        <?php endforeach; ?>
    <?php else : ?>
        <p>現在登録されている読書ログデータはありません</p>
    <?php endif; ?>

</body>

</html>
