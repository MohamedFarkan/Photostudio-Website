<?php
$hostname = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "admin";
$conn = mysqli_connect($hostname, $dbuser, $dbpassword, $dbname);
if (!$conn) {
    die("Something went wrong☹️");
} else {
    echo "";
}
