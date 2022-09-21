<?php

session_start();

include ('config.php');

if(isset($_POST['submit']) && isset($_FILES['fileToUpload'])){

    $email = $_SESSION['email'];

    $img_name = $_FILES['fileToUpload']['name'];
    $img_size = $_FILES['fileToUpload']['size'];
    $tmp_name = $_FILES['fileToUpload']['tmp_name'];
    $error = $_FILES['fileToUpload']['error'];

    $initial = substr($_SESSION['email'],0,2); 

    if($initial == "B0"){

      if($error === 0){
          if($img_size > 125000){
              $em = "Sorry, your file is too large.";
              header("Location: ../request-donation-form.php?error=$em");
          }else{
              $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
              $img_ex_lc = strtolower($img_ex);

              $allowed_exs = array("jpg", "jpeg", "png");

              if(in_array($img_ex_lc, $allowed_exs)){
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = 'uploads/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                // Insert into database

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

                      $matricno = substr($_SESSION['email'],0,10);
                  
                      $sql = "INSERT INTO recipient (matricNo, faculty, hostelName, roomNo, q_start, q_end, image_url)
                      VALUES ('$matricno', '$faculty', '$hostelname', '$roomno', '$quarantineStart', '$quarantineEnd', '$new_img_name')";
                      
                      if ($conn->query($sql) === TRUE) {
                        echo "New record created successfully";
                        echo "<meta http-equiv=\"refresh\"content=\"1;URL=../request-donation-form.php\">";
                      } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                      }
                    }
                } else {
                    echo "0 results";
                }

                $conn->close();

              }else{
                $em = "Unknown error occured!";
                header("Location: ../request-donation-form.php?error=$em");
              }
          }
      }else {
          $em = "Unknown error occured!";
          header("Location: ../request-donation-form.php?error=$em");
      }

    }
    else{
        echo "<script>alert('User not eligible to request for donation.');window.location='../request-donation-form.php'</script>";
    }

    

}

?>