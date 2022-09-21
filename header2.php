<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<link rel="stylesheet" href="cascade/style2.css">
<body>

<?php

    include 'database/session.php';

?>

<div class="navbar">
<a href="logout.php"><i class="fa-solid fa-right-from-bracket fa-lg"></i>  Logout</a>
<a href="display-recipient.php"><i class="fa-solid fa-hand-holding-dollar fa-lg"></i> Display Recipient </a>
<a href="display-donation.php"><i class="fa-solid fa-circle-dollar-to-slot fa-lg"></i>  Display Donor </a>
<div class="search-container">
    <form method="POST" action="search.php">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit" name="submit"><i class="fa fa-search"></i></button>
    </form>
</div>

</div>

</body>
</html> 
