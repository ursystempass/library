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
                            {{-- <div class="col-md-3 col-xs-3">
                                <span class="quantity">Jumlah buku: {{ $totalQuantity }}</span>
                            </div> --}}
                        </div>
                    </figcaption>
                </div>
                <!-- Tambahkan tombol "Pinjam" di halaman deskripsi buku -->
                <div class="bottom-wrap">
                    <form action="{{ route('borrow.book', ['bookId' => $book->id]) }}" method="POST">
                        @csrf
                        {{-- <button type="submit" class="btn btn-primary float-right">Pinjam</button> --}}
                    </form>
                    <a href="/catalog" class="btn btn-warning float-left">Kembali</a>
                </div>

            </figure>
        </div>
    @endisset


</body>

</html>
