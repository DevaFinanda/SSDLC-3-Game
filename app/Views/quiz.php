
<!DOCTYPE html>
<html>
<head>
    <title>Quiz SSDL</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Level <?= $level == 1 ? 'Beginner' : 'Advance' ?></h2>
        <form action="/quiz/submit" method="post">
            <?php foreach ($questions as $index => $q): ?>
                <div class="question">
                    <p><strong><?= ($index + 1) ?>. <?= $q['question_text'] ?></strong></p>
                    <?php foreach ($q['answers'] as $ans): ?>
                        <div>
                            <input type="radio" name="<?= $q['id'] ?>" value="<?= $ans['id'] ?>" required>
                            <?= $ans['answer_text'] ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <hr>
            <?php endforeach; ?>
            <button type="submit">Kirim Jawaban</button>
        </form>
    </div>
</body>
</html>
