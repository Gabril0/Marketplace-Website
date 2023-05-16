<?php
    function isLoggedIn(){
        if (isset($_SESSION['logged_in'])) {
            return true;
            
          } else {
              return null;
          }
    }
?>