<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <link rel="stylesheet" href="cascade/login.css">
    <script defer src="validate/loginformvalidate.js"></script>


</head>
<body> 

<?php

    //Initialize a session
    session_start();
    include 'database/config.php';
	error_reporting(0);


    if(isset($_POST['loginButton'])){

         $email = $_POST['email'];
         $pwd = $_POST['pwd'];

            $userType = substr($email,10);

            if($userType == "@student.utem.edu.my"){

                //check existing user from table student
                $sql = "SELECT * FROM student WHERE email = '$email' AND studentPwd = '$pwd'";
                $result = mysqli_query($conn,$sql);
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0) {

                    //set up variable that will be saved as session variables
                    $_SESSION['email'] = $email;

                    header("Location: home-page.php");

                }
                else {
                    header("Location: index.php?error=nouser");
                    exit();
                }
                $conn->close();
            }
            else{
                //check existing user
                $sql = "SELECT * FROM non_student WHERE email = '$email' AND pwd = '$pwd'";
                $result = mysqli_query($conn,$sql);
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0) {

                    //set up variable that will be saved as session variables
                    $_SESSION['email'] = $email;
                    
                    if($email == "admin@gmail.com"){
                        header("Location: display-donation.php");
                    }
                    else{
                        header("Location: home-page.php");
                    }

                }
                else{

                    header("Location: index.php?error=nouser");
                    exit();

                }
                $conn->close();
            }
        }
    //  }

?>


    <header><h1>UTeM Donation System</h1>
    </header>
    
    <div class="body">
        
        <div class="flex-box">
            
            <img class="image-box" src="https://img.freepik.com/free-vector/isometric-people-working-with-technology_52683-19078.jpg?t=st=1652061015~exp=1652061615~hmac=070f257009a58935368bff73ff672488e914bd9e98d4e57c6a68ef8ea683e879&w=1380" alt="illustration.png">

            <div class="login-form">

                <div class="flex-box2">
                    <p>Don't have an account?</p><a href="signup-page.php"><button type="button" name="signupButton" id="signupButton">Sign Up</button></a>
                </div>

                <div class="flex-box3">
                    <h3 class="login-header">Hello! Welcome back.</h3>

                    <form name="login-submit" id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                        <div class="input-control">
                        <label for="email">Email</label><br>
                        <input type="text" name="email" id="email" size="40">
                        <div class="error"></div>
                         </div>

                        <div class="input-control">
                        <label for="pwd">Password</label><br>
                        <input type="password" name="pwd" id="pwd" size="40">
                        <div class="error"></div>
                        </div>

                        <center>
                        <p style="text-align: end;" id="forgotPwd">Forgot password?</p>
                        <input type="submit" name="loginButton" id="loginButton" value="Login">
                        </center>
                    </form>
                </div>

            </div>

        </div>

    </div>

    <?php include("footer.php"); ?>
    
</body>
</html>