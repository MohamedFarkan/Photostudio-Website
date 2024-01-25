<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: admin.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminreg.css">
    <script src="https://kit.fontawesome.com/b21ac06503.js" crossorigin="anonymous"></script>
    <title>Add Packages</title>
</head>

<body>
    <div class="container">
        <?php
        if (isset($_POST["submit"])) //works only if someone clicks submit button
        {
            $pname = $_POST["pack_name"];
            $pinclude = $_POST["pack_include"];
            $pack_price = $_POST["price"];

            $errors = array();

            require_once "data.php";
            $sql = "SELECT * FROM add_package WHERE package_name='$pname'";
            $result = mysqli_query($conn, $sql);
            $rowcount = mysqli_num_rows($result);
            if ($rowcount > 0) {
                array_push($errors, "Package Already Exists!");
            }
            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            } else {
                $sql = "INSERT INTO add_package (package_name, package_includes, price_of_package) VALUES ( ?, ?, ? )";
                $stmt = mysqli_stmt_init($conn);
                $preparestmt = mysqli_stmt_prepare($stmt, $sql);
                if ($preparestmt) {
                    mysqli_stmt_bind_param($stmt, "sss", $pname, $pinclude, $pack_price);
                    mysqli_stmt_execute($stmt);
                    echo '<script type="text/javascript">';
                    echo ' alert("Package Added Successfully")';  //not showing an alert box.
                    echo '</script>';
                } else {
                    die("Something went wrong");
                }
            }
        }
        ?>
        <h2>Package Adder</h2>
        <form id="login-form" action="addpack.php" method="post">
            <div class="input-group">
                <label for="packname">Package Name:</label>
                <input type="text" id="pack_name" name="pack_name" required autocomplete="off">
            </div>
            <div class="input-group">
                <label for="pack_include">Package Includes:</label>
                <input type="text" id="pack_include" name="pack_include" required autocomplete="off">
            </div>
            <div class="input-group">
                <label for="price">Price of Package:</label>
                <input type="text" id="price" name="price" required autocomplete="off">
            </div>

            <button type="submit" name="submit" class="btn">Submit</button>
        </form>

    </div>

</body>

</html>