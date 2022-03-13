<?php

//! Local database connection 

$db_host = "localhost";
$db_username = "u261388230_donate";
$db_password = "Skw@ben@24";
$db_databasename = "u261388230_donate";


$mainDbString = mysqli_connect($db_host, $db_username, $db_password, $db_databasename);

if (!$mainDbString) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


// Production Database Connection

// $db_host = "localhost";
// $db_username = "u916174196_pin_username";
// $db_password = "DZ0K9z@8";
// $db_databasename = "u916174196_pin_database";


// $mainDbString = mysqli_connect($db_host, $db_username, $db_password, $db_databasename);

// if (!$mainDbString) {
//     die("ERROR: Could not connect. " . mysqli_connect_error());
// }
