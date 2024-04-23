<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temukan Buku Favor</title>
    <link rel="stylesheet" href="{{ asset('css/catalog.css') }}">
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
                            {{-- <p>Rak: {{ $book->shelf_location_id }}</p> --}}
                            {{-- <p class="book-quantity">Jumlah buku: {{ $book->quantity }}</p> --}}
                            {{-- <p class="book-quantity">Jumlah buku: {{ $book->quantity }}</p> --}}
                            {{-- <p class="book-quantity">Jumlah buku: {{ $book->quantity }}</p> --}}
                            {{-- <p class="book-quantity">Jumlah buku: {{ $book->quantity }}</p> --}}
                            {{-- <p class="book-quantity">Jumlah buku: {{ $book->quantity }}</p> --}}
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
                                    <button type="submit" class="btn btn-warning">Pinjam</button>
                                </form>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        // Ambil tombol pinjam
        const borrowBtn = document.getElementById('borrowBtn');

        // Tambahkan event listener untuk klik pada tombol pinjam
        borrowBtn.addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah perilaku default dari link

            // Tampilkan notifikasi sukses terlebih dahulu
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
        });
    </script>
</body>

</html>
