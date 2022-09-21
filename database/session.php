<?php

    include ('config.php');

    if(empty($_SESSION['email'])){
        header("Location: index.php");
    }
    else{
        $email = $_SESSION['email'];
    }

?>