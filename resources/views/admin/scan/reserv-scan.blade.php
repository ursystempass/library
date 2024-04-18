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
                                <div class="container col-lg-10 py-11">
                                    {{-- Pesan Peringatan --}}
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    @if (session('warning'))
                                        <div class="alert alert-danger">
                                            {{ session('warning') }}
                                        </div>
                                    @endif

                                    <div class="col-auto">
                                        <form action="{{ url('/eventsop') }}">
                                            <button type="submit" class="btn btn-dark m-1">Back</button>
                                        </form>
                                    </div>
                                    <div class="card shadow rounded-3 p-3 border-0">
                                        <p class="text-center mb-3" style="color: #000000;">Scan here</p>
                                        <video id="preview" playsinline autoplay muted style="width: 100%;"></video>
                                       <!-- Form untuk pemindaian -->
<form id="form" action="{{ route('reserv.scan.post') }}" method="POST">
    @csrf
    <input type="hidden" name="borrow_code" id="borrow_code">
    <input type="hidden" name="book_code" id="book_code">
</form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            let scanner = new Instascan.Scanner({
                video: document.getElementById('preview')
            });

            Instascan.Camera.getCameras().then(function(cameras) {
                if (cameras.length > 0) {
                    scanner.start(cameras[0]);
                } else {
                    console.error('No cameras found.');
                }
            }).catch(function(e) {
                console.error(e);
            });

            scanner.addListener('scan', function(content) {
                // Split kode yang dipindai menjadi dua bagian
                var codes = content.split('|');

                // Update nilai input dengan kode yang dipindai
                document.getElementById('borrow_code').value = codes[0];
                document.getElementById('book_code').value = codes[1];

                // Submit formulir
                document.getElementById('form').submit();
            });
        });
    </script>
</body>

</html>
