<?php
    require "conexaoMysql.php";
    $database = mysqlConnect();

    $nome = $_POST["nome"] ?? "";
    $email = $_POST["email"] ?? "";
    $senha = $_POST["senha"] ?? "";
    $telefone = $_POST["telefone"] ?? "";

    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    try{

        $database->beginTransaction();

        $query = <<<SQL
            INSERT INTO Anunciante (nome,email,senhaHash,telefone)
            VALUES (?, ?, ?, ?)
            SQL;

        $stmt = $database->prepare($query);
        if (!$stmt->execute([$nome, $email, $senhaHash, $telefone]))
            throw new Exception('Falha de inserção de anunciante');

        
        $database->commit();
        
        $queryCodAnunciante = <<<SQL
            SELECT codigo
            FROM Anunciante
            WHERE email = ?
            SQL;

        $stmt = $database->prepare($queryCodAnunciante);
        if (!$stmt->execute([$email])){
            throw new Exception('Falha de inserção de anunciante');}

        $row = $stmt->fetch();
        
        $_SESSION['isLogged'] = true;
        $_SESSION['codAnunciante'] = $row['codigo'];

        header("location: ../html/perfilPage.html"); 

    }catch(Exception $e) {
        $database->rollBack();
        exit("Falha ao cadastrar anunciante" . $e->getMessage());
    }

?>