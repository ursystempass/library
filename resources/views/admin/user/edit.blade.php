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
                                <h4 class="card-title">Edit User</h4>
                                <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="kode_user">Kode User</label>
                                        <input type="text" class="form-control" id="kode_user" name="kode_user" value="{{ $user->kode_user }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="nis">NIS</label>
                                        <input type="text" class="form-control" id="nis" name="nis" value="{{ $user->nis }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="fullname">Fullname</label>
                                        <input type="text" class="form-control" id="fullname" name="fullname" value="{{ $user->fullname }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" id="alamat" name="alamat" required>{{ $user->alamat }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select class="form-control" id="role" name="role" required>
                                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                            <option value="member" {{ $user->role === 'member' ? 'selected' : '' }}>Member</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="join_date">Join Date</label>
                                        <!-- Tampilkan nilai join date dari data user -->
                                        <input type="text" class="form-control" id="join_date" name="join_date" value="{{ $user->join_date }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="major_id">Major</label>
                                        <select class="form-control" id="major_id" name="major_id">
                                            <option value="" disabled>Select Major</option>
                                            @foreach ($majors as $major)
                                                <option value="{{ $major->id }}" {{ $user->major_id === $major->id ? 'selected' : '' }}>{{ $major->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="class_id">Class</label>
                                        <select class="form-control" id="class_id" name="class_id">
                                            <option value="" disabled>Select Class</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}" {{ $user->class_id === $class->id ? 'selected' : '' }}>{{ $class->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-gradient-primary me-2">Update User</button>
                                    <a href="{{ route('users.index') }}" class="btn btn-light">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include any additional scripts or JavaScript here if needed -->
</body>

</html>
