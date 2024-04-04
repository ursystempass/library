<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Book Shelf</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Create Book Shelf</h1>
        <form action="{{ route('bookshelves.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="shelf_number">Shelf Number:</label>
                <input type="text" class="form-control" id="shelf_number" name="shelf_number">
            </div>

            <div class="form-group">
                <label for="shelf_location">Shelf Location:</label>
                <input type="text" class="form-control" id="shelf_location" name="shelf_location">
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</body>
</html>
