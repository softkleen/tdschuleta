<?php
include_once "db.php";

class Tipo {
    // atributos
    private $id;
    private $nome;
    private $sigla;
    private $pdo;

    public function __construct(){
        $this->pdo = getConnection(); // realiza a conexão durante a criação da instância
    }

    // Getters e Setters
    public function getId(){
        return $this->id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome(string $nome){
        $this->nome = $nome;
    }

    public function getSigla(){
        return $this->sigla;
    }

    public function setSigla(string $sigla){
        $this->sigla = $sigla;
    }

    // inserir tipo
    public function inserir():bool {
        $sql = "INSERT INTO tipos (nome, sigla) VALUES (:nome, :sigla)";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":nome", $this->nome);
        $cmd->bindValue(":sigla", $this->sigla);
        if($cmd->execute()){
            $this->id = $this->pdo->lastInsertId();
            return true;
        }
        return false;
    }

    // listar todos os tipos
    public function listar():array {
        $cmd = $this->pdo->query("SELECT * FROM tipos ORDER BY id DESC");
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }

    // buscar tipo por id
    public function buscarPorId(int $id):array {
        $sql = "SELECT * FROM tipos WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id", $id);
        $cmd->execute();
        return $cmd->fetch(PDO::FETCH_ASSOC);
    }

    // atualizar tipo
    public function atualizar(int $idUpdate):bool {
        $this->id = $idUpdate;
        if(!$this->id) return false;

        $sql = "UPDATE tipos SET 
                    nome = :nome,
                    sigla = :sigla
                WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":nome", $this->nome);
        $cmd->bindValue(":sigla", $this->sigla);
        $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);

        return $cmd->execute();
    }

    // excluir tipo
    public function excluir(int $idExcluir):bool {
        $this->id = $idExcluir;
        if(!$this->id) return false;

        $sql = "DELETE FROM tipos WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);

        return $cmd->execute();
    }
}
?>
