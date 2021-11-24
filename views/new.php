

    <div class="container">
        <h2 class="text-dark">読書ログの登録</h2>
        <form action="create.php" method="POST" class="mt-4">
            <?php if (count($errors) > 0) : ?>
                <ul class="text-danger">
                    <?php foreach ($errors as $error) : ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <div class="form-group">
                <label for="title">書籍名</label>
                <input type="text" id="title" name="title" value="<?php echo $review['title'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="writer">著者名</label>
                <input type="text" id="writer" name="writer" value="<?php echo $review['writer'] ?>" class="form-control">
            </div>
            <div>
                <label>読書状況</label>
                <div class="d-flex">
                    <div>
                        <input type="radio" name="status" id="status1" value="未読" <?php echo ($review['status'] === '未読') ? 'checked' : ''; ?>>
                        <label for="status1" class="mr-3">未読</label>
                    </div>
                    <div>
                        <input type="radio" name="status" id="status2" value="読んでる" <?php echo ($review['status'] === '読んでる') ? 'checked' : ''; ?>>
                        <label for="status2" class="mr-3">読んでる</label>
                    </div>
                    <div>
                        <input type="radio" name="status" id="status3" value="読了" <?php echo ($review['status'] === '読了') ? 'checked' : ''; ?>>
                        <label for="status3">読了</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="score">評価(１~５の整数5点満点)</label>
                <input type="tel" id="score" name="score" value="<?php echo $review['score'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="thoughts">感想</label>
                <textarea name="thoughts" id="thoughts" class="form-control"><?php echo $review['thoughts'] ?></textarea>
            </div>
            <button type='submit' class="btn btn-primary mb-5">登録する</button>
        </form>
    </div>
