<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: adminlog.php");
}

include 'data2.php';
$query = "SELECT * FROM booking_details";
$result = mysqli_query($conn, $query);
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Photostudio_Website/CSS/package2.css">
    <script src="https://kit.fontawesome.com/b21ac06503.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Booking Details</title>
</head>

<body class="bg-dark">
    <div class="conatiner">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="class-header">
                        <h1 class="display-6 text-center">Booking Details</h1>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr class="bg-dark text-white">
                                <td>Booking ID</td>
                                <td>Username</td>
                                <td>Email</td>
                                <td>Date of Event</td>
                                <td>Mobile</td>
                                <td>Selected Service</td>
                                <td>Selected Package</td>
                                <td>Message</td>

                                <td>Reject Booking</td>
                            </tr>
                            <tr>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['ID'];
                                    /* $name = $row['package_name'];
                                     $pinc = $row['package_name'];
                                     $pkprice = $row['price_of_package'];*/
                                ?>
                                    <td scope="row"><?php echo $id; ?></td>
                                    <td><?php echo $row['Username']; ?></td>
                                    <td><?php echo $row['Email']; ?></td>
                                    <td><?php echo $row['Date_of_Event']; ?></td>
                                    <td><?php echo $row['Contact_no']; ?></td>
                                    <td><?php echo $row['Selected_service']; ?></td>
                                    <td><?php echo $row['Selected_package']; ?></td>
                                    <td><?php echo $row['Message']; ?></td>



                                    <td><a href="remove_book.php?deleteid=<?php echo $id; ?>" class="btn btn-danger">Reject Booking<i class="fa-solid fa-trash"></i></a></td>

                            </tr>
                        <?php
                                }
                        ?>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>