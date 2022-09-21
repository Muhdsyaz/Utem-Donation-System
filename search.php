

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
		include("header2.php"); 

	?>

     <div class="main">

        <div class="body" style="background-image: url('https://www.utem.edu.my/images/2020/pages/imageWelcomeUTeM.jpg'); background-repeat: no-repeat; background-size: cover;">
		<!-- <div class="body"> -->
		<div class=titlebg>
			<h1 class="title">Donor List</h1><br>
		</div>

		<div>
        <table class="displayTable">
			<thead>
				<tr>
					<th colspan="0">No</th>
					<th>Name</th>
					<th>Item</th>
					<th>Quantity</th>
					<th>Date</th>
				</tr>
			</thead>

			<tbody>
				<?php
					include 'database/config.php';
					error_reporting(0);


					if(isset($_POST['submit'])){


                        $search = $_POST['search'];
                
                        $sql = "SELECT * FROM donation WHERE fullname LIKE '%$search%'";
                        $result = $conn->query($sql);
                
                        if ($result->num_rows > 0) {
                        // output data of each row
                            while($row = $result->fetch_assoc()) {
                
                                // echo "fullname: ". $row['fullname'];

                                echo "<tr>
                                <td>" .$row["donationNumber"] . "</td>
                                <td>" .$row["fullname"] . "</td>
                                <td>" .$row["item"] . "</td>
                                <td>" .$row["quantity"] . "</td>
                                <td>" .$row["deliverydate"] . "</td>
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
				</div>
    <footer>
        <h5>Copyright &copy UTeM Donation System</h5>
    </footer>

</body>
</html>