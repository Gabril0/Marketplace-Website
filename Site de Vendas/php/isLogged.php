<?php

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
        header("Location: loginPage.html");
        exit();

      }else{
        $response = new RequestResponse(true, "");
      }

      echo json_encode($response);
    }
?>