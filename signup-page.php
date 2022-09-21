<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="validate/signupformvalidation.js"></script>
    <title>Sign Up Page</title>

    <link rel="stylesheet" href="cascade/signup.css">


</head>
<body>

<?php
	session_start();
	include 'database/config.php';
	error_reporting(0);
// // $fnameErr = $phoneErr = $emailErr = $pwdErr = $confirmPwdErr = "";

if(isset($_POST['signupButton'])){

    $fname = $_POST['fname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $confirmpwd = $_POST['confirmpwd'];

    // $conn = new mysqli('localhost','root','','utem-donation-system');
    // if($conn->connect_error){
    //     die('Connection Failed : '.$conn->connect_error);
    // }

    // else{

        $userType = substr($email,10);

        if($userType == "@student.utem.edu.my"){

            $matricNo = substr($email,0,10);

            //check existing user
            $sql = "SELECT * FROM student WHERE email = '$email'";
            $result = mysqli_query($conn,$sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0) {
                
                echo "<script>alert('User already existed'); window.location.href='signup-page.php';</script>";

            }
            else{
                $stmt = $conn->prepare("insert into student(fullname,phone,email,matricNo,studentPwd) values(?,?,?,?,?)");
                $stmt->bind_param("sssss", $fname, $phone, $email, $matricNo, $pwd);
                $stmt->execute();
                echo "form saved...";
                // header("Location: index.php");
                echo "<script>alert('User registered successfully.');window.location='index.php'</script>";
                $stmt->close();
                $conn->close();
            }
            }
        else {

            //check existing user
            $sql = "SELECT * FROM non_student WHERE email = '$email'";
            $result = mysqli_query($conn,$sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0) {
            
                // $emailErr = "User already existed.";
                header("Location: signup-page.php");
                echo "<script>alert('User already existed.'); window.location.href='signup-page.php'</script>";
       
            }
            else{
            $stmt = $conn->prepare("insert into non_student(email,fullname,phone,pwd) values(?,?,?,?)");
            $stmt->bind_param("ssss", $email, $fname, $phone, $pwd);
            $stmt->execute();
            echo "form saved...";
            header("Location: index.php");
            $stmt->close();
            $conn->close();
            }
                    
        }

      }
//  }


?>

    <header><h1>UTeM Donation System</h1>
    </header>
    <div class="flex-box">
        
            <img class="image-box" src="https://img.freepik.com/free-vector/isometric-people-working-with-technology_52683-19078.jpg?t=st=1652061015~exp=1652061615~hmac=070f257009a58935368bff73ff672488e914bd9e98d4e57c6a68ef8ea683e879&w=1380" alt="illustration.png">

        <div class="login-form">

            <div class="flex-box2">
                <p>Already have an account?</p> <a href="index.php"><button type="button" name="signinButton" id="signinButton">Login</button></a>
            </div>

            <div class="flex-box3">
                <br><h3 class="register">Register user</h3><br>

                <form name="signup-submit" id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                    <div class="input-control">
                    <label for="name">Name</label><br>
                    <input type="text" name="fname" id="fname" size="40">
                    <div class="error"></div>
                    </div>

                    <div class="input-control">
                    <label for="phone">Phone</label><br>
                    <input type="text" name="phone" id="phone" size="40">
                    <div class="error"></div>
                    </div>

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

                    <div class="input-control">
                    <label for="confirmpwd">Confirm password</label><br>
                    <input type="password" name="confirmpwd" id="confirmpwd" size="40">
                    <div class="error"></div>
                    </div>
                    
                    <center>
                    <input type="submit" name="signupButton" id="signupButton" value="Sign up">
                    </center>
                </form>
            </div>

        </div>

    </div>

    <?php include("footer.php"); ?>
    
</body>
</html>