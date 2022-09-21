<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile Page</title>
</head>
<body>

    <?php

    //Initialize a session
    session_start();

    $email = $fname = $phone = $pwd = "";

    include ('database/session.php');
    // error_reporting(0);

        $userType = substr($_SESSION['email'],10);

        if($userType == "@student.utem.edu.my"){

            //check existing user from table student
            $sql = "SELECT * FROM student WHERE email = '$email'";
            $result = mysqli_query($conn,$sql);

            if (mysqli_num_rows($result) >  0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                $fname = $row["fullname"];
                $phone = $row["phone"];
                }

            }
            
            $conn->close();
        }
        else{
            //check existing user
            $sql = "SELECT * FROM non_student WHERE email = '$email'";
            $result = mysqli_query($conn,$sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                $fname = $row["fullname"];
                $phone = $row["phone"];
                }

            }
            
            $conn->close();
        }

    ?>

    <header>
        <h1>UTeM Donation System</h1>
    </header>

    <div class="main">
        <div class="menu">
            <?php include("header.php"); ?>
        </div>

        <div class="body" style="background-image: url('https://www.utem.edu.my/images/2020/pages/imageWelcomeUTeM.jpg'); background-repeat: no-repeat; background-size: cover;">

            <div class="profile-layout">

                <h2>Profile</h2>

                <div class="profile-detail">
                    <!-- <img src="zani.JPG" alt="profile.png" width="180px"><br> -->

                    <form name="editProfileForm" method="POST" action="database/updateProfile.php">

                        <label><b>Name:</b></label><br>
                        <input type="text" name="fname" value=<?php echo "\"".$fname."\""; ?>><br>
                        <label><b>Phone:</b></label><br>
                        <input type="text" name="phone" value=<?php echo $phone ?>><br>
                        <label><b>Email:</b></label><br>
                        <input type="text" name="email" value=<?php echo $email ?>><br>

                        <div>
                            <a href="profile-page.php"><button type="button">Back</button></a>
                            <button type="submit">Update</button>
                        </div>

                    </form>

                </div>
            
            </div>
        </div>

    </div>
    
    <?php include("footer.php"); ?>

</body>
</html>