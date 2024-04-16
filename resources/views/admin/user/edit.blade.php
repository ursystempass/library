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
                                <h4 class="card-title">Edit Pengguna</h4>
                                <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="kode_user">Kode User</label>
                                        <input type="text" class="form-control" id="kode_user" name="kode_user" placeholder="Kode User" value="{{ $user->kode_user }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nis">NIS</label>
                                        <input type="text" class="form-control" id="nis" name="nis" placeholder="NIS" value="{{ $user->nis }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="fullname">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nama Lengkap" value="{{ $user->fullname }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="{{ $user->alamat }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select class="form-control" id="role" name="role">
                                            <option value="member" {{ $user->role == 'member' ? 'selected' : '' }}>Member</option>
                                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="join_date">Tanggal Bergabung</label>
                                        <input type="datetime-local" class="form-control" id="join_date" name="join_date" value="{{ date('Y-m-d\TH:i', strtotime($user->join_date)) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="major_id">Jurusan</label>
                                        <select class="form-control" id="major_id" name="major_id">
                                            <option value="">Pilih Jurusan</option>
                                            @foreach($majors as $major)
                                                <option value="{{ $major->id }}" {{ $user->major_id == $major->id ? 'selected' : '' }}>{{ $major->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="class_id">Kelas</label>
                                        <select class="form-control" id="class_id" name="class_id">
                                            <option value="">Pilih Kelas</option>
                                            @foreach($classes as $class)
                                                <option value="{{ $class->id }}" {{ $user->class_id == $class->id ? 'selected' : '' }}>{{ $class->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-gradient-primary mr-2">Simpan</button>
                                    <a href="{{ route('users.index') }}" class="btn btn-light">Batal</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
