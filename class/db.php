<?php 

function getConnection(): PDO{ // retorna um objeto PDO
    static $pdo;
    if ($pdo === null){ // = (atribuição) / == (comparação) / === (comparação tipo e valor)
        $pdo = new PDO(
            "mysql:host=10.91.47.129;dbname=tdszuphpdb01",
            "root",
            "202720",
           [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
           PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
           ] 
        );
    }
    return $pdo;
}

?>