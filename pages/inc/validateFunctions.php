<?php

function isRealDate($date)
{
    if (false === strtotime($date)) {
        return false;
    }
    list($year, $month, $day) = explode('-', $date);
    return checkdate($month, $day, $year);
}

function mysqli_query_or_die($conn, $query)
{
    $result = mysqli_query($conn, $query);
    if ($result)
        return $result;
    else {
        $err = mysqli_error($conn);
        die("<br>{$query}<br>*** {$err} ***<br>");
    }
}

function validateName(&$name, &$nameErr)
{
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        // $name = filter_var($_POST["name"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $name = filter_input(
            INPUT_POST,
            "name",
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );
    }
}

function validateEmail(&$email, &$emailErr)
{
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        // $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $email = strtolower($email);
    }
}

function validatePassword(&$password, &$passwordErr)
{
    if (empty($_POST["password"])) {
        $passwordErr = "password is required";
    } else {
        // $password = filter_var($_POST["password"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_input(
            INPUT_POST,
            "password",
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );
    }
}

function validateConfirmPassword(&$cPassword, &$cPasswordErr)
{
    if (empty($_POST["cPassword"])) {
        $cPasswordErr = "Confirm password is required";
    } else {
        // $password = filter_var($_POST["password"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $cPassword = filter_input(
            INPUT_POST,
            "cPassword",
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );
    }
}

function validateFormType(&$form, &$formErr)
{
    if (empty($_POST["submit"])) {
        $formErr = "form type is required";
    } else {
        // $password = filter_var($_POST["password"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $form = filter_input(
            INPUT_POST,
            "add",
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );
    }
}



function validatePasswordContent($password, $cPassword)
{
    if ($password !== $cPassword) {
        $message = "Passwords do not match";
        echo '<script>window.location.href="./error.php?message=' . $message . '" ;</script>';
        // header('Location: error.php?message=' . $message);
        exit();
    }
}


function uniqueUser($conn, $email, $tableName)
{
    $sql = 'SELECT * FROM ' . $tableName . ' WHERE email = "' . $email . '"';
    $result = mysqli_query_or_die($conn, $sql);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return empty($rows);
}

function addToDatabase($conn, $name, $email, $password, $tableName)
{
    //password to be hashed in future
    $sql = "INSERT INTO " . $tableName . "(email, password, name) VALUES ('$email', '$password', '$name')";
    if (mysqli_query_or_die($conn, $sql)) {
        // success
        echo "<script>window.location.href='./availableCars.php' ;</script>";
        // header("Location: availableCars.php");
    } else {
        // error
        echo "Error: " . mysqli_error($conn);
    }
}

function  validateUserCreds($conn, $email, $password, $table, &$rows)
{
    $sql = 'SELECT * FROM ' . $table .
        ' WHERE email = "' . $email .
        '" AND `password` = "' . $password . '" ';

    // echo $sql;
    $result = mysqli_query_or_die($conn, $sql);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //no records found
    if (empty($rows)) {
        $message = "Invalid Email or Password";
        echo '<script>window.location.href="./error.php?message=' . $message . '" ;</script>';
        // header('Location: error.php?message=' . $message);
        exit();
    }
}

function validateModel(&$model, &$modelErr)
{
    if (empty($_POST["model"])) {
        $modelErr = "model is required";
    } else {
        // $model = filter_var($_POST["model"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $model = filter_input(
            INPUT_POST,
            "model",
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );
    }
}

function validateNumber(&$number, &$numberErr)
{
    if (empty($_POST["number"])) {
        $numberErr = "number is required";
    } else {
        // $number = filter_var($_POST["number"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $number = filter_input(
            INPUT_POST,
            "number",
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );
        $number = trim($number);
        if (is_numeric($number)) {
            $numberErr = "invalid number input";
        }
    }
}

function validateOldNumber(&$oldNumber, &$oldNumberErr)
{
    if (empty($_POST["oldNumber"])) {
        $oldNumberErr = "number is required";
        echo '<script>window.location.href="./error.php?message=' . $oldNumberErr . '" ;</script>';
        // header("Location: error.php?message=" . $oldNumberErr);
        exit();
    } else {
        // $number = filter_var($_POST["number"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $oldNumber = filter_input(
            INPUT_POST,
            "oldNumber",
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );
    }
}

function validateSeats(&$seats, &$seatsErr)
{
    if (empty($_POST["seats"])) {
        $seatsErr = "seats is required";
    } else {
        // $seats = filter_var($_POST["seats"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $seats = filter_input(
            INPUT_POST,
            "seats",
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );
        $seats = trim($seats);
        if (!is_numeric($seats))
            $seatsErr = "Seats are required";
    }
}

function validateRent(&$rent, &$rentErr)
{
    if (empty($_POST["rent"])) {
        $rentErr = "rent is required";
    } else {
        // $rent = filter_var($_POST["rent"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $rent = filter_input(
            INPUT_POST,
            "rent",
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );
        $rent = trim($rent);
        if (!is_numeric($rent))
            $rentErr = "rent is required";
    }
}

function uniqueVehicle($conn, $number)
{
    $sql = 'SELECT * FROM `vehicles` 
    WHERE `number` = "' . $number . '"';

    $result = mysqli_query_or_die($conn, $sql);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return empty($rows);
}

