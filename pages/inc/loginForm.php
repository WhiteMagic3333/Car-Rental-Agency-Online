<div class="login-form">
    <form method="POST" action="<?php echo htmlspecialchars(
                                    $_SERVER['PHP_SELF']
                                ); ?>">
        <h1><?php echo $type ?> Login</h1>
        <div class="content">
            <div class="input-field">
                <input type="email" name="email" placeholder="Email" autocomplete="nope">
            </div>
            <div class="input-field">
                <input type="password" name="password" placeholder="Password" autocomplete="new-password">
            </div>
        </div>
        <br>
        <div class="action">
            <?php if ($type == "User") : ?>
                <button type="button" onclick=userRegister()>Register</button>
            <?php else : ?>
                <button type="button" onclick=agencyRegister()>Register</button>
            <?php endif; ?>
            <button type="submit" name="submit">Log in</button>
        </div>
    </form>
</div>