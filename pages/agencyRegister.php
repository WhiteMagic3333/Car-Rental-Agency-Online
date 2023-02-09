<?php
//include mysql database
include "./config/database.php";

// including header(Navbar) and starting session
//title for the page
$title = "Registration Page";
include "inc/header.php";

//On form submit

//tableName is agencies in the database for agency user credentials
$tableName = "agencies";

//if agency data is valid then add to table "agencies"
include "inc/registerVerification.php";

//Page contents


// Include agency register form
$type = "Agency";
include "inc/registerForm.php";

// including footer
include "inc/footer.php";
