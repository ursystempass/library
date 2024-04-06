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
                                        <label for="quantity">Jumlah Siswa</label>
                                        <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $class->quantity }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="academic_year">Tahun Ajaran</label>
                                        <input type="text" class="form-control" id="academic_year" name="academic_year" value="{{ $class->academic_year }}">
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
