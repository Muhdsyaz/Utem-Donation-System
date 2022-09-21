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


					// $query="SELECT * FROM donation";
					$query="SELECT * FROM donation;";
					$result=mysqli_query($conn,$query);

					if(!$result){
						die("Error Occured: " . $conn->error);
				   }

					//read data each row
					while($row = $result->fetch_assoc()){
						echo "<tr>
							<td>" .$row["donationNumber"] . "</td>
							<td>" .$row["fullname"] . "</td>
							<td>" .$row["item"] . "</td>
							<td>" .$row["quantity"] . "</td>
							<td>" .$row["deliverydate"] . "</td>
							
							</tr>";
					}
				
					 

				

				?>

			</tbody>
			
		</table>
		<form method="post" action="generate_pdf.php" target="_blank">
		<center><button class="pdfBtn" type="submit" name="generate_pdf">Generate PDF</button></center>
				</form>
        </div>

    </div>
				</div>
    <footer>
        <h5>Copyright &copy UTeM Donation System</h5>
    </footer>

</body>
</html>