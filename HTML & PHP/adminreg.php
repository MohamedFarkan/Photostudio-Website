<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: adminpage.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Photostudio_Website/CSS/adminreg.css">
    <script src="https://kit.fontawesome.com/b21ac06503.js" crossorigin="anonymous"></script>
    <title>Admin Register</title>
</head>

<body>
    <div class="container">
        <?php
        if (isset($_POST["submit"])) //works only if someone clicks submit button
        {
            $fullname = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"]; //encrypting the passs
            $cpass = $_POST["con_pass"];

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);


            $errors = array();

            if (empty($fullname) and empty($email) and empty($password) and empty($cpass)) {
                array_push($errors, "Please fill the required fields");
            }
            if (empty($fullname) or empty($email) or empty($password) or  empty($cpass)) {
                array_push($errors, "All fields are required");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Enter a valid Email");
            }
            if (strlen($password) < 8) {
                array_push($errors, "Password needs to contain atleast 8 characters");
            }
            if ($password !== $cpass) {
                array_push($errors, "Password does not match");
            }
            require_once "data.php";
            $sql = "SELECT * FROM admin_details WHERE email='$email'";
            $result = mysqli_query($conn, $sql);
            $rowcount = mysqli_num_rows($result);
            if ($rowcount > 0) {
                array_push($errors, "User already exists!");
            }
            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            } else {
                $sql = "INSERT INTO admin_details (username, email, password) VALUES ( ?, ?, ? )";
                $stmt = mysqli_stmt_init($conn);
                $preparestmt = mysqli_stmt_prepare($stmt, $sql);
                if ($preparestmt) {
                    mysqli_stmt_bind_param($stmt, "sss", $fullname, $email, $passwordHash);
                    mysqli_stmt_execute($stmt);
                    echo '<script type="text/javascript">';
                    echo ' alert("Admin Registration Successful")';  //not showing an alert box.
                    echo '</script>';
                } else {
                    die("Something went wrong");
                }
            }
        }
        ?>
        <h2>Admin Register</h2>
        <form id="login-form" action="adminreg.php" method="post">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="email" name="username" required>
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="password" name="email" required>
            </div>
            <div class="input-group">
                <label for="inputpassword1">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="inputpassword2">Confirm Password</label>
                <input type="password" id="password" name="con_pass" required>
            </div>
            <button type="submit" name="submit" class="btn">Register</button>
        </form>
        <div class="social-links">
            <h5>Aleary have an account?</h5><a href="http://localhost/Photostudio_Website/HTML%20&%20PHP/adminlog.php">Login as Admin</a>
        </div>
    </div>

</body>

</html>