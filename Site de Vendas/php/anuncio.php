<?php
    require "../conexaoMysql.php";
    require "isLogged.php";

    session_start();
    //verifyLoggin();

    $database = mysqlConnect();

    $titulo = $_POST["titulo"] ?? "";
    $descricao = $_POST["descricao"] ?? "";
    $preco = $_POST["preco"] ?? "";
    $dataHora = strval(date('Y-m-d, H:i'));
    $CEP = $_POST["CEP"] ?? "";
    $bairro = $_POST["bairro"] ?? "";
    $cidade = $_POST["cidade"] ?? "";
    $estado = $_POST["estadoProduto"] ?? "";
    $codCategoria = $_POST["codCategoria"] ?? "" ;
    $codAnunciante = 1;
    // $codAnunciante = $_SESSION['codAnunciante'];
    //$img = $_POST["img"] ?? "";
    
    try{

        $database->beginTransaction();//inicia transação com o banco

        $query = <<<SQL
            INSERT INTO Anuncio (titulo, descricao, preco, dataHora, cep, bairro, cidade, estado, codCategoria, codAnunciante)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
            SQL;

        // $queryIMG = <<<SQL
        //     INSERT INTO Foto img
        //     VALUES ?
        //     SQL;

        echo  "<script>alert('enviado com Sucesso!);</script>";
        echo ' titulo: '. $titulo, '| descricao: ' . $descricao, '| preco: ' . $preco, '| datahora: ' . $dataHora, '| cep: ' . $CEP, '| bairro: ' . $bairro, '| cidade: ' . $cidade, '| estado: ' . $estado, '| cod1: '. $codCategoria, '| cod2: ' . $codAnunciante;
        $stmt = $database->prepare($query);
        if (!$stmt->execute([$titulo, $descricao, $preco, $dataHora, $CEP, $bairro, $cidade, $estado, intval($codCategoria), $codAnunciante]))
            throw new Exception('Falha de inserção de produto');

        // $smt = $database->prepare($queryIMG);
        // if (!$smt->execute([$img]));
        //     throw new Exception('Falha de inserção da foto');
        
        $database->commit();//confirma as transações feitas anteriormente com o banco
    
        header("Content-Type: application/json");
        echo json_encode("obrigado.html");

    }catch(Exception $e) {
        $database->rollBack();//nega e volta atras da transações feitas
        exit("Falha ao cadastrar anuncio" . $e->getMessage());
    }
?>