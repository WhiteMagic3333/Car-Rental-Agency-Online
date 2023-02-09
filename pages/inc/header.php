<!DOCTYPE html>
<html lang="en">

<title><?php echo $title; ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->


<!-- Bootstrap JS -->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
<style>
    #login,
    #register,
    #pages {
        /* border-radius: 30px; */
        /* width: 120px; */
        /* padding-right: 0px; */
        /* padding-left: 0px; */
        float: right;
        background-color: transparent;
        border-color: transparent;
        /* font-family: 'Open Sans' !important; */
        /* font-weight: bolder; */
        font-size: 30px !important;
    }

    #register {
        width: 150px;
    }

    .dropdown-menu {
        margin-right: 30px;
        width: 150px;
    }


    #pages {
        width: 100px;
    }

    #pages-dropdown {
        left: -35px;
    }


    .dropdown-item {
        min-width: 50px !important;
    }

    .body {
        font-weight: bolder;
    }


    .navbar-brand {
        font-size: 30px !important;
    }

    .home {
        width: 100px;
        text-align: center;
        background-color: trans;
    }

    .logo {
        font-size: 30px !important;
        text-align: center;
        margin-bottom: 0rem !important;
    }

    .home:hover {
        background: #a6d3fa;
        border-radius: 5px;
        text-decoration-color: blue;
        transition: 0.5s;
    }

    #register:hover,
    #login:hover,
    #pages:hover {
        background: #a6d3fa;
        border-radius: 5px;
        text-decoration-color: blue;
        transition: 0.5s;
    }

    #add {
        background-color: #2d3b55;
        color: #fff;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 4px;
    }

    #add:hover {
        background-color: #3c4d6d !important;
    }

    hr {
        border: none;
        height: 1px;
        /* Set the hr color */
        color: #333;
        /* old IE */
        background-color: #333;
        /* Modern Browsers */
    }

    .wrapper {
        display: inline-block;
        height: 420px;
        width: 327px;
        margin: 50px auto;
        margin: 40px;
        border-radius: 7px 7px 7px 7px;
        /* VIA CSS MATIC https://goo.gl/cIbnS */
        -webkit-box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
        -moz-box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
        box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
    }

    .product-img {
        float: left;
        height: 420px;
        width: 327px;
    }

    .product-img img {
        border-radius: 7px 0 0 7px;
    }

    .product-info {
        float: left;
        height: 420px;
        width: 327px;
        border-radius: 0 7px 10px 7px;
        background-color: #ffffff;
    }

    .product-text {
        height: 300px;
        width: 327px;
    }

    .product-text .h1 {
        margin: 0 0 0 38px;
        padding-top: 52px;
        font-size: 34px;
        color: #474747;
    }

    .product-text .h1,
    .product-price-btn .p {
        font-family: 'Bentham', serif;
    }

    .product-text .h2 {
        margin: 0 0 25px 38px;
        font-size: 13px;
        font-family: 'Raleway', sans-serif;
        font-weight: 400;
        text-transform: uppercase;
        color: #000000;
        letter-spacing: 0.2em;
    }

    .product-text .p {
        height: 125px;
        margin: 0 0 0 38px;
        font-family: 'Playfair Display', serif;
        color: #8d8d8d;
        line-height: 1.7em;
        font-size: 15px;
        font-weight: lighter;
        overflow: hidden;
    }

    .product-price-btn {
        height: 103px;
        width: 327px;
        margin-top: 17px;
        position: relative;
    }

    .product-price-btn .p {
        display: inline-block;
        position: absolute;
        top: -13px;
        height: 50px;
        font-family: 'Trocchi', serif;
        margin: 0 0 0 38px;
        font-size: 28px;
        font-weight: lighter;
        color: #474747;
    }

    span {
        display: inline-block;
        height: 50px;
        font-family: 'Suranna', serif;
        font-size: 34px;
    }

    .product-price-btn .button {
        float: right;
        display: inline-block;
        height: 50px;
        width: 126px;
        margin: 35px 40px 0 16px;
        box-sizing: border-box;
        border: transparent;
        border-radius: 60px;
        font-family: 'Raleway', sans-serif;
        font-size: 14px;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.2em;
        color: #ffffff;
        background-color: #9cebd5;
        cursor: pointer;
        outline: none;
    }

    .product-price-btn .button:hover {
        background-color: #79b0a1;
    }



    /* login form */
</style>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'>
<link rel="stylesheet" href="./inc/style.css">
</head>

<body>
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">

        <!-- Navbar content -->
        <div>
            <p class="logo">ONLINE RENTAL AGENCY</p>
        </div>
        <!-- Only show login and registration button on navbar if cur page is neither login or registration and no user has logged in -->
        <div class="dropdown-container" style="display: flex; align-items: center;">
            <a class="navbar-brand home" href="../index.php">HOME</a>
            <?php if ($title != "Login Page" && $title != "Registration Page" && empty($_SESSION["username"])) : ?>


                <div class="dropdown material">
                    <button class="navbar-brand home" type="button" id="login" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        LOGIN
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="./userLogin.php">For Users</a>
                        <a class="dropdown-item" href="./agencyLogin.php">For Agencies</a>
                    </div>
                </div>
                <div class="dropdown material">
                    <button class="navbar-brand home" type="button" id="register" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        REGISTER
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="./userRegister.php">For Users</a>
                        <a class="dropdown-item" href="./agencyRegister.php">For Agencies</a>
                    </div>
                </div>

                <!-- if user logged is of agency then show him the required pages -->
            <?php elseif (isset($_SESSION["username"]) && $_SESSION["usertype"] === "agency") : ?>
                <div class="dropdown material">
                    <button class="navbar-brand home" type="button" id="pages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        PAGES
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" id="pages-dropdown">
                        <a class="dropdown-item" href="./addEditCars.php">Add/edit cars</a>
                        <a class="dropdown-item" href="./bookings.php">View Bookings</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </nav>