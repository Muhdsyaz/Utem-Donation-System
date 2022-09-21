<?php

    include "config.php";

    $emailErr = $pwdErr = "";

    if(isset($_POST['loginButton'])){

        $email = $_POST['email'];
        $pwd = $_POST['pwd'];

        // Create connection
        $conn = new mysqli('localhost','root','','utem-donation-system');
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
        else if(empty($email) || empty($pwd)){
            header("Location: ../login-page.php?error=emptyfields&email=".$email."&pwd=".$pwd);
            $emailErr = "Email and password are required";
            echo $emailErr;
            exit();
        }
        else{
            $sql = "SELECT fullname, phone, email, userpwd FROM user WHERE email='" .$email. "' AND userpwd='" .$pwd. "'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "Name: " . $row["fullname"]. " Phone: " . $row["phone"]. " email: " . $row["email"]. " Password: ". $row["userpwd"] ."<br>";
                }
                header("Location: ../home-page.php");
            }
            else {
                header("Location: ../login-page.php?error=nouser");
                exit();
            }
            $conn->close();
        }
    }

?>