<div style="display:flex-wrap;">

    <?php


    use LDAP\Result;

    include "./inc/validateFunctions.php";


    $sql = 'SELECT * FROM `vehicles`';

    if ($title === "Add Cars") {
        $email = $_SESSION["useremail"];
        $sql = 'SELECT id FROM `agencies` Where `email` = "' . $email . '"';
        $result = mysqli_query_or_die($conn, $sql);

        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $agencyId = $rows[0]["id"];
        $id = (int)$agencyId;
        $sql = 'SELECT * FROM `vehicles` WHERE `agency_id` = "' . $id . '"';
    }

    $is_empty = true;
    $result = mysqli_query_or_die($conn, $sql); // First parameter is just return of "mysqli_connect()" function
    while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
        echo
        '<div class="wrapper">
            <div class="product-info">
                <div class="product-text">';
        if ($title !== "Add Cars") {
            $samePage = htmlspecialchars(
                $_SERVER['PHP_SELF']
            );
            echo '<form method="POST" action="' . $samePage . '">';
        }
        echo '<h1 class="h1">' . $row["model"] . '</h1><br>';
        echo '<h2 class="h2" style="display:inline-block;">Vehicle Number : ' . $row["number"] . '</h2>';
        echo '<h2 class="h2" style="display:inline-block;">Seats : ' . $row["seats"] . '</h2>' . "\n";
        if (isset($_SESSION["usertype"]) &&  $_SESSION["usertype"] === "user") {
            echo '<h2 class="h2" style="display:inline-block;">Number of Days : </h2>
            <input type="number" name="days" min=1 max=7 />';
            echo '<h2 class="h2" style="display:inline;">Start Date : </h2>
            <input type="date" name="startdate" />';
        }
        echo '</div><div class="product-price-btn">';
        echo '<p class="p">₹<span>' . $row["rent"] . '</span>/day</p>';
        echo '<button class="button" type = "submit" name = "submit" value= "' . $row["number"] . '" >Rent</button>';
        echo "</form></div></div></div>";
        //     echo "<div><p style = 'display:inline;'>Model : </p><p id = 'model" . $row["number"] . "' style = 'display:inline;'>" . $row["model"] . "</p></div>";
        //     echo "<div><p style = 'display:inline;'># : </p><p id = 'number" . $row["number"] . "' style = 'display:inline;'>" . $row["number"] . "</p></div>";
        //     echo "<div><p style = 'display:inline;'>Seats : </p><p id = 'seats" . $row["number"] . "' style = 'display:inline;'>" . $row["seats"] . "</p></div>";
        //     echo "<div><p style = 'display:inline;'>Rent Per Day : </p><p id = 'rent" . $row["number"] . "' style = 'display:inline;'>" . $row["rent"] . "</p></div>";
        // if (isset($_SESSION["usertype"]) &&  $_SESSION["usertype"] === "user") {
        //     echo "<div>Number of Days : <input type='number' name='days' min=1 max=7 /></div>";
        //     echo "<div>Starting Date : <input type='date' name='startdate' /></div>";
        // }
        //     if ($title === "Add Cars")
        //         echo "<button onClick = changeForm('" . $row["number"] . "');>Edit</button>";
        //     else
        //         echo "<button type = 'submit' name = 'submit' value='" . $row["number"] . "'>Rent</button>";
        //     echo "</div></div>";
        //     echo "<br>";
        //     $is_empty = false;
    }
    // if ($is_empty) {
    //     echo ($title === "Add Cars") ? "<h1>Add a new Car</h1>" : "<h1>No Cars For Rent</h1>";
    // }


    // <div class="container">
    //     <div class="card">
    //         <div>
    //             Model Name
    //         </div>
    //         <div>
    //             Model Number
    //         </div>
    //         <div>
    //             Seats
    //         </div>
    //         <div>
    //             Rent Per Day
    //         </div>
    //     </div>
    ?>
</div>