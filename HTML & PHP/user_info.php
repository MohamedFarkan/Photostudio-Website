<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: adminlog.php");
}

include 'data.php';
$query = "SELECT * FROM user_details";
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
    <title>User Information</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Caprasimo&family=Playfair+Display:ital@1&family=Poppins:ital,wght@0,200;1,100&display=swap');

        * {
            margin: 0;
            padding: 0;
            font-family: 'Caprasimo', cursive;
            font-family: 'poppins', serif;
            box-sizing: border-box;
        }
    </style>
</head>

<body class="bg-dark">
    <div class="conatiner">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="class-header">
                        <h1 class="display-6 text-center">User Information</h1>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr class="bg-dark text-white">
                                <td>
                                    <h3>User ID</h3>
                                </td>
                                <td>
                                    <h3>Username</h3>
                                </td>
                                <td>
                                    <h3>User's Email</h3>
                                </td>
                                <td>
                                    <h3>Remove User</h3>
                                </td>
                            </tr>
                            <tr>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['id'];
                                    /* $name = $row['package_name'];
                                     $pinc = $row['package_name'];
                                     $pkprice = $row['price_of_package'];*/
                                ?>
                                    <td scope="row"><?php echo $id; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><a href="remove_user.php?deleteid=<?php echo $id; ?>" name="remove_user" class="btn btn-danger">Remove User <i class="fa-solid fa-user-xmark"></i></a></td>

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