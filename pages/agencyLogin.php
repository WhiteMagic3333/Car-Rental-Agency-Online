<?php
//include database
include "./config/database.php";

// including header
$title = "Login Page";
include "inc/header.php";

//On form submit

//tableName is users in the database for user credentials
$tableName = "agencies";
$type = "Agency";
//verify log in data and then log in to the system
include "inc/loginVerification.php";

// Login Form for Agencies

include "inc/loginForm.php";

// including footer
include "inc/footer.php";
