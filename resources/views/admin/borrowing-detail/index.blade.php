{{-- <!DOCTYPE html>
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
                <th>Due Date</th>
                <th>Book Condition</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($borrowingDetails as $detail)
            <tr>
                <td>{{ $detail->id }}</td>
                <td>{{ optional($detail->borrowing->book)->title }}</td>
                <td>{{ $detail->due_date }}</td>
                <td>{{ $detail->book_condition }}</td>
                <td>{{ $detail->type }}</td>
                <td>
                    <a href="{{ route('borrowingdetails.edit', $detail->id) }}">Edit</a>
                    <form action="{{ route('borrowingdetails.updateStatus', $detail->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="type" value="borrow"> <!-- Tambahkan input hidden untuk menentukan status -->
                        <button type="submit">Change to Borrow</button>
                    </form>
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
</html> --}}


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
                                <h4 class="card-title">Daftar Peminjaman</h4>
                                <!-- <button type="button" class="btn btn-gradient-primary btn-sm">Tambah Pengguna</button> -->
                                <a href="{{ route('borrowingdetails.create') }}" class="btn btn-gradient-primary">Tambah
                                    Peminjaman</a>
                                <div class="table-responsive"> <!-- Tambahkan kelas table-responsive di sini -->
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Judul Buku</th>
                                                <th>Tanggal Pengembalian</th>
                                                <th>Kondisi Buku</th>
                                                <th>Tipe Peminjaman</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($borrowingDetails as $detail)
                                                <tr>
                                                    <td>{{ optional($detail->borrowing->book)->title }}</td>
                                                    <td>{{ $detail->due_date }}</td>
                                                    <td>{{ $detail->book_condition }}</td>
                                                    <td>{{ $detail->type }}</td>
                                                    <td>
                                                        <!-- Tambahkan tombol untuk edit dan delete -->
                                                        <a href="{{ route('borrowingdetails.edit', $detail->id) }}"
                                                            class="btn btn-info btn-sm">Edit</a>
                                                        <form action="{{ route('borrowingdetails.destroy', $detail->id) }}"
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
