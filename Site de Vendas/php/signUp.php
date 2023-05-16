<?php
    require "conexaoMysql.php";
    $database = mysqlConnect();

    $nome = $_POST["nome"] ?? "";
    $email = $_POST["email"] ?? "";
    $senha = $_POST["senha"] ?? "";
    $telefone = $_POST["telefone"] ?? "";

    $hashSenha = password_hash($senha, PASSWORD_DEFAULT);

    try{

        $database->beginTransaction();

        $query = <<<SQL
        INSERT INTO Anunciante (nome,email,hashSenha,telefone)
        VALUES (?, ?, ?, ?)
        SQL;

        $smt = $database->prepare($query);
        if (!$smt->execute([$nome, $email, $hashSenha, $telefone]));
            throw new Exception('Falha de inserção de anunciante');

        
        $database->commit();
    }catch(Exception $e) {
        $database->rollBack();
        exit("Falha ao cadastrar anunciante");
    }

?>