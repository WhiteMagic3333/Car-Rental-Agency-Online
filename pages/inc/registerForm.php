<div class="login-form">
    <form method="POST" action="<?php echo htmlspecialchars(
                                    $_SERVER['PHP_SELF']
                                ); ?>">
        <!-- type is storing Agency or User -->
        <h1><?php echo $type ?> Registration</h1>
        <div class="content">
            <div class="input-field">
                <input type="email" name="email" placeholder="Email" autocomplete="nope">
            </div>
            <div class="input-field">
                <input type="name" name="name" placeholder="<?php
                                                            if ($type == "User")
                                                                echo "Full Name";
                                                            else
                                                                echo "Agency Name";
                                                            ?>" autocomplete="nope">
            </div>
            <div class="input-field">
                <input type="password" name="password" placeholder="Password" autocomplete="new-password">
            </div>
            <div class="input-field">
                <input type="password" name="cPassword" placeholder="Confirm Password" autocomplete="new-password">
            </div>
        </div>
        <br>
        <div class="action">
            <?php if ($type == "User") : ?>
                <button type="button" onclick=userLogin()>Login</button>
            <?php else : ?>
                <button type="button" onclick=agencyLogin()>Login</button>
            <?php endif; ?>
            <button type="submit" name="submit">Register</button>
        </div>
    </form>
</div>