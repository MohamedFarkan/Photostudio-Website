<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: log2.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Photostudio_Website</title>

    <link rel="stylesheet" href="/Photostudio_Website/CSS/home.css" />
    <link rel="stylesheet" href="home.js" />
    <script src="https://kit.fontawesome.com/b21ac06503.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <nav>
            <img src="/Photostudio_Website/images/port_img/diaphragm.png" alt="LOGO" class="logo" />
            <input type="search" placeholder="search....." id="searchInput" /><i class="fa-solid fa-magnifying-glass"></i>

            <ul>
                <li><a href="#">Home</a></li>
                <div class="dropdown-menu">
                    <li>
                        <a><button class="menu-btn">
                                Gallery
                                <i class="fa-solid fa-chevron-down" id="dowm"></i></button></a>
                    </li>
                    <div class="menu-content">
                        <a class="links-hidden" href="http://localhost/Photostudio_Website/HTML%20&%20PHP/wed.html" target="_blank">Wedding Photography</a>
                        <hr />
                        <a class="links-hidden" href="http://localhost/Photostudio_Website/HTML%20&%20PHP/nature.html" target="_blank">Nature Photography</a>
                        <hr />
                        <a class="links-hidden" href="http://localhost/Photostudio_Website/HTML%20&%20PHP/tour.html" target="_blank">Tourism Photography</a>
                    </div>
                </div>
                <li><a href="#services">Services</a></li>
                <li>
                    <a href="http://localhost/Photostudio_Website/HTML%20&%20PHP/booking.php" target="_blank">Book Now</a>
                </li>
                <li><a href="http://localhost/Photostudio_Website/HTML%20&%20PHP/package.php" target="_blank">Packages</a></li>
                <li><a href="#contact">Contact</a></li>
                <div class="dropdown-menu">
                    <li>
                        <a><button class="menu-btn">
                                <i class="fa-solid fa-user fa-2xs"></i>
                                <i class="fa-solid fa-chevron-down" id="dowm"></i></button></a>
                    </li>
                    <div class="menu-content">
                        <a class="links-hidden" href="profile.php" target="_blank">Profile</a>
                        <hr />
                        <a class="links-hidden" href="logout.php">Logout</a>


                    </div>
                </div>
            </ul>
        </nav>
        <hr />
        <div class="simple">
            <img src="/Photostudio_Website/images/port_img/collections of  0 (1).png" alt="" class="im1" />
            <div class="cont">
                <h1>Wellcome! Here,</h1>
                <p>
                    you'll find a collection of vibrant and captivating <br />
                    photographs that will illuminate your inner light.<br />Let's embark
                    on this adventurous journey and <br />
                    showcase the beauty together!📸🎨✨
                </p>
            </div>
        </div>
    </div>
    <!------------------services part------------------------------------------>
    <div id="services">
        <div class="container">
            <div class="title">
                <h1>Services</h1>
            </div>
            <div class="service-list">
                <div class="wedd">
                    <h2>
                        Wedding Photography <img src="/Photostudio_Website/images/port_img/rings.png" class="im2" />
                    </h2>
                    <p>
                        Celebrate love's timeless journey with a touch of artistry. Let us
                        capture your beautiful wedding moments.📸💍✨
                    </p>
                    <a href="#">Learn More</a>
                </div>
                <div class="nature">
                    <h2>
                        Nature photography
                        <img src="/Photostudio_Website/images/port_img/planet-earth.png" class="im2" />
                    </h2>
                    <p>
                        Immerse yourself in the raw beauty of nature's canvas, where every
                        click captures a masterpiece.📸🌿✨
                    </p>
                    <a href="#">Learn More</a>
                </div>
                <div class="tour">
                    <h2>
                        Tourism photography <img src="/Photostudio_Website/images/port_img/tourism.png" class="im2" />
                    </h2>
                    <p>
                        Capture the essence of your travel adventures with stunning
                        tourism photography that tells your unique story.📸✈️🌍
                    </p>
                    <a href="#">Learn More</a>
                </div>
            </div>
        </div>
    </div>
    <!--PORTFOLIO--------------------------->
    <div id="folio">
        <div class="container">
            <div class="sub-title">
                <h1>Awesome moments</h1>
                <div class="work">
                    <div class="work-list">
                        <div class="a1">
                            <img src="/Photostudio_Website/images/port_img/nature-3082832_1280.jpg" alt="" />
                        </div>
                        <div class="txt">
                            <p class="tx1">
                                <i style="font-weight: bolder">
                                    FOR IN THE TRUE NATURE OF THINGS,</i><br />
                                In nature's gallery, trees frame a canvas of beauty, where the
                                symphony of thunder adds drama to the breathtaking view. If we
                                rightly consider,every green trees is far more glorious than
                                if it were made of gold and silver.
                            </p>
                        </div>
                    </div>
                    <div class="work-list">
                        <div class="a2">
                            <img src="/Photostudio_Website/images/port_img/butterflies-1127666_1280.jpg" alt="" />
                        </div>
                        <div class="txt">
                            <p class="tx2">
                                Capturing the delicate dance of tghe butterflies and the
                                vibrant beauty of flowers in one frame.Nature's
                                masterpiece🦋🌺✨.
                            </p>
                        </div>
                    </div>
                    <div class="work-list">
                        <div class="a3">
                            <img src="/Photostudio_Website/images/port_img/dandelion-445228_1280.jpg" alt="" />
                        </div>
                        <div class="txt">
                            <p class="tx3">
                                <i style="font-weight: bolder">ARTISTIC DANDELION WITH WATER DROPLETS,</i><br />
                                Behold the enchanting dance of winter's touch on a delicate
                                dandelion, adorned with glistenting droplets.Natures icy
                                masterpiece. "Nature weaves its magic as snow delicate the
                                graces the dandelion,each droplet a frozen gem.A mesmerizing
                                winter symphony."❄️💮💎
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------------------Contact------------------>
    <div id="contact">
        <div class="container">
            <div class="row">
                <div class="con-left">
                    <h1 class="sub-title">
                        Contact Us <i class="fa-solid fa-address-book"></i>
                    </h1>
                    <p><i class="fa-solid fa-paper-plane"></i> contact@example.com</p>
                    <p><i class="fa-solid fa-phone"></i> 1234567890</p>
                    <div class="social-icons">
                        <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook"></i></a>
                        <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
                        <a href="https://twitter.com/i/flow/login?input_flow_data=%7B%22requested_variant%22%3A%22eyJsYW5nIjoiZW4ifQ%3D%3D%22%7D"><i class="fa-brands fa-square-x-twitter"></i></a>
                        <a href="https://www.whatsapp.com/"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="con-right">
                    <form action="" name="submit-to-google-sheet">
                        <input type="text" name="Name" placeholder="Your Name" required /><br />
                        <input type="email" name="Email" placeholder="Your Email" required /><br />
                        <textarea name="Message" rows="6" placeholder="Your Message"></textarea>
                        <button type="submit">Submit</button>
                    </form>
                    <p><span id="msg"></span></p>
                </div>
            </div>
        </div>
    </div>
    <a href="#"> <button class="top">Scroll to Top</button></a>
    <script>
        const scriptURL =
            "https://script.google.com/macros/s/AKfycbz4exlxMpIelN4Pk_h8T-nITW9XXZEdwinfe8Iox4tYY9LbMKEDIncR6qYPfUeDUhx5JA/exec";
        const form = document.forms["submit-to-google-sheet"];
        const mag = document.getElementById("msg");
        form.addEventListener("submit", (e) => {
            e.preventDefault();
            fetch(scriptURL, {
                    method: "POST",
                    body: new FormData(form)
                })
                .then((response) => {
                    msg.innerHTML = "Message sent successfully😉";
                    setTimeout(function() {
                        msg.innerHTML = "";
                    }, 5000);
                    form.reset();
                })
                .catch((error) => console.error("Error!", error.message));
        });
    </script>
</body>

</html>