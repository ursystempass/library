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
            @foreach($groupedBooks as $groupedBook)
                <div class="book">
                    <h3>{{ $groupedBook->title }}</h3>
                    <p class="book-quantity">Jumlah Buku: {{ $groupedBook->total_books }}</p>
                    <a href="{{ route('member.desc', ['id' => $groupedBook->title]) }}" class="detail-button">Detail</a>
                </div>
            @endforeach
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
        Swal.fire({
            title: 'Logout',
            text: 'Are you sure you want to logout?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, logout'
        }).then((result) => {
            if (result.isConfirmed) {
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
        });
    }
</script>


</body>

</html>
