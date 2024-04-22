<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Type</title>
    <link rel="stylesheet" href="{{ asset('css/catalog.css') }}">
</head>
<body>

<div class="header">
    <h1>Type</h1>
</div>

<div class="container">
    <div id="bookList">
        <div class="catalog">
            @foreach ($books as $book)
            <div class="book">
                @if($book->image)
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
                    <a href="{{ route('member.desc', ['id' => $book->id]) }}" class="btn-detail">Detail</a>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>

</body>
</html>
