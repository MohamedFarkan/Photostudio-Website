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
    <link rel="stylesheet" href="/Photostudio_Website/CSS/log2.css">
    <script src="https://kit.fontawesome.com/b21ac06503.js" crossorigin="anonymous"></script>
    <title>Admin Login</title>
</head>

<body>
    <div class="container">
        <?php
        if (isset($_POST["login"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            require_once "data3.php";
            $sql = "SELECT * FROM admin_details WHERE email='$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {

                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "true";
                    header("Location: adminpage.php");
                    die();
                } else {
                    echo "<div class='error'><h4>Wrong password😥</h4></div>";
                }
            } else {
                echo "<div class='error'>User does not exist☹️</div>";
            }
        }

        ?>
        <h2>Admin Login</h2>
        <form id="login-form" action="adminlog.php" method="post">
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="login" class="btn">Login</button>
        </form>
        <div class="social-links">
            <h5>New Admin?</h5> <a href="http://localhost/begin_php/adminreg.php">Admin Register</a>

        </div>
    </div>
</body>

</html>