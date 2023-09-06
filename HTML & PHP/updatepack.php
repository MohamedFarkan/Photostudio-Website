<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: adminlog.php");
}

include 'data3.php';

$id = $_GET['updateid'];

$query = "SELECT * FROM add_package WHERE id='$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);


if (isset($_GET['updateid'])) {
    $id = $_GET['updateid'];

    // Check if the form was submitted
    if (isset($_POST['submit'])) {
        $pname = mysqli_real_escape_string($conn, $_POST["package_name"]);
        $pinclude = mysqli_real_escape_string($conn, $_POST["package_includes"]);
        $pack_price = mysqli_real_escape_string($conn, $_POST["price"]);

        // Use a prepared statement to update data
        $query = "UPDATE add_package SET package_name=?, package_includes=?, price_of_package=? WHERE id=?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ssdi", $pname, $pinclude, $pack_price, $id);
        if (mysqli_stmt_execute($stmt)) {
            echo '<script type="text/javascript">';
            echo 'alert("Package Updated Successfully");';
            echo 'window.location.href = "package2.php";'; // Redirect using JavaScript
            echo '</script>';
            exit(); // Terminate script execution after the redirect.
        } else {
            die("Something went wrong: " . mysqli_error($conn));
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Photostudio_Website/CSS/adminreg.css">
    <script src="https://kit.fontawesome.com/b21ac06503.js" crossorigin="anonymous"></script>
    <title>Update Package</title>
</head>

<body>
    <div class="container">

        <h2>Update Package</h2>
        <form id="login-form" method="post">
            <div class="input-group">
                <label for="packname">Package Name:</label>
                <input type="text" id="pack_name" name="package_name" required autocomplete="off" value=<?php echo $row["package_name"]; ?>>
            </div>
            <div class="input-group">
                <label for="pack_include">Package Includes:</label>
                <input type="text" id="pack_include" name="package_includes" required autocomplete="off" value=<?php echo $row["package_includes"]; ?>>
            </div>
            <div class="input-group">
                <label for="price">Price of Package:</label>
                <input type="text" id="price" name="price" required autocomplete="off" value=<?php echo $row["price_of_package"]; ?>>
            </div>

            <button type="submit" name="submit" class="btn">Update</button>
        </form>

    </div>

</body>

</html>