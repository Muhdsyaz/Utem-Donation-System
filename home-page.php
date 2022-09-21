<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
</head>
<body>

    <?php

    //Initialize a session
    session_start();

    include ('database/session.php');

    ?>

    <header>
        <h1>UTeM Donation System</h1>
    </header>

    <div class="main">
        <div class="menu">
            <?php include("header.php"); ?>
        </div>

        <div class="body" style="background-image: url('https://www.utem.edu.my/images/2020/pages/imageWelcomeUTeM.jpg'); background-repeat: no-repeat; background-size: cover;">
        <!-- <div class="body"> -->
            <div class="background">
                <h1>A Platform To Channel Donation <br> To Quarantined Student at UTeM. </h1><br>
                <p>To Provide Them With Foods And Basic <br> Needs To Ease Their Problems</p>
                <a href="mission-page.php">Read More</a>
            </div>

        </div>

    </div>
    
    <?php include("footer.php"); ?>

</body>
</html>