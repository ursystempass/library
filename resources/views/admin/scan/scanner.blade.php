<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scanner & Formulir Peminjaman</title>
    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #007bff;
        }

        .scanner-section {
            text-align: center;
            margin-bottom: 30px;
        }

        #preview {
            width: 100%;
            max-width: 500px;
        }

        .form-section {
            text-align: center;
        }

        form {
            display: inline-block;
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        form button:hover {
            background-color: #0056b3;
        }
    </style>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="scanner-section">
            <h2>Scanner QR Peminjaman</h2>
            <video id="preview"></video>
        </div>
        <!-- <div class="form-section">
            <h2>Formulir Peminjaman</h2>
            <form id="borrowing-form" action="{{ route('borrowings.update', $borrow->first()->id) }}" method="POST">
                @csrf
                <input type="hidden" id="borrowing-id" name="borrowing_id">
                <button type="submit">Pinjam Buku</button>
            </form>
        </div>
    </div> -->

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
                    } else {
                        window.location.href = '{{ route("borrowings.index") }}';
                    }
                } catch (error) {
                    alert(error.message);
                }
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
