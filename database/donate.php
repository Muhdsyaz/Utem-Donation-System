<?php

session_start();

include ('config.php');
include ('session.php');

if(isset($_POST['submit'])){

  $userType = substr($_SESSION['email'],10);

    if($userType == "@student.utem.edu.my"){

        //check existing user from table student
        $sql = "SELECT * FROM student WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              $fname = $row["fullname"];

              $itemtype = $_POST['itemtype'];
              $quantity = $_POST['quantity'];
              $deliverymethod = $_POST['deliverymethod'];
              $deliverydate = $_POST['deliverydate'];
              // $fileToUpload = $_POST['fileToUpload'];
          
              $sql = "INSERT INTO donation (email, fullname, item, quantity, deliverymethod, deliverydate)
              VALUES ('$email', '$fname', '$itemtype', '$quantity', '$deliverymethod', '$deliverydate')";
              
              if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
                echo "<meta http-equiv=\"refresh\"content=\"1;URL=../donation-form.php\">";
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
            }
          } else {
            echo "0 results";
          }
    }
    else{
        //check existing user
        $sql = "SELECT * FROM non_student WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              $fname = $row["fullname"];

              $itemtype = $_POST['itemtype'];
              $quantity = $_POST['quantity'];
              $deliverymethod = $_POST['deliverymethod'];
              $deliverydate = $_POST['deliverydate'];
              // $fileToUpload = $_POST['fileToUpload'];
          
              $sql = "INSERT INTO donation (email, fullname, item, quantity, deliverymethod, deliverydate)
              VALUES ('$email', '$fname', '$itemtype', '$quantity', '$deliverymethod', '$deliverydate')";
              
              if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
                echo "<meta http-equiv=\"refresh\"content=\"1;URL=../donation-form.php\">";
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }

            }
          } else {
            echo "0 results";
          }
    }
    $conn->close();

    

}


?>