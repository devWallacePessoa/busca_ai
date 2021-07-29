<?php 

class Dao{

    protected $dsn = "mysql:host=localhost;dbname=buscaai";
    protected $usuario = "root";
    protected $senha = "12info#$";
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

    public function cadastro($post){

        // cadastro.
    }
    
}