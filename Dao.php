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
            if (isset($retorno))
         {
             session_start();
             $_SESSION['nome']= $retorno['nome'];
             $_SESSION['email']= $retorno['email'];
             $_SESSION['id']= $retorno['id'];
         }

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

    public function cadastroLoja($dados, $caminho){

        $sql = "insert into loja values(null, :loja, :img, :descricao, :cpf, :id_usuario)";
        $resultado = $this->dao->prepare($sql);
        $resultado->bindParam(':loja', $dados['nome']);
        $resultado->bindParam(':img', $caminho);
        $resultado->bindParam(':descricao', $dados['descricao']);
        $resultado->bindParam(':cpf', $dados['cnpj']);
        $resultado->bindParam(':id_usuario', $dados['id_usuario_fk']);
        $retorno = $resultado->execute();
        if(isset($retorno)) {
            $sql = "select id from loja where cnpj= :cpf";
            $resultado2 = $this->dao->prepare($sql);
            $resultado2->bindParam(':cpf', $dados['cnpj']);
            $resultado2->execute();
            $retornoid = $resultado2->fetchAll();

            session_start();
            $_SESSION['id_loja']= $retornoid[0]["id"];
            echo $_SESSION['id_loja'];


            return true;

        }else {
            return false;
        }
    }

    public function cadastroEndereco($dados){

        $sql = "insert into endereco values(null, :cep, :rua, :bairro, :uf, :num, :id_loja)";
        $resultado = $this->dao->prepare($sql);
        $resultado->bindParam(':cep', $dados['cep']);
        $resultado->bindParam(':rua', $dados['rua']);
        $resultado->bindParam(':num', $dados['numero']);
        $resultado->bindParam(':bairro', $dados['bairro']);
        $resultado->bindParam(':uf', $dados['uf']);
        $resultado->bindParam(':id_loja', $dados['id_loja_fk']);
        $retorno = $resultado->execute();
        if(isset($retorno)) {
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

    public function retornoprodutosloja($id_user)
    {
        $sql = "select * from produto where id_loja_fk = :id order by id desc";
        $resultado = $this->dao->prepare($sql);
        $resultado->bindParam(':id', $id_user);
        $resultado->execute();
        $retorno = $resultado->fetchAll();

        return $retorno;
    }

    public function retornoloja($id_user)
    {   
        $sql = "select * from loja where id_usuario_fk = :id";
        $resultado = $this->dao->prepare($sql);
        $resultado->bindParam(':id', $id_user);
        $resultado->execute();
        $retorno = $resultado->fetch(PDO::FETCH_ASSOC);
        if (isset($retorno['id']))
         {
             $_SESSION['id_loja_fk']= $retorno['id'];
         }

        return $retorno;
    }
    public function retornoendereco($id)
    {
        $sql = "select * from endereco where id_loja_fk = :id";
        $resultado = $this->dao->prepare($sql);
        $resultado->bindParam(':id', $id);
        $resultado->execute();
        $retorno = $resultado->fetch(PDO::FETCH_ASSOC);

    
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
        $sql = "insert into produto values (null, :titulo, :preco, :img, :categoria, :descricao, :hora, :datap, :id_loja_fk)";
        $resultado = $this->dao->prepare($sql);
        $resultado->bindParam(':titulo', $dados['titulo']);
        $resultado->bindParam(':preco', $dados['preco']);
        $resultado->bindParam(':img', $caminho);
        $resultado->bindParam(':categoria', $dados['categoria']);
        $resultado->bindParam(':descricao', $dados['descricao']);
        $resultado->bindParam(':hora', $dados['hora']);
        $resultado->bindParam(':datap', $dados['datap']);
        $resultado->bindParam(':id_loja_fk', $dados['id_loja_fk']);
 
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