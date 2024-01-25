<?php
$hostname = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "photo_studio";
$conn = mysqli_connect($hostname, $dbuser, $dbpassword, $dbname);
if (!$conn) {
    die("Something went wrong☹️");
} else {
    echo "";
}
