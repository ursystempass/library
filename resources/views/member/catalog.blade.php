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
    </style>
</head>

<body>
    <div class="header">
        <h1>Perpustakaan SMKN 1 Cibinong</h1>
        <div class="header-icons">
            <button id="logoutButton" onclick="logout()" class="logout-btn">Logout</button> <!-- Tombol Logout -->
            <i class="fas fa-bell" onclick="redirectToBorrowedBooks()"></i> <!-- Icon notifikasi -->
            <i class="fas fa-user"></i> <!-- Icon profil -->
            <i class="fas fa-barcode" onclick="redirectToBarcode({{ auth()->user()->booking_id }})"></i> <!-- Ikon barcode -->
        </div>
    </div>

    <div class="container">
        <form class="search-container" id="searchForm">
            <input type="text" placeholder="Search..." name="q">
            <button type="submit">Search</button>
        </form>
        {{-- <button id="logoutButton" onclick="logout()" class="logout-btn">
            Logout
        </button> --}}
        <div class="type-list">
            <!-- Tampilkan jenis buku sebagai card -->
            @foreach ($types as $type)
            <div class="type-card" onclick="redirectToBookType({{ $type->id }})">
                <h3>{{ $type->name }}</h3>
            </div>
            @endforeach
        </div>

        <!-- Daftar buku (akan dimunculkan setelah pencarian dilakukan) -->
        <div class="container">
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
                                <a href="{{ route('member.desc', ['id' => $book->id]) }}" class="btn-detail">Detail</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    </div>

    <div class="footer">
	@@ -50,11 +64,11 @@

    <script>
        document.getElementById('searchForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah form dari pengiriman
            var query = this.querySelector('input[name="q"]').value.toLowerCase(); // Dapatkan nilai dari input pencarian
            if (!query.trim()) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Please enter a search query',
                    confirmButtonColor: '#3085d6',
                });
                return; // Keluar dari fungsi jika query kosong
            }
            var books = document.querySelectorAll('.book'); // Dapatkan semua elemen buku
            var bookList = document.getElementById('bookList'); // Dapatkan div daftar buku
            // Loop melalui setiap buku
            books.forEach(function(book) {
                var title = book.querySelector('h3').innerText.toLowerCase(); // Dapatkan judul buku
                var author = book.querySelector('p:nth-of-type(2)').innerText.toLowerCase(); // Dapatkan pengarang buku
                // Periksa apakah judul buku atau pengarang buku cocok dengan query pencarian
                if (title.includes(query) || author.includes(query)) {
                    book.style.display = 'block'; // Tampilkan buku jika cocok
                } else {
                    book.style.display = 'none'; // Sembunyikan buku jika tidak cocok
                }
            });
            // Tampilkan daftar buku jika ada buku yang cocok dengan pencarian
            bookList.style.display = 'block';
        });
    </script>
<script>
    function redirectToBarcode(bookingId) {
        window.location.href = '{{ route('barcode') }}/' + bookingId;
    }
</script>
<script>
    function redirectToBookType(typeId) {
        window.location.href = '{{ route('member.book_type', ['type_id' => ':type_id']) }}'.replace(':type_id', typeId);
    }
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
<script>
    function redirectToBorrowedBooks() {
        window.location.href = '{{ route('list.borrowed.books') }}';
    }
</script>

</body>

</html>
