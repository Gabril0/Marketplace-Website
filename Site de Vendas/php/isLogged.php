<?php
    session_start();
    
    if(!isset($_SESSION['emailAnunciante'] && isset($_SESSION['codAnunciante']))){
        header("location: html/loginPage.html" )
    }
?>