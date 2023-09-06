<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Photostudio_Website/CSS/booking.css">
    <title>Booking</title>

</head>

<body>
    <div class="container">
        <?php
        if (isset($_POST["submit"])) //works only if someone clicks submit button
        {
            $fullname = $_POST["username"];
            $email = $_POST["email"];
            $date = $_POST["date"];
            $phone = $_POST["phone"];
            $services = $_POST["service"];
            $packages = $_POST["package"];
            $message = $_POST["message"];

            $errors = array();

            if (empty($fullname) and empty($email) and empty($date) and empty($phone)  and empty($services) and empty($packages) and empty($message)) {
                array_push($errors, "Please fill the required fields");
            }
            if (empty($fullname) or empty($email) or empty($date) or empty($phone)  or empty($services) or empty($packages) or empty($message)) {
                array_push($errors, "All fields are required");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Enter a valid Email");
            }
            require_once "data2.php";
            $sql = "SELECT * FROM booking_details WHERE email='$email'";
            $result = mysqli_query($conn, $sql);
            $rowcount = mysqli_num_rows($result);
            if ($rowcount > 0) {
                array_push($errors, "Already Booked!");
            }
            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            } else {
                $sql = "INSERT INTO booking_details (Username, Email, Date_of_Event, Contact_no, Selected_service, Selected_package, Message) VALUES ( ?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                $preparestmt = mysqli_stmt_prepare($stmt, $sql);
                if ($preparestmt) {
                    mysqli_stmt_bind_param($stmt, "sssssss", $fullname, $email, $date, $phone, $services, $packages, $message);
                    mysqli_stmt_execute($stmt);
                    header("Location: /begin_php/book_success.php");
                } else {
                    die("Something went wrong");
                }
            }
        }
        ?>
        <h1 class="form-head">Photoshoot Booking</h1>
        <form id="booking-form" action="booking.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="event-date">Event Date:</label>
            <input type="date" id="event-date" name="date" required>
            <label for="contact">Contact Number:</label>
            <input type="text" name="phone" required>
            <label for="services">Select Service:</label>
            <select id="services" name="service" style="color: #fff;">
                <option value="---Select---">---Select---</option>
                <option value="Wedding and wedding related Photography">Wedding and wedding related Photography</option>
                <option value="Nature Photography">Nature Photography</option>
                <option value="Tourism Photography">Tourism Photography</option>
            </select>
            <label for="services">Select Package:</label>
            <select id="services" name="package" style="color: #fff;">
                <option value="---Select---">---Select---</option>
                <option value="Enagement(Rs 10000)">Enagement(Rs 10000)</option>
                <option value="Grand Engament(Rs 30000)">Grand Engament(Rs 30000)</option>
                <option value="Any small functions(Rs 5000)">Any small functions(Rs 5000)</option>
                <option value="Wedding(Rs 20000)">Wedding(Rs 20000)</option>
                <option value="Grand Wedding(Rs 50000)">Grand Wedding(Rs 50000)</option>
                <option value="Capture Natural things(Rs 10000)">Capture Natural things(Rs 10000)</option>
                <option value="Local Tour(Rs 5000)">Local Tour(Rs 5000)</option>
                <option value="Foreign Tourism(Rs 30000)">Foreign Tourism(Rs 30000)</option>
            </select>
            <label for="message">Your Message:</label>
            <textarea name="message" style="background-color:#262626; color:#fff;" id="message-container" class="message" cols="30" rows="10" placeholder="Anything you want to say"></textarea>
            <input type="submit" name="submit" class="book" value="Book Now">
            <hr>
            <script>
                var element = document.getElementById(refresh).element.reset()
            </script>
            <input type="submit" class="refresh" id="refresh" value="Refresh Form">
        </form>

    </div>



</body>

</html>