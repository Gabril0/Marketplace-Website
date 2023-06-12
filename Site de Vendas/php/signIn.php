<?php
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

require "../conexaoMysql.php";
$database = mysqlConnect();

$email = $_POST["email"] ?? "";
$senha = $_POST["senha"] ?? "";

try {

    $database->beginTransaction();

    $query = <<<SQL
            SELECT codigo, senhaHash, email
            FROM Anunciante 
            WHERE email = ?
            SQL;

    $stmt = $database->prepare($query);
    if (!$stmt->execute([$email]))
        throw new Exception('Falha na query');

    $database->commit();

    $row = $stmt->fetch();

    if (password_verify($senha, $row['$senhaHash'])) {
        session_start();
        $_SESSION['emailAnunciante'] = $row['email'];
        $_SESSION['codAnunciante'] = $row['codigo'];
<<<<<<< HEAD
        $response = new RequestResponse(true, 'perfilPage.html');
=======
        $response = new RequestResponse(true, '../perfilPage.html');
>>>>>>> 722ce9cf1e3f9a6143d4d467c3570e7567b0a6d1
    } else {
        $response = new RequestResponse(false, '');

    }

} catch (Exception $e) {
    $database->rollBack();
    exit("Falha ao cadastrar anunciante");
}


?>