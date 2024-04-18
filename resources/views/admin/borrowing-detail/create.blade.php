<!-- resources/views/admin/borrowing-detail/create.blade.php -->

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
            <label for="due_date">Due Date:</label>
            <input type="date" name="due_date" id="due_date" value="{{ $dueDate }}" readonly>
        </div>
        <div>
            <label for="type">Type:</label>
            <select name="type" id="type">
                <option value="personal">Personal</option>
                <option value="monthly">Monthly</option>
                <option value="annual">Annual</option>
            </select>
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
