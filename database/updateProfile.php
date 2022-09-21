<?php

    session_start();

    include ('config.php');

    $nm = $_POST['fname'];
    $eml = $_POST['email'];
    $phone = $_POST['phone'];

    $email= $_SESSION['email'];
    $userType = substr($_SESSION['email'],10);


    if($userType == "@student.utem.edu.my"){

        $sql = "UPDATE student set fullname = '".$nm."' , email = '".$eml."' , phone= '".$phone."' where email = '$email'";

        $result = $conn->query($sql);

        if($result === TRUE){

            $sql = "UPDATE donation set fullname = '".$nm."' , email = '".$eml."' where email = '$email'";

            $result = $conn->query($sql);
    
            if($result === TRUE){
                
                header("Location: ../profile-page.php");
            }
            else{
                echo "<p style='text-align:center' >Error: ".$sql."<br>".$conn->error."</p>";
            }
        }
        else{
            echo "<p style='text-align:center' >Error: ".$sql."<br>".$conn->error."</p>";
        }
       
        // $conn->close();
    }
    else{
        
        $sql = "UPDATE non_student set fullname = '".$nm."' , email = '".$eml."' , phone= '".$phone."' where email = '$email'";

        $result = $conn->query($sql);

        if($result === TRUE){

            $sql = "UPDATE donation set fullname = '".$nm."' , email = '".$eml."' where email = '$email'";

            $result = $conn->query($sql);
    
            if($result === TRUE){
                
                header("Location: ../profile-page.php");
            }
            else{
                echo "<p style='text-align:center' >Error: ".$sql."<br>".$conn->error."</p>";
            }
        }
        else{
            echo "<p style='text-align:center' >Error: ".$sql."<br>".$conn->error."</p>";
        }
       
        // $conn->close();
    }
    $conn->close();

?>