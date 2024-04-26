<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku</title>
    <!-- Panggil CSS external -->
    <link rel="stylesheet" href="{{ asset('css/desc.css') }}">
</head>
<body>
    <div class="container">
        <div class="box">
            <div class="image-container">
                <img src="{{ asset($book->image) }}" alt="{{ $book->title }}">
            </div>
            <div class="card">
                <div class="info-wrap">
                    <div class="title"> Judul: {{ $book->title }}</div>
                    <div class="author">Penulis: {{ $book->author }}</div>
                    <div class="publisher">Penerbit: {{ $book->publisher }}</div>
                    <div class="shelf-location">Rak: {{ $book->bookshelf->shelf_location  }}</div>
                    {{-- <td>{{ $book->bookshelf->shelf_location }}</td> --}}

                    {{-- <div class="quantity">Jumlah buku: {{ $totalQuantity }}</div> --}}
                    <form action="{{ route('borrow.book', ['bookId' => $book->id]) }}" method="POST">
                        @csrf
                        {{-- <button type="submit" class="btn btn-primary">Pinjam</button> --}}
                    </form>
                    <a href="/catalog" class="btn btn-warning">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
