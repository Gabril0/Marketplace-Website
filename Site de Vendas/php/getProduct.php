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

    $palavrasChave = $_POST["palavrasChave"] ?? "";

    try{

    $query = <<<SQL
    SELECT id, nome, precoOriginal, precoDesconto, descricao
    FROM Anuncio
    WHERE 
        descricao like ? AND
        descricao like ? AND
        descricao like ? AND
        descricao like ? AND
        descricao like ?
    SQL;

    $stmt = $database->prepare($query)
    if (!$stmt->execute(["%" . $palavrasChave[0] . "%", "%" . $palavrasChave[1] . "%", "%" . $palavrasChave[2] . "%", "%" . $palavrasChave[3] . "%", "%" . $palavrasChave[4] . "%"]));
        throw new Exception('Falha de inserção de produto');

    }catch (Exception $e){
        exit("Falha ao buscar");
    }
?>