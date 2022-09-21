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

    include ('database/config.php');
    include ('database/session.php');

    $email = $_SESSION['email'];

        $userType = substr($_SESSION['email'],10);

        if($userType == "@student.utem.edu.my"){

            //check existing user from table student
            $sql = "SELECT * FROM student WHERE email = '$email'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                $fname = $row["fullname"];
                $phone = $row["phone"];
                }

            }
            
            $conn->close();
        }
        else{
            //check existing user
            $sql = "SELECT * FROM non_student WHERE email = '$email'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
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


                    <label><b>Name:</b></label><br>
                    <p><?php echo $fname ?></p><br>
                    <label><b>Phone:</b></label><br>
                    <p><?php echo $phone ?></p><br>
                    <label><b>Email:</b></label><br>
                    <p><?php echo $email ?></p><br>

                    <a href="edit-profile-page.php"><button type="button">Edit Profile</button></a>
                </div>
            
            </div>
        </div>

    </div>
    
    <?php include("footer.php"); ?>

</body>
</html>