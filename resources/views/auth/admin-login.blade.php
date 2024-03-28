<!-- resources/views/auth/login.blade.php -->
<form method="POST" action="{{ route('login') }}">
    @csrf
    <input type="hidden" name="role" value="admin">    @csrf
    <div>
        <label for="nis">NIS</label>
        <input id="nis" type="text" name="nis" required autofocus>
    </div>

    <div>
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required>
    </div>

    <button type="submit">Login</button>
</form>
