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

    public function retornoprodutosPesquisa($pesq)
    {
        $sql = "select * from produto where titulo like :pesq or categoria like :pesq order by id desc";
        $resultado = $this->dao->prepare($sql);
        $resultado->bindParam(':pesq', $pesq);
        $resultado->execute();
        $retorno = $resultado->fetchAll();

        return $retorno;
    }

    public function retornoCat()
    {
        $sql = "select * from categorias order by categoria";
        $resultado = $this->dao->prepare($sql);
        $resultado->execute();
        $retorno = $resultado->fetchAll();

        return $retorno;
    }

    public function cadastroProdutos($dados, $caminho)
    {
        $sql = "insert into produto values (null, :titulo, :preco, :img, :categoria, :descricao, :hora, :datap)";
        $resultado = $this->dao->prepare($sql);
        $resultado->bindParam(':titulo', $dados['titulo']);
        $resultado->bindParam(':preco', $dados['preco']);
        $resultado->bindParam(':img', $caminho);
        $resultado->bindParam(':categoria', $dados['categoria']);
        $resultado->bindParam(':descricao', $dados['descricao']);
        $resultado->bindParam(':hora', $dados['hora']);
        $resultado->bindParam(':datap', $dados['datap']);
 
        $retorno = $resultado->execute();

        if(isset($retorno)) {
            session_start();
            $_SESSION['titulo']=$dados['titulo'];
            $_SESSION['preco']=$dados['preco'];
            $_SESSION['pic']=$dados['preco'];
            $_SESSION['categoria']=$dados['categoria'];
            $_SESSION['descricao']=$dados['descricao'];
            $_SESSION['hora']= $dados['hora'];
            $_SESSION['datap']= $dados['datap'];

            return true;

        }else {
            return false;
        }
    }

    public function Inserirfoto($caminho, $id){
        $sql = "insert into imagensProduto values (null, :foto, :id)";
        $resultado = $this->dao->prepare($sql);
        $resultado->bindParam(':foto', $caminho);
        $resultado->bindParam(':id', $id);
        $resultado->execute();
        return true;
 
    }
    
}