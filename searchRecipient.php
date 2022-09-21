<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="cascade/style.css">

    <title>Display Donation</title>
</head>
<body>

    <header>
        <h1>UTeM Donation System</h1>
    </header>

	<?php
		session_start();
		include ('database/session.php');
		include("header3.php"); 

	?>

     <div class="main">

        <div class="body" style="background-image: url('https://www.utem.edu.my/images/2020/pages/imageWelcomeUTeM.jpg'); background-repeat: no-repeat; background-size: cover;">
        <!-- <div class="body"> -->
        <h1 class="title">Recipient List</h1><br>
        <table class="displayTable">
			<thead>
				<tr>
					<th colspan="0">No</th>
					<th>Name</th>
					<th>Matric Number</th>
					<th>Hostel</th>
                    <th>Room Number</th>
                    <th>Quarantine Start</th>
                    <th>Quarantine End</th>
				</tr>
			</thead>

			<tbody>
				<?php
					include 'database/config.php';
					error_reporting(0);


					if(isset($_POST['submit'])){


                        $search = $_POST['search'];
                
                        // $query="SELECT matricNo,hostelCode,fullname FROM student s, ";
					    $query="SELECT s.matricNo, s.fullname, r.no, r.hostelName, r.roomNo, r.q_start, r.q_end FROM student s INNER JOIN recipient r ON s.matricNo = r.matricNo 
                        WHERE fullname LIKE '%$search%'";
                        $result = $conn->query($query);
                
                        if ($result->num_rows > 0) {
                        // output data of each row
                            while($row = $result->fetch_assoc()) {
                
                                // echo "fullname: ". $row['fullname'];

                                echo "<tr>
                                <td>" .$row["no"] . "</td>
							<td>" .$row["fullname"] . "</td>
							<td>" .$row["matricNo"] . "</td>
							<td>" .$row["hostelName"] . "</td>
							<td>" .$row["roomNo"] . "</td>
							<td>" .$row["q_start"] . "</td>
							<td>" .$row["q_end"] . "</td>
                                </tr>";

                            }
                        } 
                        
                        else {
                          echo "0 results";
                        }
                        $conn->close();
                    }
				?>

			</tbody>
		</table>
        </div>

    </div>
    
    <footer>
        <h5>Copyright &copy UTeM Donation System</h5>
    </footer>

</body>
</html>