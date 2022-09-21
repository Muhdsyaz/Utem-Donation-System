<html>
    <head>
        <title>Donation Page</title>
    </head>
    <body>

    <header>
        <h1>UTeM Donation System</h1>
    </header>

    <div class="main">
        <div class="menu">
            <?php 

            session_start();

            include ('database/session.php');
            include("header.php"); 
            ?>
        </div>

        <div class="body" style="background-image: url('https://www.utem.edu.my/images/2020/pages/imageWelcomeUTeM.jpg'); background-repeat: no-repeat; background-size: cover;">
        <!-- <div class="body"> -->
            <div class="layout-donate">
                <h1>Donation Form</h1><br>

                <form  id="myForm" name="myForm" method="post" action="database/donate.php">
                        <label for="itemtype">Item type:</label><br>
                        <SELECT name="itemtype" onChange="change()" required>
                                        <OPTION VALUE="Money">Money
                                        <OPTION VALUE="Food & Groceries" SELECTED>Food & Groceries
                        </SELECT><br>

                        <label for="quantity">Quantity:</label><br>
                        <input type="number" id="quantity" name="quantity" placeholder="eg: 1" required><br>

                        <label for="deliverymethod">Delivery method:</label><br>
                        <input type="radio" id="online-transaction" name="deliverymethod" value="Online transaction" required> <label for="online-transaction">Online transaction</label>
                        <input type="radio" id="self-delivery" name="deliverymethod" value="Self-delivery" required> <label for="self-delivery">Self-delivery</label><br>

                        <label for="deliverydate">Delivery date:</label><br>
                        <input type="date" id="deliverydate" name="deliverydate" required><br>

                        <!-- <label for="fileToUpload">Donation receipt:</label><br>
                        <input type="file" name="fileToUpload" id="fileToUpload" required><br><br> -->
                        <input type="submit" value="Submit" name="submit"><br>
                </form>

              
            </div>

        </div>

    </div>

    <?php include("footer.php"); ?>
    </body>
</html>