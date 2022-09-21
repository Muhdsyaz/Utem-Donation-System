<?php

if(isset($_POST['signupButton'])){

    $fname = $_POST['fname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $confirmpwd = $_POST['confirmpwd'];

    $conn = new mysqli('localhost','root','','utem-donation-system');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }
    else if(empty($fname) || empty($phone) || empty($email) || empty($pwd) || empty($confirmpwd)){
        header("Location: ../signup-page.php?error=emptyfields&name=".$fname."&phone=".$phone."&email=".$email."&pwd=".$pwd."&confirmpwd=".$confirmpwd);
        exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $fname)){
        header("Location: ../signup-page.php?error=invalidemail&name");
        exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../signup-page.php?error=invalidemail&name=".$fname);
        exit();
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $fname)){
        header("Location: ../signup-page.php?error=invalidname&email=".$email);
        exit();
    }
    else if($pwd !== $confirmpwd){
        header("Location: ../signup-page.php?error=passwordcheck&name=".$fname."&email".$email);
        exit();
    }
    else{
        $stmt = $conn->prepare("insert into user(fullname,phone,email,userpwd) values(?,?,?,?)");
        $stmt->bind_param("ssss", $fname, $phone, $email, $pwd);
        $stmt->execute();
        echo "form saved...";
        header("Location: ../login-page.php");
        $stmt->close();
        $conn->close();

    }
}

?>