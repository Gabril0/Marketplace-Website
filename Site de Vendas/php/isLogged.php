<?php

<<<<<<< HEAD
function verifyLogin()
{
  session_start();

  if (!isset($_SESSION['emailAnunciante'])) {
    header("Location: ../loginPage.html");
    exit();
  }
}

=======
session_start();

class RequestResponse
{
    public $success;
    public $detail;

    function __construct($success, $detail)
    {
        $this->success = $success;
        $this->detail = $detail;
    }
}
    verifyLoggin();

    function verifyLoggin()
    { 
      if (!isset($_SESSION['emailAnunciante'])) {
        $response = new RequestResponse(false, "loginPage.html");
        header("Location: ../loginPage.html");
        exit();

      }else{
        $response = new RequestResponse(true, "");
      }

      echo json_encode($response);
    }
>>>>>>> 722ce9cf1e3f9a6143d4d467c3570e7567b0a6d1
?>