<?php
session_start();

$isLogged = isset($_SESSION['isLogged']);

echo json_encode($isLogged);
?>