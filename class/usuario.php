<?php 
 include_once "db.php";

// POO com PHP (Classes PHP)
class Usuario{
    // atributos
    private $id;
    private $login;
    private $senha;
    private $nivel;
    private $pdo;
    public function __construct(){
        $this->pdo  = getConnection(); // realiza a conexão durante a criação da instância (objeto) 
    }
    // Getters e Setters  - Propriedades (C#) ou métodos de acesso das linguagens de prog.
    public function getId(){
        return $this->id; // não vamos criar setId???  proque o banco é quem atribui (autoincrements)
    }
    public function getLogin(){
        return $this->login;
    }
    public function setLogin(string $login){
        $this->login = $login;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function setSenha(string $senha){
        $this->senha = $senha;
    }
    public function getNivel(){ 
        return $this->nivel;
    }
    public function setNivel(string $nivel){ 
        $this->nivel = $nivel;
    }

    // inserindo um usuário
    public function inserir():bool{
        $sql = "insert into usuarios (login, senha, nivel) values(:login, md5(:senha), :nivel)";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":login", $this->login); // (C#) cmd.Paramenters.AddWithValue("splogin", Login);
        $cmd->bindValue(":senha", $this->senha);
        $cmd->bindValue(":nivel", $this->nivel);
        $cmd->execute();
        if($cmd->execute()){
            $this->id = $this->pdo->lastInsertId();
            return true;
        }
        return false;
    }
    // listando usuarios
    public function listar():array{
        $cmd = $this->pdo->query("select * from usuarios order by id desc");
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }
    // buscar usuarios por id 
    public function buscarPorId(int $id):bool{
        $sql = "select * from usuarios where id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id", $id);
        $cmd->execute();
        if($cmd->rowCount() > 0){
            $dados = $cmd->fetch(PDO::FETCH_ASSOC);
            $this->id = $dados['id'];
            $this->login = $dados['login'];
            $this->senha = $dados['senha'];
            $this->nivel = $dados['nivel'];
            return true;
        }
        return false;
    }
    // efetuar login
    public function efetuarLogin(string $loginInformado, string $senhaInformada):array{
        $sql = "select * from usuarios where login = :login and senha = md5(:senha)";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":login", $loginInformado);
        $cmd->bindValue(":senha", $senhaInformada);
        $cmd->execute();
        $dados = $cmd->fetch(PDO::FETCH_ASSOC);
        return $dados;
    }

        // Atualizar usuário
        public function atualizar(int $idUpdate):bool {
            $id = $idUpdate;
            if(!$this->id) return false;
    
            $sql = "UPDATE usuarios SET login = :login, nivel = :nivel WHERE id = :id";
            $cmd = $this->pdo->prepare($sql);
            $cmd->bindValue(":login", $this->login);
            $cmd->bindValue(":nivel", $this->nivel);
            $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);
    
            return $cmd->execute();
        }
        public function alterarSenha(int $idUpdate, string $novaSenha):bool {
            $id = $idUpdate;
            if(!$this->id) return false;
    
            $sql = "UPDATE usuarios SET senha = md5(:senha) WHERE id = :id";
            $cmd = $this->pdo->prepare($sql);
            $cmd->bindValue(":senha", $novaSenha);
            $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);
    
            return $cmd->execute();
        }
    
        // Excluir usuário
        public function excluir():bool {
            if(!$this->id) return false;
    
            $sql = "DELETE FROM usuarios WHERE id = :id";
            $cmd = $this->pdo->prepare($sql);
            $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);
    
            return $cmd->execute();
        }

}

?>