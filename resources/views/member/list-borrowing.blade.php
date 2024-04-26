<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Borrowing</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #9370db, #add8e6);
            /* Gradasi warna baru */
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 0 20px;
        }

        .catalog {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
        }

        .book {
            width: calc(25% - 20px);
            /* 4 books per row with spacing */
            margin: 20px;
            background-color: #fff;
            /* Book background color */
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
            /* Added shadow for 3D effect */
            border-radius: 10px;
            /* Rounded corners for a smoother look */
            text-align: center;
            /* Center-align the content */
        }

        .book img {
            max-width: 100%;
            max-height: 200px;
            /* Max height of book cover */
            height: auto;
            margin-bottom: 10px;
        }

        .book-details {
            text-align: center;
        }

        .book-details h3 {
            margin-top: 10px;
            font-size: 1.2em;
            color: #333;
        }

        .book-details p {
            color: #666;
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="catalog">
            <!-- Tampilkan setiap buku yang dipinjam -->
            @foreach ($borrowedBooks as $book)
                <div class="book">
                    @if ($book->borrowingDetails->isNotEmpty() && $book->borrowingDetails->first()->borrowing)
                        <img src="{{ (new \chillerlan\QRCode\QRCode())->render($book->borrowingDetails->first()->borrowing->borrow_code) }}" alt="QR">
                    @endif
                    <div class="book-details">
                        <h3>{{ $book->title }}</h3>
                        <p>{{ $book->author }}</p>
                        <p>{{ $book->publisher }}</p>
                        <!-- Tambahkan tombol atau link lainnya sesuai kebutuhan -->
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
