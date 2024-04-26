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
                                    <div class="container col-lg-6 py-5">
                                        <div class="card bg-white shadow rounded-3 p-3 border-0">
                                            @if (session()->has('gagal'))
                                                <p>Gagal</p>
                                            @endif
                                            @if (session()->has('succes'))
                                                <p>Masuk</p>
                                            @endif
                                            <video id="preview"></video>
                                            <form action="{{ route('approve-borrow', ['userId' => $userId]) }}" method="POST" id="form">
                                                @csrf
                                                <input type="hidden" name="borrowing_id" id="borrowing_id">
                                            </form>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <tr>
                                                    {{-- <div>
                                                        <p>Nama: {{ $userName }}</p>
                                                        <p>NIS: {{ $userNIS }}</p>
                                                    </div> --}}
                                                </tr>
                                            </table>
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
            let scanner = new Instascan.Scanner({
                video: document.getElementById('preview')
            });
            scanner.addListener('scan', function(content) {
                var borrowingId = content;

                swal("Persetujuan Peminjaman", "Anda akan menyetujui peminjaman dengan ID: " + borrowingId, "info", {
                    buttons: {
                        ok: {
                            text: "OK",
                            value: "ok",
                        },
                    },
                }).then((value) => {
                    if (value === "ok") {
                        document.getElementById('borrowing_id').value = borrowingId;
                        document.getElementById('form').submit();
                    }
                });
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
        </script>
        <script>
            var userId = "{{ $userId }}";
        </script>
    </div>
</body>
</html>
