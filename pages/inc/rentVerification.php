<?php
// Form submit
if (isset($_POST["submit"])) {
    if (isset($_SESSION["username"])) {
        if ($_SESSION["usertype"] === "agency") {
            $message = "Agencies are not allowed to book cars";
            echo '<script>window.location.href="./error.php?message=' . $message . '" ;</script>';
            // header('Location: error.php?message=' . $message);
            exit();
        } else {
            // Set vars to empty values
            $days = $startDate = '';
            $daysErr = $startDateErr = '';

            //include functions for validating login inputs
            include "./inc/validateFunctions.php";

            // Validate days
            validateDays($days, $daysErr);

            // Validate start Date
            validateStartDate($startDate, $startDateErr);

            // echo $startDate . "\n";
            //start date in time format not string
            $sd = strtotime($startDate);
            // $endDate = date("Y-m-d", strtotime("+" . $days . " day", $startDate));
            // echo $endDate;
            // echo strtotime("+1 day", strtotime($startDate));
            // exit();

            if (empty($daysErr) && empty($startDateErr)) {
                //we need userid, agencyid, vehicleid, 
                $carNumber = $_POST["submit"];
                //first lets fetch userid
                $userId = $agencyId = $vehicleId = "";
                fetchUserId($userId, $conn);
                fetchAgencyAndVehicleId($agencyId, $vehicleId, $carNumber, $conn);

                //if slot of booking clashes with any other slot then show error
                $daysUpd = (int)$days;
                $days = $days - 1;
                $endDate = date("Y-m-d", strtotime("+" . $daysUpd . " day", $sd));
                verifySlot($startDate, $endDate, $vehicleId, $conn);
                //update and redirect to availableCars Page.
                updateVehicleBooking($userId, $vehicleId, $agencyId, $startDate, $days, $conn);
                exit();
            }
            $message = "Invalid Number of Days or Start Date";
            echo '<script>window.location.href="./error.php?message=' . $message . '" ;</script>';
        }
    }
    // header('Location: userLogin.php');
    echo '<script>window.location.href="./userLogin.php"</script>';
    exit();
}
