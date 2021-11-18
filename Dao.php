<?php 

class Dao{

    protected $dsn = "mysql:host=localhost;dbname=banco_buscaai";
    protected $usuario = "root";
    protected $senha = "";
    protected $dao;

    public function __construct(){ 
        $this->dao =new PDO($this->dsn,$this->usuario,$this->senha);
    }

    public function logar($email, $senha){
        $sql = "select * from  usuario where email=:email and senha=:senha";
        $resultado = $this->dao->prepare($sql);
        $resultado->bindParam(':email',$email);
        $resultado->bindParam(':senha',$senha);
        $resultado->execute();
        $retorno = $resultado->fetch(PDO::FETCH_ASSOC);
        if($retorno['email'] == $email && $retorno['senha'] == $senha){
            return true;
        } else {
             return false;
         }
    }

    public function cadastro($dados){

        $sql = "insert into usuario(nome, cpf, datanasc, email, senha, telefone) values(:nome, :cpf, :datanasc, :email, :senha, :telefone)";
        $resultado = $this->dao->prepare($sql);
        $resultado->bindParam(':nome', $dados['nome']);
        $resultado->bindParam(':cpf', $dados['cpf']);
        $resultado->bindParam(':datanasc', $dados['datanasc']);
        $resultado->bindParam(':email', $dados['email']);
        $resultado->bindParam(':senha', $dados['senha']);
        $resultado->bindParam(':telefone', $dados['telefone']);
        $retorno = $resultado->execute();
        if(isset($retorno)) {
            session_start();
            $_SESSION['email']=$dados['email'];
            $_SESSION['senha']=$dados['senha'];
            $_SESSION['nome']=$dados['nome'];
            return true;

        }else {
            return false;
        }
    }

    public function selectteste ()
    {
        $sql = "select * from produto";
        $resultado = $this->dao->prepare($sql);
        $resultado->execute();
        $retorno = $resultado->fetchAll();
        
        $qntdprod = count($retorno);
        return $qntdprod;
        
    }

    public function retornoprodutos()
    {
        $sql = "select * from produto order by id desc";
        $resultado = $this->dao->prepare($sql);
        $resultado->execute();
        $retorno = $resultado->fetchAll();

        return $retorno;
    }
    
}