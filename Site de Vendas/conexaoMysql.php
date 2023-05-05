<?php

function mysqlConnect()
{
  $db_host = "sql110.epizy.com";
  $db_username = "epiz_34049960";
  $db_password = "482Vr06O3DfUg";
  $db_name = "epiz_34049960_mercadoUFU";

  // dsn é apenas um acrônimo de database source name
  $dsn = "mysql:host=$db_host;dbname=$db_name;charset=utf8mb4";

  $options = [
    PDO::ATTR_EMULATE_PREPARES => false,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_PERSISTENT    => true, 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  ];

  try {
    $database = new PDO($dsn, $db_username, $db_password, $options);
    return $database;
  } 
  catch (Exception $e) {
    exit('Ocorreu uma falha na conexão com o BD: ' . $e->getMessage());
  }
}

?>
