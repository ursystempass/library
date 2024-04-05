<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrowing Details</title>
</head>
<body>
    <h1>Borrowing Details</h1>
    <a href="{{ route('borrowingdetails.create') }}">Add Borrowing Detail</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Borrowing ID</th>
                <th>Book Title</th>
                <th>Return Date</th>
                <th>Book Condition</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($borrowingDetails as $detail)
            <tr>
                <td>{{ $detail->id }}</td>
                <td>{{ $detail->borrowing_id }}</td>
                <td>{{ $detail->book->title }}</td>
                <td>{{ $detail->return_date }}</td>
                <td>{{ $detail->book_condition }}</td>
                <td>{{ $detail->created_at }}</td>
                <td>{{ $detail->updated_at }}</td>
                <td>
                    <a href="{{ route('borrowingdetails.edit', $detail->id) }}">Edit</a>
                    <form action="{{ route('borrowingdetails.destroy', $detail->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
