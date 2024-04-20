<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Catalog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Font Awesome CSS -->
    <!-- Include SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="{{ asset('css/catalog.css') }}">
    <style>
        /* CSS tambahan */
        #bookList {
            display: none;
        }

        .book-type {
            text-align: center;
            margin-top: 20px;
        }

        .type-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            background-color: #f9f9f9;
            max-width: 300px; /* Sesuaikan lebar card */
            margin: auto; /* Posisi di tengah */
            margin-bottom: 20px; /* Tambahkan margin bottom */
        }

        .type-card h3 {
            margin-bottom: 10px;
        }

        .type-buttons {
            display: flex;
            justify-content: center;
        }

        .type-card .btn-type {
            padding: 8px 16px;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s; /* Transisi warna latar belakang */
        }

        .type-card .btn-novel {
            background-color: #ff69b4; /* Warna untuk tombol jenis Novel */
        }

        .type-card .btn-pelajaran {
            background-color: #ff69b4; /* Warna untuk tombol jenis Pelajaran */
        }

        .type-card .btn-lainnya {
            background-color: #ff69b4; /* Warna untuk tombol jenis Lainnya */
        }

        .type-card .btn-type:hover {
            background-color: #ff1493; /* Ganti warna button saat hover */
        }

        .type-card .btn-type:active {
            transform: translateY(1px); /* Efek lonjakan saat diklik */
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>Perpustakaan SMKN 1 Cibinong</h1>
        <div class="header-icons">
            <i class="fas fa-bell"></i> <!-- Icon notifikasi -->
            <i class="fas fa-user"></i> <!-- Icon profil -->
        </div>
    </div>


    <div class="container">
        <form class="search-container" id="searchForm">
            <input type="text" placeholder="Search..." name="q">
            <button type="submit">Search</button>
        </form>
        <button id="logoutButton" onclick="logout()" class="logout-btn">
            Logout
        </button>
        <!-- Daftar buku (akan dimunculkan setelah pencarian dilakukan) -->
        <div id="bookList">
            <div class="catalog">
                <!-- HTML untuk menampilkan setiap buku akan ditempatkan di sini -->
                @foreach ($books as $book)
                <div class="book">
                    <img src="{{ $book->image }}" alt="{{ $book->title }}">
                    <div class="book-details">
                        <h3>{{ $book->title }}</h3>
                        <p>{{ $book->author }}</p>
                        <p>{{ $book->publisher }}</p>
                        <p>Rak: {{ $book->shelf_location_id }}</p>
                        <p class="book-quantity">Jumlah buku: {{ $book->quantity }}</p>
                        <!-- Card type buku -->
                        <div class="book-type">
                            @if ($book->type == 'novel')
                            <a href="#" class="btn-type btn-novel">Novel</a>
                            @elseif ($book->type == 'pelajaran')
                            <a href="#" class="btn-type btn-pelajaran">Pelajaran</a>
                            @elseif ($book->type == 'lainnya')
                            <a href="#" class="btn-type btn-lainnya">Lainnya</a>
                            @endif
                        </div>
                        <!-- Akhir card type buku -->
                        <a href="{{ route('member.desc', ['id' => $book->id]) }}" class="btn-detail">Detail</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>

    <!-- Tambahkan bagian untuk card type buku -->
    <div class="book-type">
        <div class="type-card">
            <h3>Novel</h3>
            <button class="btn-type btn-novel">Novel</button>
        </div>
    </div>

    <div class="book-type">
        <div class="type-card">
            <h3>Pelajaran</h3>
            <button class="btn-type btn-pelajaran">Pelajaran</button>
        </div>
    </div>

    <div class="book-type">
        <div class="type-card">
            <h3>Lainnya</h3>
            <button class="btn-type btn-lainnya">Lainnya</button>
        </div>
    </div>
    <!-- Akhir bagian card type buku -->

    <div class="footer">
        <p>&copy; 2024 MillePus. All rights reserved.</p>
    </div>

    <script>
        document.getElementById('searchForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah form dari pengiriman

            var query = this.querySelector('input[name="q"]').value
                .toLowerCase(); // Dapatkan nilai dari input pencarian

            if (!query.trim()) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Search field cannot be empty!',
                    customClass: {
                        popup: 'monochrome-popup',
                        title: 'monochrome-title',
                        content: 'monochrome-content'
                    }
                });
                return; // Keluar dari fungsi jika query kosong
            }

            var books = document.querySelectorAll('.book'); // Dapatkan semua elemen buku
            var bookList = document.getElementById('bookList'); // Dapatkan div daftar buku
            var searchContainer = document.getElementById('searchContainer'); // Dapatkan elemen pencarian

            // Loop melalui setiap buku
            books.forEach(function(book) {
                var title = book.querySelector('h3').innerText.toLowerCase(); // Dapatkan judul buku
                var author = book.querySelector('p:nth-of-type(2)').innerText
                    .toLowerCase(); // Dapatkan pengarang buku

                // Periksa apakah judul buku atau pengarang buku cocok dengan query pencarian
                if (title.includes(query) || author.includes(query)) {
                    book.style.display = 'block'; // Tampilkan buku jika cocok
                } else {
                    book.style.display = 'none'; // Sembunyikan buku jika tidak cocok
                }
            });

            // Tampilkan daftar buku jika ada buku yang cocok dengan pencarian
            bookList.style.display = 'block';

            // Pindahkan elemen pencarian
            searchContainer.style.top = '20px'; // Sesuaikan nilai top sesuai kebutuhan
            searchContainer.style.bottom = 'auto'; // Hapus nilai bottom
        });
    </script>
    <script>
        function logout() {
            Swal.fire({
                title: 'Logout',
                text: 'Are you sure you want to logout?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, logout'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch('/logout', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                        })
                        .then(response => {
                            if (response.ok) {
                                window.location.href = '{{ route('login') }}';
                            } else {
                                console.error('Logout failed');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                }
            });
        }
    </script>

</body>

</html>
