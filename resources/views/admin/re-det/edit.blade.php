<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Return Detail</title>
</head>
<body>
    <h1>Edit Return Detail</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('redets.update', ['redet' => $returnDetail->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="return_back_id">Return Back:</label>
            <select id="return_back_id" name="return_back_id" required>
                <option value="">Select Return Back</option>
                @foreach ($returnBacks as $returnBack)
                    <option value="{{ $returnBack->id }}" {{ $returnDetail->return_back_id == $returnBack->id ? 'selected' : '' }}>{{ $returnBack->return_code }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="borrow_id">Borrowing Code:</label>
            <select id="borrow_id" name="borrow_id" required>
                <option value="">Select Borrowing</option>
                @foreach ($borrowings as $borrowing)
                    <option value="{{ $borrowing->id }}" {{ $returnDetail->borrow_id == $borrowing->id ? 'selected' : '' }}>{{ $borrowing->borrow_code }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="fine">Fine:</label>
            <input type="number" id="fine" name="fine" value="{{ $returnDetail->fine }}" required>
        </div>
        <button type="submit">Update Return Detail</button>
    </form>
</body>
</html>
