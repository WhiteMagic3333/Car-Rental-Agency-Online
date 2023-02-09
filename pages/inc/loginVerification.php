<?php
// Form submit
if (isset($_POST['submit'])) {

    // Set vars to empty values
    $email = $password = '';
    $emailErr = $passwordErr = '';

    //include functions for validating login inputs
    include "./inc/validateFunctions.php";

    // Validate email
    validateEmail($email, $emailErr);

    // Validate password
    validatePassword($password, $passwordErr);

    $rows = [];

    if (empty($emailErr) && empty($passwordErr)) {

        //search for user credentials in the database
        //if not found then exit
        validateUserCreds($conn, $email, $password, $tableName, $rows);

        //found the user credentials
        $_SESSION['username'] = $rows[0]["name"];
        $_SESSION['usertype'] = strtolower($type);
        $_SESSION['useremail'] = $rows[0]["email"];

        echo "<script>window.location.href='./availableCars.php' ;</script>";
        // header('Location: availableCars.php');
        exit();
    }
    if (empty($rows)) {
        $message = "Please fill all the inputs";
        echo '<script>window.location.href="./error.php?message=' . $message . '" ;</script>';
        // header('Location: error.php?message=' . $message);
        exit();
    }
}
