<?php
session_start();

if (empty($_SESSION["usertype"]) || $_SESSION["usertype"] != "agency") {
    header('Location: ./availableCars.php');
    exit();
}

//include database
include "./config/database.php";

// including header
$title = "Booking Details";
include "inc/header.php";

//content
$type = "booking";
include "inc/bookingList.php";


include "inc/footer.php";
