<!DOCTYPE html>
<html lang="en">

<head>

    <title>Gym Management</title>
    <link rel="icon" type="image/jpg" href="logo.jpg"/>
    <link rel="stylesheet" href="css/indexlp.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
</head>

<body>
    <!-- HEADER START FOM HERE -->
    <header>
        <img class="navbar-logo" src="logo.jpg">
        <nav class="navbar">
            <ul class="nav-links-ul">
                <li class="nav-links-li">
                    <a class="nav-links-anch" href="#home">Home</a>
                </li>
                <li class="nav-links-li">
                    <a class="nav-links-anch" href="#aboutus">About</a>
                </li>
                <li class="nav-links-li">
                    <a class="nav-links-anch" href="#pricing">Pricing</a>
                </li>
                <li class="nav-links-li">
                    <a class="nav-links-anch" href="#contactus">ContactUs</a>
                </li>
            </ul>
        </nav>
        <div class="header-btns">
            <button id="header-btn"><a class="header-btn-anch" href="Dashboard/User/User_login.php">Sign In</a></button>
            <button id="header-btn"> <a class="header-btn-anch"
                    href="Dashboard/Admin/Admin_login.php">Admin</a></button>
        </div>
    </header>
    <!-- HEADER END HERE -->



    <!-- MAIN START FROM HERE -->
    <div class="main-container">
        <div class="welcome-contanier" id="home">
            <div class="welcome-content">
                <h1 class="welcome-h1">NO PAIN <br> <small>NO GAIN</small></h1>
                <span class="welcome-span">Nice-looking body and powerful organism are
                    interconnected – and we can help you with both.</span>
                <button id="welcome-register-btn"><a id="welcome-register-btn-anch"
                        href="Dashboard/User/User_registration.php">Register NOW</a></button>
            </div>
        </div>

        <center id="cen-about-us">
            <h2><b>ABOUT US</b></h2>
        </center>
        <div class="about-us-contanier" id="aboutus">

            <div class="about-us-content">

                <center><video class="about-us-video-content" src="assets/Vid/about-us-video.mp4" preload="" autoplay="" muted=""
                        loop="" width="450px"></video></center>

                <div id="about-us-para">

                    <br>
                    <p>
                        "Welcome to <b>Gym & Fitness</b>, where fitness meets passion! We are not just a
                        gym; we are a community dedicated to transforming lives through the power
                        of health and wellness. Step into a world of energy, motivation, and
                        achievement as we guide you on your fitness journey. Our state-of-the-art
                        facilities, expert trainers, and diverse range of classes create an environment
                        that inspires and empowers. Whether you're a seasoned athlete or a fitness
                        novice,<b>Gym and Fitness</b> is your partner in reaching your fitness goals. Join us
                        today and experience the synergy of dedication, results, and a vibrant fitness
                        community. Your path to a healthier, stronger, and happier you starts right
                        here!"
                    </p>
                </div>
            </div>
        </div>


        <center id="cen-pricing">
            <h2><b>PRICING</b></h2>
        </center>

        <div class="pricing-contanier" id="pricing">

            <div id="pricing-card">
                <div id="pricing-card-content">
                    <span class="pricing-card-span">BASIC</span>
                    <h1 class="pricing-card-h1"><i class="fa-solid fa-rupee-sign"></i>&nbsp;1500</h1>
                    <label class="pricing-card-label"><i class="fa-solid fa-calendar-days"></i>1 MONTH</label>
                    <label class="pricing-card-label"><i class="fa-solid fa-clock"></i>24/7 Gym Access</label>
                    <label class="pricing-card-label"><i class="fa-solid fa-check"></i>Locker access</label>
                    <label class="pricing-card-label"><i class="fa-solid fa-check"></i>Personal Trainner</label>
                </div>
                <div id="pricing-card-content">
                    <span class="pricing-card-span">VIP</span>
                    <h1 class="pricing-card-h1"><i class="fa-solid fa-rupee-sign"></i>&nbsp;6000</h1>
                    <label class="pricing-card-label"><i class="fa-solid fa-calendar-days"></i>1 MONTH</label>
                    <label class="pricing-card-label"><i class="fa-solid fa-clock"></i>24/7 Gym Access</label>
                    <label class="pricing-card-label"><i class="fa-solid fa-check"></i>Locker access</label>
                    <label class="pricing-card-label"><i class="fa-solid fa-check"></i>Personal Trainner</label>
                </div>
                <div id="pricing-card-content">
                    <span class="pricing-card-span">STANDARD</span>
                    <h1 class="pricing-card-h1"><i class="fa-solid fa-rupee-sign"></i>&nbsp;4000</h1>
                    <label class="pricing-card-label"><i class="fa-solid fa-calendar-days"></i>1 MONTH</label>
                    <label class="pricing-card-label"><i class="fa-solid fa-clock"></i>24/7 Gym Access</label>
                    <label class="pricing-card-label"><i class="fa-solid fa-check"></i>Locker access</label>
                    <label class="pricing-card-label"><i class="fa-solid fa-check"></i>Personal Trainner</label>
                </div>
            </div>
        </div>


        <center id="cen-contact-us">
            <h2><b>Contact-Us</b></h2>
        </center>

        <div class="contact-us-contanier" id="contactus">
            <div id="contact-us-content">
                <div class="contact-us-para">
                    <i class="fa-solid fa-location-dot"></i><br>
                    <label class="contact-us-para-label">Address</label><br>
                    <span class="contact-us-para-span">At Post Man-Hinjwadi Pune-57</span>
                </div>
                <div class="contact-us-para">
                    <i class="fa-solid fa-phone-volume"></i><br>
                    <label class="contact-us-para-label">Phone</label><br>
                    <span class="contact-us-para-span">8888888888</span>
                </div>
                <div class="contact-us-para">
                    <i class="fa-solid fa-envelope"></i><br>
                    <label class="contact-us-para-label">Email</label><br>
                    <span class="contact-us-para-span">gymfitness@gmail.com</span>
                </div>
            </div>
        </div>

        <!-- MAIN ENDS HERE -->

        <!-- FOOTER START HERE -->
        <div class="footer">
            <ul class="footer-ul">
                <li class="footer-li"><a class="footer-anch" href="#home">Home</a></li>
                <li class="footer-li"><a class="footer-anch" href="#aboutus">About</a></li>
                <li class="footer-li"><a class="footer-anch" href="#pricing">Pricing</a></li>
                <li class="footer-li"><a class="footer-anch" href="#contactus">Contact Us</a></li>
            </ul>

            <span class="footer-copyright" style="font-size: 20px;">
                &copy All Rights Reserved | To YK,VK,VD
            </span>

        </div>
        <!-- FOOTER ENDS HERE -->
    </div>
</body>

</html>