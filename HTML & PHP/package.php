<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: log2.php");
}

include 'data.php'; // Include the database connection



$query = "SELECT * FROM add_package";
$result = mysqli_query($conn, $query);

// Create an array to store package data

/*if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $pname = $row['package_name'];
        $pincl = $row['package_includes'];
        $pprice = $row['price_of_package']; // Store each package's data in the array
    }
} else {
    echo "No packages found!";
}*/


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Photostudio_Website/CSS/package.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caprasimo&family=Playfair+Display:ital@1&family=Poppins:ital,wght@0,200;1,100&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b21ac06503.js" crossorigin="anonymous"></script>
    <title>Packages</title>
</head>

<body>

    <h1>Packages</h1>
    <div class="container">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
        ?>
            <div class="package-card">
                <h2>Package<?php echo $id; ?></h2>
                <h3>Package Name :<?php echo $row['package_name']; ?></h3>
                <p>Includes :<?php echo $row['package_includes']; ?></p>
                <p>Price: <i class="fa-solid fa-indian-rupee-sign"> <?php echo $row['price_of_package']; ?></i></p>
                <a href="http://localhost/Photostudio_Website/HTML%20&%20PHP/booking.php" target="_blank"><button class="btn">Book Now</button></a>
            </div>
        <?php
        }
        ?>

        <!-- <div class="package-card">
            <h3>Package 3</h3>
            <p>Includes: Any small function</p>
            <p>Price: <i class="fa-solid fa-indian-rupee-sign"></i>5000</p>
            <a href="http://localhost/begin_php/booking.php" target="_blank"><button class="btn">Book Now</button></a>
        </div>
        <div class="package-card">
            <h3>Package 4</h3>
            <p>Includes: Wedding</p>
            <p>Price: <i class="fa-solid fa-indian-rupee-sign"></i>20000</p>
            <a href="http://localhost/begin_php/booking.php" target="_blank"><button class="btn">Book Now</button></a>
        </div>
        <div class="package-card">
            <h3>Package 5</h3>
            <p>Includes: Grand wedding</p>
            <p>Price: <i class="fa-solid fa-indian-rupee-sign"></i>50000</p>
            <a href="http://localhost/begin_php/booking.php" target="_blank"><button class="btn">Book Now</button></a>
        </div>
        <div class="package-card">
            <h3>Package 6</h3>
            <p>Includes: Natural Photography</p>
            <p>Price: <i class="fa-solid fa-indian-rupee-sign"></i>10000</p>
            <a href="http://localhost/begin_php/booking.php" target="_blank"><button class="btn">Book Now</button></a>
        </div>
        <div class="package-card">
            <h3>Package 7</h3>
            <p>Includes: Local Tour</p>
            <p>Price: <i class="fa-solid fa-indian-rupee-sign" target="_blank"></i>5000</p>
            <a href="http://localhost/begin_php/booking.php"><button class="btn">Book Now</button></a>
        </div>
        <div class="package-card">
            <h3>Package 8</h3>
            <p>Includes: International Tour</p>
            <p>Price: <i class="fa-solid fa-indian-rupee-sign"></i>30000</p>
            <a href="http://localhost/begin_php/booking.php" target="_blank"><button class="btn">Book Now</button></a>
        </div>-->

    </div>
</body>

</html>