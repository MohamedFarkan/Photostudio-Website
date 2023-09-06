<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: adminlog.php");
}
include 'data.php';
$id = $_GET['deleteid'];
if (isset($_GET['deleteid'])) {
    $query = "DELETE FROM user_details where id= $id";
    echo $query;
    $result = mysqli_query($conn, $query);
    if ($result) {
        //echo "Deleted Successfully";
        header('location:user_info.php');
    } else {
        die(mysqli_errno($conn));
    }
}
