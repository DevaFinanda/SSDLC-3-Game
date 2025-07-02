<!-- app/Views/dashboard.php -->
<h2>Selamat Datang, <?= session('username') ?></h2>
<p>Role: <?= session('role') ?></p>
<p>Akses berlaku sampai: <?= session('access_expires') ?></p>
<a href="/logout">Logout</a>
