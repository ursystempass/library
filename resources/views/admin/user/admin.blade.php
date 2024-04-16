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
                                @if(auth()->user()->role === 'admin')
                                <!-- Tampilan admin -->
                                <h4>Selamat datang, Admin!</h4>
                                <!-- Tambahkan elemen HTML khusus untuk admin di sini -->

                                <h4 class="card-title">Daftar Pengguna (Admin Only)</h4>
                                <a href="{{ route('users.create') }}" class="btn btn-gradient-primary">Tambah Pengguna</a>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Kode User</th>
                                                <th>NIS</th>
                                                <th>Nama Lengkap</th>
                                                <th>Role</th>
                                                <th>Tanggal Bergabung</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->kode_user }}</td>
                                                <td>{{ $user->nis }}</td>
                                                <td>{{ $user->fullname }}</td>
                                                <td>{{ ucfirst($user->role) }}</td>
                                                <td>{{ $user->join_date }}</td>
                                                <td>
                                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm">Edit</a>
                                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary btn-sm">Detail</a>
                                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Akhir dari tampilan admin -->
                                @else
                                <!-- Tampilan untuk pengguna lainnya -->
                                <h4>Selamat datang, {{ auth()->user()->fullname }}!</h4>
                                <!-- Tambahkan elemen HTML khusus untuk pengguna lainnya di sini -->
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
