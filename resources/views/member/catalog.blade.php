<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Catalog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Font Awesome CSS -->
    <!-- Include SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="{{ asset('css/catalog.css') }}">
</head>

<body>

    <div class="header">
        <button id="logoutButton" onclick="logout()" class="logout-btn">
            Logout
        </button>
        <h1>Perpustakaan SMKN 1 Cibinong</h1>
        <div class="header-icons">
            <i class="fas fa-bell"></i>
            <i class="fas fa-user"></i>
        </div>
    </div>

    <div class="container">

        <form class="search-container" id="searchForm">
            <input type="text" placeholder="Search..." name="q">
            <button type="submit">Search</button>
        </form>

        <div class="catalog">
            <!-- Book 1 -->
            <div class="book">
                <img src="book1.jpg" alt="Book 1">
                <h3>Book 1 Title</h3>
                <p>Jumlah Peminjam: 50</p>
                <p>Jumlah Buku: 100</p>
            </div>
            <div class="book">
                <img src="book1.jpg" alt="Book 1">
                <h3>Book 1 Title</h3>
                <p>Jumlah Peminjam: 50</p>
                <p>Jumlah Buku: 100</p>
            </div>
            <div class="book">
                <img src="book1.jpg" alt="Book 1">
                <h3>Book 1 Title</h3>
                <p>Jumlah Peminjam: 50</p>
                <p>Jumlah Buku: 100</p>
            </div>
            <!-- Book 2 -->
            <div class="book">
                <img src="book2.jpg" alt="Book 2">
                <h3>Book 2 Title</h3>
                <p>Jumlah Peminjam: 30</p>
                <p>Jumlah Buku: 80</p>
            </div>
            <!-- Add more books as needed -->
        </div>

    </div>

    <div class="footer">
        <p>&copy; 2024 MillePus. All rights reserved.</p>
    </div>

    <script>
        document.getElementById('searchForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting

            var query = this.querySelector('input[name="q"]').value; // Get the value from the search input

            // Example: Check if the query is empty, if so, show a SweetAlert
            if (!query.trim()) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Search field cannot be empty!',
                    customClass: {
                        popup: 'monochrome-popup',
                        title: 'monochrome-title',
                        content: 'monochrome-content'
                    }
                });
                return; // Exit the function
            }

            // You can perform an actual search here
            // If no results found, you can show a SweetAlert as well
            // For demonstration, we'll simply show "Book not found" if the query is not empty but no actual search is performed
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Book not found',
                customClass: {
                    popup: 'monochrome-popup',
                    title: 'monochrome-title',
                    content: 'monochrome-content'
                }
            });
        });
    </script>
    <script>
        function logout() {
            fetch('/logout', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                })
                .then(response => {
                    if (response.ok) {
                        window.location.href = '{{ route('login') }}';
                    } else {
                        console.error('Logout failed');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>

</body>

</html>
