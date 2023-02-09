<?php
include "config/database.php";
include "inc/rentVerification.php";

if ($_GET)
    echo $_GET['message'];

$title = "Car Rental Agency";

include "inc/header.php";
?>

<div style="background-color:aliceblue; margin : 80px auto; 
width:60%; overflow-y: scroll; max-height : 600px; max-width:900px">
    <?php include "inc/carListsImproved.php"; ?>
</div>

<?php include "inc/footer.php"; ?>