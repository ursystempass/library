<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Borrowing Detail</title>
</head>
<body>
    <h1>Create Borrowing Detail</h1>
    <form method="POST" action="{{ route('borrowingdetails.store') }}">
        @csrf
        <div>
            <label for="borrowing_id">Borrowing:</label>
            <select name="borrowing_id" id="borrowing_id">
                @foreach($borrowings as $borrowing)
                    <option value="{{ $borrowing->id }}">{{ $borrowing->borrow_code }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="book_id">Book:</label>
            <select name="book_id" id="book_id">
                @foreach($books as $book)
                    <option value="{{ $book->id }}">{{ $book->book_code }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="return_date">Return Date:</label>
            <input type="date" name="return_date" id="return_date">
        </div>
        <div>
            <label for="book_condition">Book Condition:</label>
            <select name="book_condition" id="book_condition">
                <option value="good">Good</option>
                <option value="damaged">Damaged</option>
            </select>
        </div>
        <button type="submit">Create Borrowing Detail</button>
    </form>
</body>
</html>
