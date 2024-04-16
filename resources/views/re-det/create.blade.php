<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Return Detail</title>
</head>
<body>
    <h1>Create Return Detail</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('redets.store') }}">
        @csrf
        <div>
            <label for="return_back_id">Return Back:</label>
            <select id="return_back_id" name="return_back_id" required>
                <option value="">Select Return Back</option>
                @foreach ($returnBacks as $returnBack)
                    <option value="{{ $returnBack->id }}">{{ $returnBack->return_code }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="borrow_id">Borrowing Code:</label>
            <select id="borrow_id" name="borrow_id" required>
                <option value="">Select Borrowing</option>
                @foreach ($borrowings as $borrowing)
                    <option value="{{ $borrowing->id }}">{{ $borrowing->borrow_code }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="fine">Fine:</label>
            <input type="number" id="fine" name="fine" value="{{ old('fine') }}" required>
        </div>
        <button type="submit">Create Return Detail</button>
    </form>
</body>
</html>