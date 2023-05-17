<?php
        session_start();
        require "conexaoMysql.php";
        $database = mysqlConnect();
    
        $email = $_POST["email"] ?? "";
        $senha = $_POST["senha"] ?? "";
    
        try{
    
            $database->beginTransaction();
    
            $query = <<<SQL
            SELECT codigo, senhaHash
            FROM Anunciante 
            WHERE email = ?
            SQL;
    
            $stmt = $database->prepare($query);
            if (!$stmt->execute([$email]))
                throw new Exception('Falha na query');
            
            $database->commit();
            
            $row = $stmt->fetch();   

            $_SESSION['isLogged'] = password_verify($senha, $row['$senhaHash']);
            $_SESSION['codAnunciante'] = $row['codigo'];
    
            if($_SESSION['isLogged'])
                header("location: ../html/perfilPage.html");

        }catch(Exception $e) {
            $database->rollBack();
            exit("Falha ao cadastrar anunciante");
        }
    
    
?>