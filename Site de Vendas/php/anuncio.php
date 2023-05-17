<?php
    require "../conexaoMysql.php";
    $database = mysqlConnect();

    $titulo = $_POST["titulo"] ?? "";
    $descricao = $_POST["descricao"] ?? "";
    $preco = $_POST["preco"] ?? "";
    $dataHora = date('Y-m-d, H:i');
    $CEP = $_POST["CEP"] ?? "";
    $bairro = $_POST["bairro"] ?? "";
    $cidade = $_POST["cidade"] ?? "";
    $estado = $_POST["estado"] ?? "";
    $codCategoria = $_POST["codCategoria"] ?? "";
    $codAnunciante = $_SESSION['codAnunciante'];
    $img = $_POST["img"] ?? "";
    try{

        $database->beginTransaction();//inicia transação com o banco

        $query = <<<SQL
            INSERT INTO Anuncio (titulo, descricao, preco, dataHora, CEP, bairro, cidade, estado, codCategoria, codAnunciante)
            VALUES (?, ?, ?, ?, ?, ?, ?)
            SQL;

        $queryIMG = <<<SQL
            INSERT INTO Foto img
            VALUES ?
            SQL;

        $smt = $database->prepare($query);
        if (!$smt->execute([$nome, $estado, $cor, $quantidade, $marca, $categoria, $descricao, $imagem]));
            throw new Exception('Falha de inserção de produto');

        $smt = $database->prepare($queryIMG);
        if (!$smt->execute([$img]));
            throw new Exception('Falha de inserção da foto');
        
        $database->commit();//confirma as transações feitas anteriormente com o banco
    
    }catch(Exception $e) {
        $database->rollBack();//nega e volta atras da transações feitas
        exit("Falha ao cadastrar anunciante");
    }

?>