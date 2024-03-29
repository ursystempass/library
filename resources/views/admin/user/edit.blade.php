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
                                <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <p class="card-description">User Information</p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Kode User</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="user_code"
                                                        value="{{ $user->user_code }}" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">NIS</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="nis"
                                                        value="{{ $user->nis }}" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Fullname</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="fullname"
                                                        value="{{ $user->fullname }}" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Password</label>
                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" name="password"
                                                        placeholder="Enter New Password" />
                                                    <small class="text-muted">Leave blank to keep the old password.</small>
                                                </div>
                                            </div>
                                        </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Image</label>
                                                <div class="col-sm-9">
                                                    <input type="file" class="form-control-file" name="image"
                                                        accept="image/*">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Alamat</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="address"
                                                        value="{{ $user->address }}" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Role</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="role">
                                                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                                        <option value="member" {{ $user->role == 'member' ? 'selected' : '' }}>Member</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Join Date</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="join_date"
                                                        value="{{ $user->join_date }}" readonly />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                                    <a href="{{ route('users.index') }}" class="btn btn-light">Cancel</a>
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
