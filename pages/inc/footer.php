<!-- <footer>
    <p>Footer Text</p>
</footer> -->
<hr style="margin: 150px;">

<footer class="text-center mt-5">

    <!-- if user is logged in then show username -->
    <?php
    if (isset($_SESSION["username"])) {
        echo "<p>Logged in as " . $_SESSION["username"];
        //  logout part here
        echo " (Click here to <a href='logout.php'>Logout</a>" . ")</p>";
    }

    ?>
    <br>
    Copyright &copy; 2023
    <br>
    <br>
    <br>
    <br>
</footer>

<script>
    function userRegister() {
        window.location.href = "./userRegister.php"
    }

    function userLogin() {
        window.location.href = "./userLogin.php"
    }

    function agencyRegister() {
        window.location.href = "./agencyRegister.php"
    }

    function agencyLogin() {
        window.location.href = "./agencyLogin.php"
    }

    function changeForm(number) {
        //changing form content
        document.getElementById("formHeading").innerHTML = "Edit Vehicle Details";
        document.getElementById("add").innerHTML = "SUBMIT";
        document.getElementById("add").value = "edit";
        document.getElementById("fmodel").value = document.getElementById("model" + number).innerHTML;
        document.getElementById("fnumber").value = document.getElementById("number" + number).innerHTML;
        document.getElementById("fseats").value = document.getElementById("seats" + number).innerHTML;
        document.getElementById("frent").value = document.getElementById("rent" + number).innerHTML;

        //making ghost input which stores old number of vehicle
        const inpt = document.createElement("input");
        inpt.name = "oldNumber";
        inpt.value = number;
        inpt.style = "display:none";

        document.getElementById("content").appendChild(inpt);

    }
</script>
</body>

</html>