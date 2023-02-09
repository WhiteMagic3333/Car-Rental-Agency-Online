<?php
session_start();

if (empty($_SESSION["usertype"]) || $_SESSION["usertype"] != "agency") {
    header('Location: ./availableCars.php');
    exit();
}

//include database
include "./config/database.php";

include "./inc/vehicleVerification.php";

// including header
$title = "Add Cars";
include "inc/header.php";

//content
$type = "Add";
include "inc/addVehiclesForm.php";


include "inc/footer.php";
