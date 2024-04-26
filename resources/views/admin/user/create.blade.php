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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Create New User</h4>
                                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="kode_user">Kode User</label>
                                        <input type="text" class="form-control" id="kode_user" name="kode_user" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="nis">NIS</label>
                                        <input type="text" class="form-control" id="nis" name="nis" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="fullname">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="fullname" name="fullname" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" id="alamat" name="alamat" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="role">Peranan</label>
                                        <select class="form-control" id="role" name="role" required>
                                            <option value="admin">Admin</option>
                                            <option value="member">Member</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="join_date">Tanggal Bergabung</label>
                                        <input type="text" class="form-control" id="join_date" name="join_date" value="{{ date('Y-m-d') }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="major_id">Jurusan</label>
                                        <select class="form-control" id="major_id" name="major_id">
                                            <option value="" disabled selected>Select Major</option>
                                            @foreach ($majors as $major)
                                                <option value="{{ $major->id }}">{{ $major->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="class_id">Kelas</label>
                                        <select class="form-control" id="class_id" name="class_id">
                                            <option value="" disabled selected>Select Class</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}">{{ $class->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                    </div>
                                    <button type="submit" class="btn btn-gradient-primary me-2">Create User</button>
                                    <a href="{{ route('users.index') }}" class="btn btn-light">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Menghapus script yang menyebabkan reload -->
</body>

</html>
