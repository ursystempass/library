<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
</head>
<body>
    <h1>Create User</h1>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <label for="kode_user">Kode User:</label><br>
        <input type="text" id="kode_user" name="kode_user"><br>

        <label for="nis">NIS:</label><br>
        <input type="text" id="nis" name="nis"><br>

        <label for="fullname">Full Name:</label><br>
        <input type="text" id="fullname" name="fullname"><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>

        <label for="image">Image:</label><br>
        <input type="text" id="image" name="image"><br>

        <label for="alamat">Alamat:</label><br>
        <input type="text" id="alamat" name="alamat"><br>

        <label for="role">Role:</label><br>
        <select name="role" id="role">
            <option value="admin">Admin</option>
            <option value="member">Member</option>
        </select><br>

        <label for="join_date">Join Date:</label><br>
        <input type="text" id="join_date" name="join_date"><br>

        <label for="major_id">Major:</label><br>
        <select name="major_id" id="major_id">
            @foreach($majors as $major)
                <option value="{{ $major->id }}">{{ $major->nama }}</option>
            @endforeach
        </select><br>

        <label for="class_id">Class:</label><br>
        <select name="class_id" id="class_id">
            @foreach($classes as $class)
                <option value="{{ $class->id }}">{{ $class->nama }}</option>
            @endforeach
        </select><br>

        <button type="submit">Create</button>
    </form>
</body>
</html>
