<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temukan Buku Favor</title>
    <link rel="stylesheet" href="{{ asset('css/catalog.css') }}">
    <!-- Sertakan skrip SweetAlert di sini -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <div class="header">
        <h1>Temukan Buku Favor</h1>
    </div>

    <div class="container">
        <div id="bookList">
            <div class="catalog">
                @foreach ($books as $book)
                    <div class="book">
                        @if ($book->image)
                            <img src="{{ asset($book->image) }}" alt="{{ $book->title }}">
                        @else
                            <img src="{{ asset('images/default-book.jpg') }}" alt="Default Book Image">
                        @endif
                        <div class="book-details">
                            <h3>{{ $book->title }}</h3>
                            <p>{{ $book->author }}</p>
                            <p>{{ $book->publisher }}</p>
                            <div class="bottom-wrap">
                                <!-- Detail button -->
                                <form action="{{ route('member.desc', ['id' => $book->id]) }}" method="GET"
                                    style="margin-right: 10px;">
                                    @csrf
                                    <button type="submit" class="btn btn-info">Detail</button>
                                </form>

                                <!-- Pinjam button -->
                                <form action="{{ route('borrow.book', ['bookId' => $book->id]) }}" method="POST">
                                    @csrf
                                    <!-- Pinjam button -->
                                    <button type="button" class="btn btn-warning borrowBtn"
                                        data-book-id="{{ $book->id }}">Pinjam</button>
                                </form>

                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        // Ambil semua tombol "Pinjam"
        const borrowBtns = document.querySelectorAll('.borrowBtn');

        // Tambahkan event listener untuk klik pada setiap tombol "Pinjam"
        borrowBtns.forEach(btn => {
            btn.addEventListener('click', function(event) {
                event.preventDefault(); // Mencegah perilaku default dari tombol submit

                const bookId = this.getAttribute('data-book-id');

                // Kirim permintaan AJAX untuk memperbarui status buku menjadi "booking"
                fetch(`/borrow/book/${bookId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Gagal memperbarui status buku.');
                    }
                    // Tampilkan notifikasi sukses
                    Swal.fire(
                        'Sukses!',
                        'Buku berhasil dipinjam.',
                        'success'
                    ).then(() => {
                        // Tampilkan pesan untuk kembali ke halaman katalog
                        Swal.fire({
                            title: 'Proses Peminjaman Berhasil',
                            text: 'Silahkan kembali ke halaman catalog untuk mendapatkan barcode',
                            icon: 'info',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Arahkan pengguna ke halaman katalog
                                window.location.href = '/catalog';
                            }
                        });
                    });
                })
                .catch(error => {
                    console.error('Terjadi kesalahan:', error);
                });
            });
        });
    </script>


</body>

</html>
