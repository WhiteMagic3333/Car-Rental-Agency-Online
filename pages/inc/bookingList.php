<?php
$agencyName = $_SESSION["username"];
echo "<h3 style='margin: 0px; padding: 10px;'>Agency = " . $agencyName . "</h3>";
?>

<div style="width: 100%; height: 600px; margin: 0px; padding: 0;">
    <div style="background-color:aliceblue; margin : 80px auto; width:60%; overflow-y: scroll; max-height : 600px;">
        <?php
        include "./inc/validateFunctions.php";

        $agencyId = "";

        fetchAgencyId($agencyId, $conn);
        $sql = 'SELECT * FROM `bookings` WHERE `agency_id` = ' . $agencyId;

        $is_empty = true;
        $result = mysqli_query_or_die($conn, $sql); // First parameter is just return of "mysqli_connect()" function
        while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
            $userId = $row["user_id"];
            $vehicleId = $row["vehicle_id"];
            $userName = $vehicleModel = "";
            fetchUserName($userName, $userId, $conn);
            fetchVehicleModel($vehicleModel, $vehicleId, $conn);
            $startDate = $row["start_date"];
            $days = $row["days"];
            $endDate = date("Y-m-d", strtotime("+" . $days . " day", strtotime($startDate)));
            // echo $userName . $vehicleModel . $startDate . " " . $days . " " . $endDate . "<br>";
            echo "<div class='container'>" . "<div class='card'>";
            echo "<div><p style = 'display:inline;'>Model : </p>
        <p id = 'model" . $vehicleModel . "' style = 'display:inline;'>"
                . $vehicleModel . "</p></div>";
            echo "<div><p style = 'display:inline;'>Booked By : </p>
        <p id = 'model" . $vehicleModel . "' style = 'display:inline;'>"
                . $userName . "</p></div>";
            echo "<div><p style = 'display:inline;'>Booked From : </p>
        <p id = 'model" . $vehicleModel . "' style = 'display:inline;'>"
                . $startDate . "</p></div>";
            echo "<div><p style = 'display:inline;'>Booked Till : </p>
        <p id = 'model" . $vehicleModel . "' style = 'display:inline;'>"
                . $endDate . "</p></div>";
            echo "<div><p style = 'display:inline;'>Total Days : </p>
        <p id = 'model" . $vehicleModel . "' style = 'display:inline;'>"
                . $days . "</p></div>";


            echo "</div></div><br>";
            $is_empty = false;
        }
        if ($is_empty) {
            echo "<h1>No Bookings Yet</h1>";
        }

        ?>
    </div>
</div>