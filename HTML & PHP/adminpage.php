<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: adminlog.php");
}
include 'data.php'; // Include the database connection


$email = $_SESSION['user'];

$query = "SELECT COUNT(DISTINCT email) AS user_count FROM user_details";

$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $email1 = $row['user_count']; // Change 'email' to 'user_count'
} else {
    echo "User count not found!";
}

include 'data.php'; // Include the database connection


$email = $_SESSION['user'];

$query = "SELECT COUNT(DISTINCT email) AS user_count FROM booking_details";

$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $email2 = $row['user_count']; // Change 'email' to 'user_count'
} else {
    echo "User count not found!";
}

include 'data.php'; // Include the database connection


$email = $_SESSION['user'];

$query = "SELECT COUNT(DISTINCT package_name) AS pack_name FROM add_package";

$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $pack = $row['pack_name']; // Change 'email' to 'user_count'
} else {
    echo "User count not found!";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b21ac06503.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/Photostudio_Website/CSS/adminpage.css">
    <title>Admin Page</title>
</head>

<body>
    <div class="container">
        <nav>
            <img src="/Photostudio_Website/images/port_img/diaphragm.png" alt="LOGO" class="logo" />
            <input type="search" placeholder="search....." id="searchInput" /><i class="fa-solid fa-magnifying-glass"></i>

            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="adminlogout.php">Logout</a></li>





    </div>


    </ul>
    </nav>
    </div>
    <hr>
    <div id="User_details">
        <div class="container">



            <div class="user_detail_list">
                <div class="no_user">
                    <h2>
                        <i class="fa-solid fa-user fa-2xl"></i>
                    </h2>
                    <br><br>
                    <h1>Total Users : <?php echo $email1; ?></h1>
                    <br>
                    <a href="http://localhost/Photostudio_Website/HTML%20&%20PHP/user_info.php" target="_blank"><i class="fa-solid fa-up-right-from-square fa-2xl"></i></a>
                </div>
                <div class="no_package">
                    <h2>
                        <i class="fa-solid fa-box-open fa-2xl"></i>

                    </h2>
                    <br><br>
                    <h1>Total Packages : <?php echo $pack; ?></h1>
                    <br>

                    <a href="http://localhost/Photostudio_Website/HTML%20&%20PHP/package2.php" target="_blank"><i class="fa-solid fa-up-right-from-square fa-2xl"></i></a>
                </div>
                <div class="no_booking">
                    <h2>
                        <i class="fa-solid fa-calendar-check fa-2xl"></i>
                    </h2>
                    <br><br>
                    <h1>Total Bookings : <?php echo $email2; ?></h1>
                    <br>

                    <a href="http://localhost/Photostudio_Website/HTML%20&%20PHP/booking_info.php" target="_blank"><i class="fa-solid fa-up-right-from-square fa-2xl"></i></a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>