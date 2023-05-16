<?php
        require "conexaoMysql.php";
        $database = mysqlConnect();
    
        $email = $_POST["email"] ?? "";
        $senha = $_POST["senha"] ?? "";
    
        try{
    
            $database->beginTransaction();
    
            $query = <<<SQL
            SELECT senhaHash
            FROM Anunciante 
            WHERE email = ?
            SQL;
    
            $stmt = $database->prepare($query);
            if (!$stmt->execute([$email]));
                throw new Exception('Falha na query');
            
            $row = $stmt->fetch();

            $_SESSION = password_verify($senha, $row['$senhaHash']);

            return $_SESSION;
    
            
            $database->commit();
        }catch(Exception $e) {
            $database->rollBack();
            exit("Falha ao cadastrar anunciante");
        }
    
    
?>