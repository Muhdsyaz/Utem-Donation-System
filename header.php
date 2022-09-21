<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="cascade/style.css">
        <title>Head page</title>
    </head>
    <body>
        <center>
          <!-- <h2 id="logo">LOGO</h2> -->

            <div class="menu-profile">

                <?php
                    include 'database/session.php';
                    $email = $_SESSION['email'];

                    $userType = substr($_SESSION['email'],10);

                    if($userType == "@student.utem.edu.my"){

                        //check existing user from table student
                        $sql = "SELECT * FROM student WHERE email = '$email'";
                        $result = mysqli_query($conn,$sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {

                                $fname = $row["fullname"];
                      
                            }
                        } else {
                            echo "0 results";
                        }
                        // $conn->close();
                    }
                    else{
                        //check existing user
                        $sql = "SELECT * FROM non_student WHERE email = '$email'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {

                                $fname = $row["fullname"];

                            }
                        } else {
                            echo "0 results";
                        }
                        // $conn->close();
                    }
                    

                    echo "<h3><b>Welcome</b></h3>";
                    echo "<p>".$fname."</p>";
                    // echo "<a href='profile-page.php'><img class='profile_image' src='zani.JPG' alt='profile.png'>";
                    echo "<h6>" .$email. "</h6></a>";

                ?>

            </div> 
           
            <div class="menu-item">
            <a href="profile-page.php"><i class="fa-solid fa-user"></i>  Profile</a>
            <a href="home-page.php"><i class="fa fa-home fa-lg"></i>  Home</a>
            <a href="mission-page.php"><i class="fa-solid fa-rectangle-list fa-lg"></i>  About Us</a>
            <a href="donation-form.php"><i class="fa-solid fa-circle-dollar-to-slot fa-lg"></i>  Donation</a>
            <a href="request-donation-form.php"><i class="fa-solid fa-hand-holding-dollar fa-lg"></i>  Request Donation</a>
            <a href="logout.php"><i class="fa-solid fa-right-from-bracket fa-lg"></i>  Logout</a>
            </div>

        </center>
    </hr>
    </body>
</html>