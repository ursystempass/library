<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.partials.head')
</head>

<body>
    <div class="container-scroller">
        <!-- Include navbar -->
        @include('layouts.partials.navbar')

        <div class="container-fluid page-body-wrapper">
            <!-- Include sidebar -->
            @include('layouts.partials.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Daftar Pengguna</h4>
                                <!-- <button type="button" class="btn btn-gradient-primary btn-sm">Tambah Pengguna</button> -->
                                <a href="{{ route('books.create') }}" class="btn btn-gradient-primary">Tambah
                                    Pengguna</a>
                                <div class="table-responsive"> <!-- Tambahkan kelas table-responsive di sini -->
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>ISBN</th>
                                                <th>Book Code</th>
                                                <th>Image</th>
                                                <th>Category</th>
                                                <th>Publisher</th>
                                                <th>Author</th>
                                                <th>Publication Year</th>
                                                <th>Condition</th>
                                                {{-- <th>Book Shelf</th> --}}
                                                <th>Copy Number</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($books as $book)
                                                <tr>
                                                    <td>{{ $book->title }}</td>
                                                    <td>{{ $book->isbn }}</td>
                                                    <td>{{ $book->book_code }}</td>
                                                    <td>{{ $book->image }}</td>
                                                    <td>{{ $book->book_category }}</td>
                                                    <td>{{ $book->publisher }}</td>
                                                    <td>{{ $book->author }}</td>
                                                    <td>{{ $book->publication_year }}</td>
                                                    <td>{{ $book->condition }}</td>
                                                    <td>{{ $book->copy_number }}</td>
                                                    <td>
                                                        <!-- Tambahkan tombol untuk edit dan delete -->
                                                        <a href="{{ route('books.edit', $book->id) }}"
                                                            class="btn btn-info btn-sm">Edit</a>
                                                        <form action="{{ route('books.destroy', $book->id) }}"
                                                            method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
