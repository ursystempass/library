

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Perpustakaan Digital</title>
    <link rel="stylesheet" href="{{ asset('css/greeting.css') }}">
</head>
<body>
    <div class="container">
        <div class="intro">
            <h1>Selamat Datang di Perpustakaan Digital Kami</h1>
            <p>Temukan, Pelajari, dan Jelajahi!</p>
            <div class="options">
                <div class="option">
                    <h2>Personal</h2>
                    <p>Pinjam koleksi buku favoritmu, dengan maksimal 3 buku dalam satu waktu.</p>
                </div>
                <div class="option">
                    <h2>Harian</h2>
                    <p>Butuh buku pelajaran untuk hari ini? Temukan berbagai pilihan buku pelajaran dengan jumlah yang banyak.</p>
                </div>
                <div class="option">
                    <h2>Tahunan</h2>
                    <p>Dapatkan akses ke buku-buku paket untuk setiap kenaikan kelas selama satu tahun penuh.</p>
                </div>
            </div>
            <a href="{{ route('member.catalog') }}" class="explore-button">Temukan Bukumu!</a> <!-- Mengarahkan ke halaman katalog -->
        </div>
    </div>
</body>
</html>
