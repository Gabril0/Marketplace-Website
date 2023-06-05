<?php

session_start();

class RequestResponse
{
    public $success;
    public $path;

    function __construct($success, $path)
    {
        $this->success = $success;
        $this->path = $path;
    }
}
    verifyLoggin();

    function verifyLoggin()
    { 
      if (!isset($_SESSION['emailAnunciante'])) {
        $response = new RequestResponse(false, "loginPage.html");
        header("location: loginPage.html");
        exit();

      }else{
        $response = new RequestResponse(true, "");
      }
      
      header('Content-type: application/json');
      echo json_encode($response);
    }
?>