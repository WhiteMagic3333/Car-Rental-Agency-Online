<div style="width: 100%; height: 600px; margin: 0; padding: 0;">
    <div style="float: left; width: 50%;">
        <div class="login-form" id="loginForm">
            <form method="POST" action="<?php echo htmlspecialchars(
                                            $_SERVER['PHP_SELF']
                                        ); ?>">
                <h1 id="formHeading"><?php echo $type ?> New Vehicle</h1>
                <div class="content" id="content">
                    <div class="input-field">
                        <input type="text" name="model" id="fmodel" placeholder="Model Number" autocomplete="nope">
                    </div>
                    <div class="input-field">
                        <input type="text" name="number" id="fnumber" placeholder="Vehicle Number" autocomplete="nope">
                    </div>
                    <div class="input-field">
                        <input type="text" pattern="[0-9]+" id="fseats" name="seats" placeholder="Number of Seats" autocomplete="nope">
                    </div>
                    <div class="input-field">
                        <input type="text" pattern="[0-9]+" id="frent" name="rent" placeholder="Rent Per Day (In Rupees)" autocomplete="nope">
                    </div>
                </div>
                <br>
                <div class="action">
                    <button type="submit" name="submit" id="add">Add</button>
                </div>
            </form>
        </div>
    </div>
    <div style="float: right; width: 50%; margin: 50px auto; overflow-y: scroll; height : 590px; background-color:aliceblue;">
        <?php include "./inc/carLists.php"; ?>
    </div>
</div>