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
                                <a href="{{ route('users.create') }}" class="btn btn-gradient-primary">Tambah
                                    Pengguna</a>
                                <div class="table-responsive"> <!-- Tambahkan kelas table-responsive di sini -->
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Gambar</th>
                                                <th>Kode User</th>
                                                <th>NIS</th>
                                                <th>Nama Lengkap</th>
                                                <th>Peranan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>
                                                        <img src="{{ asset($user->image) }}">
                                                    </td>
                                                    <td>{{ $user->kode_user }}</td>
                                                    <td>{{ $user->nis }}</td>
                                                    <td>{{ $user->fullname }}</td>
                                                    <td>{{ ucfirst($user->role) }}</td>
                                                    <td>{{ $user->join_date }}</td>
                                                    <td>
                                                        <!-- Tambahkan tombol untuk edit dan delete -->
                                                        <a href="{{ route('users.edit', $user->id) }}"
                                                            class="btn btn-info btn-sm">Edit</a>
                                                        <form action="{{ route('users.destroy', $user->id) }}"
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
