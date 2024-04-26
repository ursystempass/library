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
                                <h4 class="card-title">Edit Setelan</h4>
                                <form action="{{ route('settings.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="name" class="form-control" value="{{ $setting->name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Gambar</label>
                                        @if($setting->image)
                                            <!-- Tampilkan gambar yang sudah ada jika ada -->
                                            <img src="{{ asset($setting->image) }}" alt="Current Image" class="mt-2" style="max-width: 200px;">
                                        @else
                                            <!-- Tampilkan pesan jika tidak ada gambar -->
                                            <p>No image found</p>
                                        @endif
                                        <!-- Input untuk memilih file gambar -->
                                        <input type="file" name="image" class="form-control-file">
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea name="desc" class="form-control" required>{{ $setting->desc }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" name="address" class="form-control" value="{{ $setting->address }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" value="{{ $setting->email }}" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
