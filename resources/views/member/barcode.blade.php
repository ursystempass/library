<!DOCTYPE html>
<html>
<head>
    <title>Barcode Page</title>
    <!-- Include necessary CSS styles here -->
    <style>
        /* Style the barcode container */
        .barcode-container {
            text-align: center;
            margin-top: 20px;
        }
        /* Style the barcode image */
        .barcode-image {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Barcodes for Book Bookings</h2>
    @foreach($bookings as $booking)
        <div class="barcode-container">
            <h3>Booking ID: {{ $booking->id }}</h3>
            <!-- Include the barcode image here -->
            <img class="barcode-image" src="{{ $booking->barcode }}" alt="Barcode for Booking {{ $booking->id }}">
            <p>{{ $booking->book->title }}</p> <!-- Assuming you have a relationship to get the book's title -->
        </div>
    @endforeach
</div>

</body>
</html>
