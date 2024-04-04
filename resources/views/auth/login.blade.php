<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <label for="nis">NIS:</label><br>
        <input type="text" id="nis" name="nis"><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
