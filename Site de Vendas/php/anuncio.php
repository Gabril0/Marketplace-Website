<?php
require "../conexaoMysql.php";
require "isLogged.php";

verifyLogin();
//session_start();

$database = mysqlConnect();

$titulo = $_POST["titulo"] ?? "";
$descricao = $_POST["descricao"] ?? "";
$preco = $_POST["preco"] ?? "";
$dataHora = strval(date('Y-m-d, H:i'));
$CEP = $_POST["CEP"] ?? "";
$bairro = $_POST["bairro"] ?? "";
$cidade = $_POST["cidade"] ?? "";
$estado = $_POST["estadoProduto"] ?? "";
$codCategoria = $_POST["codCategoria"] ?? "";
$codAnunciante = 3;
//$codAnunciante = intval($_SESSION['codAnunciante']);
//$img = $_POST["img"] ?? "";

try {

    $database->beginTransaction(); //inicia transação com o banco

    $query = <<<SQL
            INSERT INTO Anuncio (titulo, descricao, preco, dataHora, cep, bairro, cidade, estado, codCategoria, codAnunciante)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
            SQL;

    // $queryIMG = <<<SQL
    //     INSERT INTO Foto img
    //     VALUES ?
    //     SQL;

    $stmt = $database->prepare($query);
    if (!$stmt->execute([$titulo, $descricao, $preco, $dataHora, $CEP, $bairro, $cidade, $estado, intval($codCategoria), $codAnunciante]))
        throw new Exception('Falha de inserção de produto');

<<<<<<< HEAD
    // $smt = $database->prepare($queryIMG);
    // if (!$smt->execute([$img]));
    //     throw new Exception('Falha de inserção da foto');
=======
        // $smt = $database->prepare($queryIMG);
        // if (!$smt->execute([$img]));
        //     throw new Exception('Falha de inserção da foto');
        
        $database->commit();//confirma as transações feitas anteriormente com o banco
    
        header("Location: ../obrigado.html");
            exit();
>>>>>>> 722ce9cf1e3f9a6143d4d467c3570e7567b0a6d1

    $database->commit(); //confirma as transações feitas anteriormente com o banco

    header("Location: ../obrigado.html");
    exit();
    // header("Content-Type: application/json");
    // echo json_encode("obrigado.html");

} catch (Exception $e) {
    $database->rollBack(); //nega e volta atras da transações feitas
    exit("Falha ao cadastrar anuncio" . $e->getMessage());
}
?>