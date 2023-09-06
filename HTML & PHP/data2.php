<?php
$hostname = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "photoshoot_booking";
$conn = mysqli_connect($hostname, $dbuser, $dbpassword, $dbname);
if (!$conn) {
    die("Something went wrong☹️");
} else {
    echo "";
}
