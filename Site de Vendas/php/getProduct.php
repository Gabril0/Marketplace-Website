<?php

class Produto
{
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
        $this->precoDesconto = $precoOriginal * (10 / 100);
        $this->descricao = $descricao;

    }
}
require "../conexaoMysql.php";
$database = mysqlConnect();
$body = file_get_contents('php://input');
$option = json_decode($body);
$palavrasChave = $option->body;

try {

    $query = <<<SQL
        SELECT codigo, titulo, preco, descricao 
        FROM Anuncio 
        WHERE descricao 
        LIKE ?
    SQL;
    
    // $conditions = "";
    // $args = array();
    // foreach ($palavrasChave as $i => $key) {
    //     $condition = "descricao LIKE ?";
    //     if ($i > 0) {
    //         $condition = "OR " . $condition;
    //     }
    //     $conditions .= $condition;
    //     $args[] = "%" . $key . "%";
    // }

    // $query = "SELECT id, nome, precoOriginal, precoDesconto, descricao
    //           FROM Anuncio
    //           WHERE " . $conditions;

    $stmt = $database->prepare($query);
    if (!$stmt->execute($palavrasChave[0]))
        throw new Exception('falha Ao buscar produtos');
    else
        $result = $stmt->fetch();

        header('Content-Type: application/json');
        echo json_encode($result);

} catch (Exception $e) {
    exit("Falha ao buscar ($palavrasChave)");
}
?>