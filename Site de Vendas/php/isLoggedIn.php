<?php
    function isLoggedIn(){
        return isset($_SESSION['logged_in']);
    }
?>