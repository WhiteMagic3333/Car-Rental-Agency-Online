<?php
//start session
//earlier this was in header
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


define('DB_HOST', 'localhost');
define('DB_USER', 'id20240040_magic');
define('DB_PASS', 'ov8i&-}^=Rg?%x2M');
define('DB_NAME', 'id20240040_carrentalagency');

// Create connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// echo 'Connected successfully';
