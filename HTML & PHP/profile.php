<?php
session_start();
echo $_SESSION["user"];

if (!isset($_SESSION["user"])) {
    header("Location: log2.php");
}

include 'data.php'; // Include the database connection

$userID = $_SESSION["user"]; // Use the user ID stored in the session
$email = $_SESSION['user'];

$query = "SELECT * FROM user_details WHERE email = '$email' ";
echo $query;
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $name = $row['username'];
    $email = $row['email'];
} else {
    echo "User not found!";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <script src="https://kit.fontawesome.com/b21ac06503.js" crossorigin="anonymous"></script>
    <title>Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: black;
            margin: 0;
            padding: 0;
        }

        .profile {
            text-align: center;
            margin: 50px auto;
            padding: 50px;
            background-color: white;
            border: 1px solid #ccc;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
        }

        h1 {
            margin: 0;
            font-size: 24px;
        }

        p {
            margin: 10px 0;
            font-size: 16px;
        }

        .logout {
            text-align: center;
            margin-top: 20px;
        }

        .logout a {
            color: #007bff;
            text-decoration: none;
        }

        .logout a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="profile">
        <a href=""></a><i class="fa-solid fa-user fa-2xl"></i></a><br>
        <br><br>
        <h1><?php echo $name; ?></h1>
        <p>Email: <?php echo $email; ?></p>
    </div>
    <div class="logout">
        <a href="logout.php">Logout</a>
    </div>
</body>

</html>