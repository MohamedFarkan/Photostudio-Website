<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: adminlog.php");
}

include 'data.php';
$query = "SELECT * FROM add_package";
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
    <title>Packages</title>
</head>

<body class="bg-dark">
    <div class="conatiner">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="class-header">
                        <h1 class="display-6 text-center">Packages</h1>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr class="bg-dark text-white">
                                <td>Package ID</td>
                                <td>Package Name</td>
                                <td>Package Includes Event</td>
                                <td>Price</td>
                                <td>Edit Package</td>
                                <td>Delete Package</td>
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
                                    <td><?php echo $row['package_name']; ?></td>
                                    <td><?php echo $row['package_includes']; ?></td>
                                    <td><?php echo $row['price_of_package']; ?></td>

                                    <td><a href="updatepack.php?updateid=<?php echo $id; ?>" class="btn btn-primary">Update <i class="fa-solid fa-pen-to-square"></i></a></td>
                                    <td><a href="deletepack.php?deleteid=<?php echo $id; ?>" class="btn btn-danger">Delete <i class="fa-solid fa-trash"></i></a></td>

                            </tr>
                        <?php
                                }
                        ?>

                        </table>
                        <a href="http://localhost/Photostudio_Website/HTML%20&%20PHP/addpack.php" target="_blank" class="btn btn-success">Add Package <i class="fa-solid fa-plus"></i></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>