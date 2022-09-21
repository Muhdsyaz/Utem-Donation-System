<?php

    //Initialize a session
    session_start();

    if(isset($_SESSION['email'])){

       //destroy the whole session
       $_SESSION = array();
       session_destroy();
       echo "<meta http-equiv=\"refresh\" content=\"3;URL=index.php\">";

    }

?>