<form method="post" action="<?= $url ?>login">
    <h1>Login</h1>
    <label>Username:<br>
        <input type="text" name="username" required>
    </label>
    <label>Password:<br>
        <input type="password" name="password" required>
    </label>
    <button type="submit">Login</button>
    <p>Not a member? Register<a href="<?= $url ?>register"> here</a></p>
</form>