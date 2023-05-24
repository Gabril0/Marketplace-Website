<?php
        require "../conexaoMysql.php";
        session_start();
        $database = mysqlConnect();
    
        $email = $_POST["email"] ?? "";
        $senha = $_POST["senha"] ?? "";
    
        try{
    
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
            if(password_verify($senha, $row['$senhaHash'])){
                $_SESSION['emailAnunciante'] = $row['email'];
                $_SESSION['codAnunciante'] = $row['codigo'];
    
            }
    
            if(!isset($_SESSION['emailUsuario'], $_SESSION['loginString']))
                header("Location: ../html/perfilPage.html");

        }catch(Exception $e) {
            $database->rollBack();
            exit("Falha ao cadastrar anunciante");
        }
    
    
?>