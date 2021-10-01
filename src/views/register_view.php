<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
</head>
<body>
    <h3>Rejestracja</h3>
    <form method="post" autocomplete="off">
        <div class="login-input">
            <p>Login:</p>
            <input type="text" name="login">
        </div>
        <div class="login-input">
            <p>E-mail:</p>
            <input type="email" name="email">
        </div>
        <div class="login-input">
            <p>Hasło:</p>
            <input type="password" name="password">
        </div>
        <div class="login-input">
            <p>Powtórz hasło:</p>
            <input type="password" name="repeat_password">
        </div>
        <div class="login-input">
            <a href="gallery">Wróć</a>
            <input type="reset" value="Wyczyść">
            <input type="submit" value="Zarejestruj">
        </div>
    </form>
</body>
</html>