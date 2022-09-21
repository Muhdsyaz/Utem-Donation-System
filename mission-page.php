<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mission Page</title>
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
            <div class="about-layout">

                <h1>About Us</h1>

                <p>Recent years have seen a significant impact on the foundations of this unique ecosystem because of the rapid spread of the coronavirus (Covid-19) outbreak, causing anxiety about the ramifications for higher education. Students are prohibited from travelling to their hometowns, even if their tickets have been paid. The main issue that arose was food and medical supply. Many people lack the financial means to purchase meals and even high cost of medicine kit. Therefore, a solution needed for this kind of situation although today we are in moving forward towards endemic phase.</p>

            </div>

            <div class="mission-layout">
                <div class="mission">

                    <h3>Mission</h3>

                    <p>To develop a web application which can helps student to channel their donation to other student who are undergoing quarantine in university hostel.</p>
                    <p>To increase the access of student to food, medical and other resources while in quarantine.</p>
                    <p>To conserve the environment via reduce, reuse, and recycle.</p>

                </div>

                <div class="mission">

                    <h3>Problem Statement</h3>

                    <p>Numerous studies have examined the impact of the pandemic on university students' mental health and the factors linked with increased levels of distress. Stockpiling, which has been a popular human response to Covid-19, would normally be considered as waste-increasing, as families frequently mismanage extra food.  </p>

                </div>

                <div class="mission">

                    <h3>Project Significance</h3>

                    <p>The purpose of this website develops it to help student indeed of food, helps in any services, temporary aid, and medicines. It is significant for today as it plays important role in both parties. It is involving a group of community mainly in the campus that will share their extras value to others. Student are recommended to approach the other party via communication thru the website. This will bring important role to both party in balancing the restriction movement environment. On the other hand, reduce of waste such as extra food, extra things, and even extra hands more than 80%. Thus, this website is developed for the student, by the student for better infrastructure among community of the student.</p>

                </div>

            </div>

        </div>
        

    </div>
    
    <?php include("footer.php"); ?>

</body>
</html>