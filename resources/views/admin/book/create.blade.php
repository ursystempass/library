<!-- resources/views/books/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Book</title>
</head>
<body>
    <h1>Create Book</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="{{ old('title') }}"><br>

        <label for="isbn">ISBN:</label><br>
        <input type="text" id="isbn" name="isbn" value="{{ old('isbn') }}"><br>

        <label for="book_code">Book Code:</label><br>
        <input type="text" id="book_code" name="book_code" value="{{ old('book_code') }}"><br>

        <label for="image">Image:</label><br>
        <input type="file" id="image" name="image"><br>

        <label for="book_category">Category:</label><br>
        <input type="text" id="book_category" name="book_category" value="{{ old('book_category') }}"><br>

        <label for="publisher">Publisher:</label><br>
        <input type="text" id="publisher" name="publisher" value="{{ old('publisher') }}"><br>

        <label for="author">Author:</label><br>
        <input type="text" id="author" name="author" value="{{ old('author') }}"><br>

        <label for="publication_year">Publication Year:</label><br>
        <input type="text" id="publication_year" name="publication_year" value="{{ old('publication_year') }}"><br>

        <label for="condition">Condition:</label><br>
        <select id="condition" name="condition">
            <option value="good" {{ old('condition') == 'good' ? 'selected' : '' }}>Good</option>
            <option value="damaged" {{ old('condition') == 'damaged' ? 'selected' : '' }}>Damaged</option>
        </select><br>

        <label for="bookshel_id">Shelf Location:</label><br> <!-- Ganti bookshel_id menjadi shelf_location_id -->
        <select id="shelf_location_id" name="shelf_location_id">
            @foreach ($bookshelves as $bookshelf)
                <option value="{{ $bookshelf->id }}">{{ $bookshelf->shelf_location }}</option>
            @endforeach
        </select><br>

        <label for="copy_number">Copy Number:</label><br>
        <input type="text" id="copy_number" name="copy_number" value="{{ old('copy_number') }}"><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
