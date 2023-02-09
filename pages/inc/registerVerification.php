<?php

// Validate Form Contents
if (isset($_POST['submit'])) {
    // Set vars to empty values
    $name = $email = $password = $cPassword = "";
    $nameErr = $emailErr = $passwordErr = $cPasswordErr = "";

    //include functions to validate form data and insert to database
    include "./inc/validateFunctions.php";

    // Validate name
    validateName($name, $nameErr);

    // Validate email
    validateEmail($email, $emailErr);

    // Validate password
    validatePassword($password, $passwordErr);

    // Validate confirm password
    validateConfirmPassword($cPassword, $cPasswordErr);

    // if there is no error in input
    if (
        empty($nameErr) && empty($emailErr) &&
        empty($passwordErr) && empty($cPasswordErr)
    ) {

        //then check for equality of password and confirm password
        //if the passwords are unequal then redirect to error page
        validatePasswordContent($password, $cPassword);

        //if the email is not 
        if (uniqueUser($conn, $email, $tableName)) {
            // add to database
            addToDatabase($conn, $name, $email, $password, $tableName);
            //redirect to home/availableCars page
            echo "<script>window.location.href='./availableCars.php' ;</script>";
            // header('Location: availableCars.php');
            // exit();
        } else {
            //email already exists
            $message = "Email already exists";
            echo '<script>window.location.href="./error.php?message=' . $message . '" ;</script>';
            // header('Location: error.php?message=' . $message);
            exit();
        }
    }
    //some of the form inputs are empty
    $message = "Please fill all the inputs";
    echo '<script>window.location.href="./error.php?message=' . $message . '" ;</script>';
    // header("Location: error.php?message=" . $message);
    exit();
}
