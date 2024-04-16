<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Borrowing Detail</title>
</head>
<body>
    <h1>Edit Borrowing Detail</h1>
    <form method="POST" action="{{ route('borrowingdetails.update', $borrowingDetail->id) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="borrowing_id">Borrowing:</label>
            <select name="borrowing_id" id="borrowing_id">
                @foreach($borrowings as $borrowing)
                    <option value="{{ $borrowing->id }}" {{ $borrowingDetail->borrowing_id == $borrowing->id ? 'selected' : '' }}>{{ $borrowing->borrow_code }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="book_id">Book:</label>
            <select name="book_id" id="book_id">
                @foreach($books as $book)
                    <option value="{{ $book->id }}" {{ $borrowingDetail->book_id == $book->id ? 'selected' : '' }}>{{ $book->book_code }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="return_date">Return Date:</label>
            <input type="date" name="return_date" id="return_date" value="{{ $borrowingDetail->return_date }}">
        </div>
        <div>
            <label for="type">Type:</label>
            <select name="type" id="type">
                <option value="personal" {{ old('type', $borrowingDetail->type) === 'personal' ? 'selected' : '' }}>Personal</option>
                <option value="monthly" {{ old  ('type', $borrowingDetail->type) === 'monthly' ? 'selected' : '' }}>Monthly</option>
                <option value="annual" {{ old('type', $borrowingDetail->type) === 'annual' ? 'selected' : '' }}>Annual</option>
            </select>
        </div>

        <div>
            <label for="book_condition">Book Condition:</label>
            <select name="book_condition" id="book_condition">
                <option value="good" {{ $borrowingDetail->book_condition == 'good' ? 'selected' : '' }}>Good</option>
                <option value="damaged" {{ $borrowingDetail->book_condition == 'damaged' ? 'selected' : '' }}>Damaged</option>
            </select>
        </div>
        <button type="submit">Update Borrowing Detail</button>
    </form>
</body>
</html>
