<?php

class Produto{
    public $id;
    public $name;
    public $precoOriginal;
    public $precoDesconto;
    public $descricao;
    //public $img;

    function __construct($id, $name, $precoOriginal, $precoDesconto, $descricao)
  {
    $this->id = $id;
    $this->name = $name; 
    $this->precoOriginal = $precoOriginal;
    $this->precoDesconto = $precoOriginal*(10/100);
    $this->descricao = $descricao;
 
}
}
    require "../conexaoMysql.php";
    $database = mysqlConnect();
    $tamPagina = 2;
    $body = file_get_contents('php://input');
    $palavrasChave = json_decode($body, true);

    error_log($palavrasChave);
    
    try{

    $query = <<<SQL
    SELECT id, nome, precoOriginal, precoDesconto, descricao
    FROM Anuncio
    WHERE 
        descricao like ? OR IS NULL AND
        descricao like ? OR IS NULL AND
        descricao like ? OR IS NULL AND
        descricao like ? OR IS NULL AND
        descricao like ? OR IS NULL
    SQL;

    $stmt = $database->prepare($query);
    if (!$stmt->execute(["%" . $palavrasChave[0] . "%", "%" . $palavrasChave[1] . "%", "%" . $palavrasChave[2] . "%", "%" . $palavrasChave[3] . "%", "%" . $palavrasChave[4] . "%"]))
        throw new Exception('Falha de inserção de produto');
    else
        for($i = 0; $i < $tamPagina; $i++){
            $row = $stmt->fetch();
            new Produto($row['id'], $row['nome'], $row['precoOriginal'], $row['precoDesconto'], $row['descricao']);            
        }
        
    header('Content-type: application/json');
    echo json_encode($randProds); //retornando objeto json

    }catch (Exception $e){
        exit("Falha ao buscar");
    }
?>