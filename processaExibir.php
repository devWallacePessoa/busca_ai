<?php include "Dao.php"; 

$dao = new Dao(); 
session_start();
?>

<?php
if(isset($_SESSION['id'])){
    
    $id_prod = $_POST['idProduto'];
    $_SESSION['id_prod'] = $id_prod;

    $titulo= $_POST['titulo'];
    $_SESSION['titulo']= $titulo;

    $descricao= $_POST['desc'];
    $_SESSION['descricao_prod']= $titulo;

    $preco = $_POST['preco'];
    $_SESSION['preco'] = $preco;

    $img = $_POST['img'];
    $_SESSION['img'] = $img;
    
    $id_loja = $_POST['id_Loja_Prod'];
    $_SESSION['idLoja']= $id_loja;

    $cat= $_POST['cat'];

    $retorno = $dao->ProcuraCat($cat);
    $_SESSION['cat']= $retorno['categoria'];

    $endereco = $dao->retornoendereco($id_loja);
    $_SESSION['end_rua'] = $endereco['rua'];
    $_SESSION['end_numero'] = $endereco['numero'];
    $_SESSION['end_bairro'] = $endereco['bairro'];
    $_SESSION['end_uf'] = $endereco['uf'];
    $_SESSION['end_cep'] = $endereco['cep'];

    $loja = $dao->Procuraloja($id_loja);
    $_SESSION['loja_img'] = $loja['path_img'];
    $_SESSION['loja_nome'] = $loja['nomeLoja'];
    $_SESSION['loja_desc'] = $loja['descricao'];
    $_SESSION['loja_cnpj'] = $loja['cnpj'];

    $contato = $dao->retornocontato($id_loja);
    $_SESSION['contato_email'] = $contato['email'];
    $_SESSION['contato_telefone'] = $contato['telefone'];
    $_SESSION['contato_celular'] = $contato['celular'];
    $_SESSION['contato_celular2'] = $contato['celular2'];
    
    $id_user = $_SESSION['id'];
    $credenciais['id_produto_interesse_fk'] = $id_prod;
    $credenciais['id_usuario_interesse_fk'] = $id_user;
    $credenciais['id_loja_interesse_fk'] = $id_loja;

    
  // if($dao->CadastroInteresse($credenciais)){
    //    $message = "interesse registrado";
    //    echo "<script type='text/javascript'>alert('$message');</script>";

        header('Location: ./exibirproduto.php');
   //}
    

}   
else {
    $message = "Faça login para exibir um item";
echo "<script type='text/javascript'>alert('$message');</script>";

include "index.php";
}
?>