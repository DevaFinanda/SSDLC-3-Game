
<!DOCTYPE html>
<html>
<head>
    <title>Hasil Quiz</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Hasil Quiz Anda</h2>
        <?php if (session()->getFlashdata('score') !== null): ?>
            <p>Skor Anda: <strong><?= session()->getFlashdata('score') ?></strong></p>
        <?php else: ?>
            <p>Tidak ada skor yang tersedia.</p>
        <?php endif; ?>
        <a href="/quiz/1">Coba Ulang Beginner</a> | 
        <a href="/quiz/2">Coba Ulang Advance</a> | 
        <a href="/leaderboard">Lihat Leaderboard</a>
    </div>
</body>
</html>
