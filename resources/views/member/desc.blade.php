<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Document</title>
    <!-- Panggil CSS external -->
    <link rel="stylesheet" href="{{ asset('css/desc.css') }}">
</head>

<body>
    <!-- Konten HTML Anda -->
    @isset($book)
        @php
            $totalQuantity = $book->groupedBooks ? $book->groupedBooks->sum('jumlah_buku') : 0;
        @endphp
        <div class="container d-flex justify-content-center">
            <figure class="card card-product-grid card-lg">
                <a href="#" class="img-wrap" data-abc="true">
                    <img src="{{ asset($book->image) }}" alt="{{ $book->title }}">
                </a>
                <figcaption class="info-wrap">
                    <div class="row">
                        <div class="col-md-9 col-xs-9">
                            <a href="#" class="title" data-abc="true">{{ $book->title }}</a>
                            <span class="author">{{ $book->author }}</span>
                        </div>
                        <div class="col-md-3 col-xs-3">
                            <span class="publisher">{{ $book->publisher }}</span>
                        </div>
                    </div>
                </figcaption>
                <div class="bottom-wrap-payment">
                    <figcaption class="info-wrap">
                        <div class="row">
                            <div class="col-md-9 col-xs-9">
                                <span class="shelf-location">Rak: {{ $book->shelf_location_id }}</span>
                            </div>
                            <div class="col-md-3 col-xs-3">
                                <span class="quantity">Jumlah buku: {{ $totalQuantity }}</span>
                            </div>
                        </div>
                    </figcaption>
                </div>
                <div class="bottom-wrap">
                    <a href="#" class="btn btn-primary float-right" data-abc="true" id="borrowBtn">Pinjam</a>
                    <a href="#" class="btn btn-warning float-left" data-abc="true">Cancel</a>
                </div>
            </figure>
        </div>
    @endisset

    <script>
        // Ambil tombol pinjam
        const borrowBtn = document.getElementById('borrowBtn');

        // Tambahkan event listener untuk klik pada tombol pinjam
        borrowBtn.addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah perilaku default dari link

            // Tampilkan SweetAlert untuk konfirmasi peminjaman
            Swal.fire({
                title: 'Konfirmasi Peminjaman',
                text: 'Apakah Anda yakin ingin meminjam buku ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Pinjam',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna mengonfirmasi, lakukan aksi peminjaman di sini
                    // Misalnya, Anda dapat membuat permintaan AJAX untuk mengirim data peminjaman ke server
                    // dan menangani logika peminjaman di sisi server
                    // Setelah itu, Anda dapat menampilkan pesan sukses atau pesan yang sesuai dari server menggunakan Swal.fire
                    Swal.fire(
                        'Sukses!',
                        'Buku berhasil dipinjam.',
                        'success'
                    );
                }
            });
        });
    </script>

</body>

</html>
