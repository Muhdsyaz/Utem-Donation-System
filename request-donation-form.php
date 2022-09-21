<html>
    <head>
        <title>Request Donation Page</title>
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

            <h1>Request Donation Form</h1><br>

            <form id="myForm" name="myForm" method="post" action="database/request.php">

                <label for="matricno">Matric no:</label><br>

                <?php 
                
        
                $initial = substr($_SESSION['email'],0,2); 

                if($initial == "B0"){
                    echo "<input type='text' name='matricno' id='matricno' value='".substr($_SESSION['email'],0,10)."' readonly required><br>";
                }
                else{
                    echo "<input type='text' name='matricno' id='matricno' value='Not a student' readonly required><br>";
                }
                
                ?>

                <label for="faculty">Faculty:</label><br>
                <SELECT name="faculty" onChange="change()" required>
                            <OPTION VALUE="FKEKK">FAKULTI KEJURUTERAAN ELEKTRONIK DAN KEJURUTERAAN KOMPUTER (FKEKK)
                            <OPTION VALUE="FKE">FAKULTI KEJURUTERAAN ELEKTRIK (FKE)
                            <OPTION VALUE="FKM">FAKULTI KEJURUTERAAN MEKANIKAL (FKM)
                            <OPTION VALUE="FKP">FAKULTI KEJURUTERAAN PEMBUATAN FKP
                            <OPTION VALUE="FTMK">FAKULTI TEKNOLOGI MAKLUMAT DAN KOMUNIKASI (FTMK)
                            <OPTION VALUE="FTKEE">FAKULTI TEKNOLOGI KEJURUTERAAN ELEKTRIK DAN ELEKTRONIK (FTKEE)
                            <OPTION VALUE="FTKMP">FAKULTI TEKNOLOGI KEJURUTERAAN MEKANIKAL DAN PEMBUATAN (FTKMP)
                            <OPTION VALUE="FPTT" SELECTED>FAKULTI PENGURUSAN TEKNOLOGI DAN TEKNOUSAHAWANAN (FPTT)
                </SELECT><br>

                <label for="hostelname">Hostel name:</label><br>
                <SELECT name="hostelname" onChange="change()" required>
                            <OPTION VALUE="Lestari">LESTARI
                            <OPTION VALUE="Satria Lekir">SATRIA LEKIR
                            <OPTION VALUE="Satria Lekiu">SATRIA LEKIU
                            <OPTION VALUE="Satria Tuah">SATRIA TUAH
                            <OPTION VALUE="Satria Kasturi">SATRIA KASTURI
                            <OPTION VALUE="Satria Jebat" SELECTED>SATRIA JEBAT
                </SELECT><br>

                <label for="roomno">Room number:</label><br>
                <input type="text" name="roomno" id="roomno" placeholder="eg: SJ-J-7-5-C" required><br>

                <label for="quarantineStart">Quarantine start:</label><br>
                <input type="date" id="quarantineStart" name="quarantineStart" required><br>

                <label for="quarantineEnd">Quarantine end:</label><br>
                <input type="date" id="quarantineEnd" name="quarantineEnd" required><br>

                <!-- <label for="fileToUpload">MySejahtera Screenshot:</label><br>
                <input type="file" name="fileToUpload" id="fileToUpload" required><br><br> -->

                <input type="submit" value="Submit" name="submit"><br>


            </form>

              

            </div>

        </div>

    </div>

    <?php include("footer.php"); ?>
    </body>
</html>