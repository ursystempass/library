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
                                <h4 class="card-title">Edit Kelas</h4>
                                <form action="{{ route('classes.update', $class->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="nama">Nama Kelas</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $class->nama }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="wali">Nama Wali Kelas</label>
                                        <input type="text" class="form-control" id="wali" name="wali" value="{{ $class->wali }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah">Jumlah Siswa</label>
                                        <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $class->jumlah }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="tahun_ajaran">Tahun Ajaran</label>
                                        <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" value="{{ $class->tahun_ajaran }}">
                                    </div>
                                    <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
                                    <a href="{{ route('classes.index') }}" class="btn btn-light">Cancel</a>
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
