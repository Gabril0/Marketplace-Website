<?php

function verifyLogin()
{
  session_start();

  if (!isset($_SESSION['emailAnunciante'])) {
    header("Location: ../loginPage.html");
    exit();
  }
}

?>