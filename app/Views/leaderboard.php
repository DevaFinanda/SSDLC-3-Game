
<!DOCTYPE html>
<html>
<head>
    <title>Leaderboard</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Leaderboard Skor</h2>
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Level</th>
                    <th>Skor</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($scores as $row): ?>
                    <tr>
                        <td><?= $row['username'] ?></td>
                        <td><?= $row['level'] ?></td>
                        <td><?= $row['score'] ?></td>
                        <td><?= $row['taken_at'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="/quiz/1">Mulai Quiz Beginner</a> |
        <a href="/quiz/2">Mulai Quiz Advance</a>
    </div>
</body>
</html>
