<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scanner & Formulir Peminjaman</title>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Scanner & Formulir Peminjaman</h1>
        <div class="scanner-section">
            <h2>Scanner QR</h2>
            <video id="preview"></video>
        </div>
        <div class="form-section">
            <h2>Formulir Peminjaman</h2>
            <form id="borrowing-form" action="{{ route('borrowings.update', $borrow->first()->id) }}" method="POST">
                @csrf
                <input type="hidden" id="borrowing-id" name="borrowing_id">
                <button type="submit">Pinjam Buku</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });

            scanner.addListener('scan', async function (content) {
                console.log('QR content:', content);
                try {
                    let response = await fetch('{{ route("scanner.scan") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ borrowing_code: content })
                    });
                    let json = await response.json();

                    if (!response.ok) {
                        throw new Error("Gagal memindai QR");
                    }else {
                        window.location.href = '{{ route("borrowings.index") }}';
                    }
                } catch (error) {
                    alert(error.message);
                }
                // Kirim permintaan AJAX untuk memindai QR dan mengubah status
                // fetch('{{ route("scanner.scan") }}', {
                //     method: 'POST',
                //     headers: {
                //         'Content-Type': 'application/json',
                //         'X-CSRF-TOKEN': '{{ csrf_token() }}'
                //     },
                //     body: JSON.stringify({ borrowing_code: content })
                // })
                // .then(response => {
                //     if (!response.ok) {
                //         throw new Error('Gagal memindai QR');
                //     }
                //     // Redirect atau lakukan tindakan lain setelah berhasil
                // //     console.log({response});
                //     window.location.href = '{{ route("borrowings.index") }}';
                // })
                // .then(data => {
                //     console.log(data)
                // })
                // .catch(error => {
                //     console.error('Error:', error);
                //     // Handle error jika diperlukan
                // });
            });

            Instascan.Camera.getCameras().then(function (cameras) {
                if (cameras.length > 0) {
                    scanner.start(cameras[0]);
                } else {
                    console.error('No cameras found.');
                }
            }).catch(function (e) {
                console.error(e);
            });
        });
    </script>

</body>
</html>
