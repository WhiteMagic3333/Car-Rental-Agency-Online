<?php

// Validate Form Contents
if (isset($_POST['submit'])) {
    // Set vars to empty values
    $model = $number = $oldNumber = $seats = $rent = "";
    $modelErr = $numberErr = $oldNumberErr = $seatsErr = $rentErr = "";

    //include functions to validate form data and insert to database
    include "./inc/validateFunctions.php";

    // Validate model and store in $model
    validateModel($model, $modelErr);

    // Validate number 
    validateNumber($number, $numberErr);

    // Validate seats
    validateSeats($seats, $seatsErr);

    // Validate rent
    validateRent($rent, $rentErr);

    // if there is no error in input
    if (
        empty($modelErr) && empty($numberErr) &&
        empty($seatsErr) && empty($rentErr)
    ) {
        //if the number is not 
        if (uniqueVehicle($conn, $number)) {
            if ($_POST['submit'] === "edit") {
                // Validate old number
                validateOldNumber($oldNumber, $oldNumberErr);
                updateVehicleToDatabase($conn, $model, $number, $seats, $rent, $oldNumber);
            }
            // add to database
            addVehicleToDatabase($conn, $model, $number, $seats, $rent);
            //redirect to home/availableCars page
        } else {
            if ($_POST['submit'] === "edit") {
                // Validate old number
                validateOldNumber($oldNumber, $oldNumberErr);
                if ($number === $oldNumber)
                    updateVehicleToDatabase($conn, $model, $number, $seats, $rent, $oldNumber);
            }
            //number already exists
            $message = "Vehicle already registered";
            echo '<script>window.location.href="./error.php?message=' . $message . '" ;</script>';
            // header('Location: error.php?message=' . $message);
            exit();
        }
    }
    //some of the form inputs are empty
    $message = "Please fill all the inputs";
    header("Location: error.php?message=" . $message);
    exit();
}
