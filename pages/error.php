<?php

include "config/database.php";


function includeHeader()
{
    $title = "Error";
    include "inc/header.php";
}

includeHeader();

?>
<!-- <div class="card">
    <h5 class="card-title" style="position:absolute; margin-left:50px; margin-top:10px;">
        Available Cars
    </h5>
    <div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Vestibulum at eros</li>
        </ul>
    </div>
</div> -->
<br>
<br>
<h1 style="margin-left: 30px; margin-top: 30px ; font-size:80px;"><?php if ($_GET) {
                                                                        echo $_GET['message']; // print_r($_GET); //remember to add semicolon      
                                                                    } else
                                                                        echo "<br>Error:-<br>Kindly go back to home page";
                                                                    ?>
</h1>


<?php include "inc/footer.php"; ?>