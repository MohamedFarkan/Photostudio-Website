<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: adminlog.php");
}
include 'data3.php';
$id = $_GET['deleteid'];
if (isset($_GET['deleteid'])) {

    $query = "DELETE FROM add_package where id= $id";
    echo $query;
    $result = mysqli_query($conn, $query);
    if ($result) {
        //echo "Deleted Successfully";
        header('location:package2.php');
    } else {
        die(mysqli_errno($conn));
    }
}