function addVehicleToDatabase($conn, $model, $number, $seats, $rent)
{
    $email = $_SESSION["useremail"];
    $sql = 'SELECT id 
    FROM `agencies` WHERE
    `email` = "' . $email . '"';
    $result = mysqli_query_or_die($conn, $sql);



    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $agencyId = $rows[0]["id"];
    $id = (int)$agencyId;



    $sql = "INSERT INTO `vehicles` 
    (model, number, seats, rent, agency_id) 
    VALUES ('$model', '$number', '$seats', '$rent', '$id')";


    if (mysqli_query($conn, $sql)) {
        // success
        echo '<script>window.location.href="./addEditCars.php"</script>';
        // header("Location: addEditCars.php");
        exit();
    } else {
        // error
        echo "Error: " . mysqli_error($conn);
    }
}

function updateVehicleToDatabase($conn, $model, $number, $seats, $rent, $oldNumber)
{
    $sql = 'UPDATE `vehicles` SET 
    `model` = "' . $model . '",
    `number` = "' . $number . '",
    `seats` = "' . $seats . '",
    `rent` = "' . $rent . '"
    WHERE `number` = "' . $oldNumber . '"';

    // echo $sql;
    // exit();


    if (mysqli_query($conn, $sql)) {
        // success
        echo '<script>window.location.href="./addEditCars.php"</script>';
        // header("Location: addEditCars.php");
        exit();
    } else {
        // error
        echo "Error: " . mysqli_error($conn);
        exit();
    }
}

function validateDays(&$days, &$daysErr)
{
    if (empty($_POST["days"])) {
        $daysErr = "input days are required";
    } else {
        // $number = filter_var($_POST["number"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $days = filter_input(
            INPUT_POST,
            "days",
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );
    }
}

function validateStartDate(&$startDate, &$startDateErr)
{
    if (empty($_POST["startdate"])) {
        $startDateErr = "Start Date are required";
    } else {
        // $number = filter_var($_POST["number"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $startDate = filter_input(
            INPUT_POST,
            "startdate",
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );
        $startDate = trim($startDate);
        if (isRealDate($startDate) === false)
            $startDateErr = "Start Date is invalid";
    }
}

function fetchUserId(&$userId, $conn)
{
    $email = $_SESSION["useremail"];
    $sql = 'SELECT * 
    FROM `users` WHERE
    `email` = "' . $email . '"';
    $result = mysqli_query_or_die($conn, $sql);

    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $userId = $rows[0]["id"];
}

function fetchAgencyId(&$agencyId, $conn)
{
    $email = $_SESSION["useremail"];
    $sql = 'SELECT * 
    FROM `agencies` WHERE
    `email` = "' . $email . '"';
    $result = mysqli_query_or_die($conn, $sql);

    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $agencyId = $rows[0]["id"];
}

function fetchUserName(&$userName, $userId, $conn)
{
    $sql = 'SELECT * 
    FROM `users` WHERE
    `id` = "' . $userId . '"';
    $result = mysqli_query_or_die($conn, $sql);

    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $userName = $rows[0]["name"];
}

function fetchVehicleModel(&$vehicleModel, $vehicleId, $conn)
{
    $sql = 'SELECT * 
    FROM `vehicles` WHERE
    `id` = "' . $vehicleId . '"';
    $result = mysqli_query_or_die($conn, $sql);

    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $vehicleModel = $rows[0]["model"];
}

function fetchAgencyAndVehicleId(&$agencyId, &$vehicleId, $carNumber, $conn)
{
    $sql = 'SELECT * 
    FROM `vehicles` WHERE
    `number` = "' . $carNumber . '"';
    $result = mysqli_query_or_die($conn, $sql);

    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $vehicleId = $rows[0]["id"];
    $agencyId = $rows[0]["agency_id"];
}

function updateVehicleBooking($userId, $vehicleId, $agencyId, $startDate, $days, $conn)
{
    $sql = "INSERT INTO `bookings`
    ( `user_id`, `vehicle_id`, `agency_id`, `start_date`, `days`) 
    VALUES ('$userId', '$vehicleId', '$agencyId', '$startDate', '$days' )";
    if (mysqli_query($conn, $sql)) {
        // success
        $message = "Successfully Booked";
        echo '<script>window.location.href="./availableCars.php?message=' . $message . '"</script>';
        exit();
    } else {
        // error
        echo "Error: " . mysqli_error($conn);
    }
}

function check_in_range($start_date, $end_date, $date_from_user)
{
    // Convert to timestamp
    $start_ts = strtotime($start_date);
    $end_ts = strtotime($end_date);
    $user_ts = strtotime($date_from_user);

    // Check that user date is between start & end
    return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
}

function verifySlot($startDate, $endDate, $vehicleId, $conn)
{
    $sql = "SELECT * FROM `bookings` WHERE vehicle_id = '" . $vehicleId . "'";
    $result = mysqli_query_or_die($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $bookingStartDate = $row["start_date"];
        $daysBooked = $row["days"];
        //booking starting date in  date format
        $bsd = strtotime($bookingStartDate);
        $bookingEndDate = date("Y-m-d", strtotime("+" . $daysBooked . " day", $bsd));
        if (check_in_range($bookingStartDate, $bookingEndDate, $startDate) || check_in_range($bookingStartDate, $bookingEndDate, $endDate)) {
            $message = "This slot is not available";
            echo '<script>window.location.href="./error.php?message=' . $message . '" ;</script>';
            exit();
        }
    }
}
