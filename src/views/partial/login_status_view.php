<?php if(!empty($_SESSION['login'])): ?>
    <div class="user">
        <p>Zalogowano:</p>
        <p><?= $logged_user['login'] ?></p>
        <div class="log-out">
            <a href="log_out">Wyloguj się</a>
        </div>
    </div>
<?php else: ?>
    <form method="post" autocomplete="off">
        <div class="account-input">
            <p>Login:</p>
            <input type="text" name="login">
        </div>
        <div class="account-input">
            <p>Hasło:</p>
            <input type="password" name="password">
        </div>
        <div class="account-input-bt">
            <input type="reset" value="Wyczyść">
            <input type="submit" value="Zaloguj">
        </div>
        <div class="account-register">
            <span>Nie masz konta? <a href="register">Zarejestruj się</a></span>
        </div>
    </form>
<?php endif; ?>