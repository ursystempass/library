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
                                <h4 class="card-title">Form User</h4>
                                <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <p class="card-description">Informasi Pengguna</p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Kode User</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="kode_user" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">NIS</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="nis" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Fullname</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="fullname" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Username</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="username" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Password</label>
                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" name="password" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Kelas</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="kelas" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Image</label>
                                                <div class="col-sm-9">
                                                    <input type="file" class="form-control-file" name="image" accept="image/*">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Alamat</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="alamat" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Verif</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="verif" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Role</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="role" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Join Date</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="join_date" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Terakhir Login</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="terakhir_login" />
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
