<?php

session_start();

include ('config.php');

if(isset($_POST['submit'])){

    $email = $_SESSION['email'];

    $initial = substr($email,0,2); 

    if($initial == "B0"){

        //check existing user from table student
        $sql = "SELECT * FROM student WHERE email = '$email'";
        $result = $conn->query($sql);

        $faculty = $_POST['faculty'];
        $hostelname = $_POST['hostelname'];
        $roomno = $_POST['roomno'];
        $quarantineStart = $_POST['quarantineStart'];
        $quarantineEnd = $_POST['quarantineEnd'];

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {

              $matricno = substr($email,0,10);
          
              $sql = "INSERT INTO recipient (matricNo, faculty, hostelName, roomNo, q_start, q_end)
              VALUES ('$matricno', '$faculty', '$hostelname', '$roomno', '$quarantineStart', '$quarantineEnd')";
              
              if ($conn->query($sql) === TRUE) {
                echo "<script>alert('New record created successfully.');window.location='../request-donation-form.php'</script>";
                // echo "New record created successfully";
                // echo "<meta http-equiv=\"refresh\"content=\"1;URL=../request-donation-form.php\">";
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
            }
        } else {
            echo "0 results";
        }

        $conn->close();
        
    }
    else{
        echo "<script>alert('User not eligible to request for donation.');window.location='../request-donation-form.php'</script>";
    }

    

}

?>