<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <?php include "bootstrap.php";
     session_start();?>
    <title>Minha Loja</title>
</head>

<body style= "padding-bottom: 200px; padding-top: 30px;">
<<nav class="navbar navbar-expand-lg navbar navbar-dark fixed-top bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="#"><img src="imagens/buscaaiwhite.png" height="22,5" width="117"></a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="./principal.php">Principal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./minhaloja.php">Minha Loja</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./faleconosco.php">Fale Conosco</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="./sobrenos.php">Sobre Nós</a>
        </li>
      </ul>
      <?php if(isset($_SESSION['nome'])){
        ?>
      <form class="d-flex" action="destruir.php">
        <font face="Malgun Gothic" size="4" class="nav-link"><?php  echo $_SESSION['nome']; ?></font> <br>
        <button class="btn btn-outline-warning"  type="submit" ><b>SAIR</b></button>
      </form>
      <?php } else { ?>
        <form class="d-flex" action="index.php">
        <button class="btn btn-outline-warning" type="submit"><b>ENTRAR</b></button> <br>
        </form>
        <form class="d-flex" action="cadastro.php">
        <button class="btn btn-outline-warning" type="submit"><b>CADASTRAR</b></button>
      </form>
      <?php } ?>
    </div>
  </div>
  
</nav>
<?php 
    require_once("./Dao.php");
    $dao = new Dao();
    if(isset($_SESSION['id'])){
      $id_user = $_SESSION['id'];
    }
    if(isset($_SESSION['id_loja_fk'])){
      $id_loja = $_SESSION['id_loja_fk'];
      $id = $_SESSION['id_loja_fk'];
      $contato = $dao->retornocontato($id_loja);
    }
    if(isset($id_user)){
      $loja = $dao->retornoloja($id_user); 
    }
    if(isset($id)){
      $endereco = $dao->retornoendereco($id); 
    }

  

    

    if(isset($loja['nomeLoja']))
    { ?>
      <main>
         <br>
  
        <br><br><br><center><h4><?php echo $loja['nomeLoja'] ?></h4></center>

         <div id='ml'>

         <center> <aside class="profile"> <img  src="<?php echo $loja['path_img'] ?>" height="380" width="80%"> </aside> </center>
            <p><h5>Endereço:</h5><?php echo $endereco['rua'] ?>, <?php echo $endereco['bairro'] ?>, <?php echo $endereco['uf'] ?>,
            <?php echo $endereco['cep'] ?></p> 
           <h5>  Contatos: </h5> 
           Telefone: <?php echo $contato['telefone'] ?> 
           <P> Email: <?php echo $contato['email'] ?>                            
           <?php echo $contato['celular'] ?> |
           <?php echo $contato['celular2'] ?>  

            
           
          </div>
           <div id='ml1'>
           <center><h5>Descrição</h5></center>
            <?php echo $loja['descricao'] ?>
            <br><br><br>
          </div>
          
          <br><br><br><br>
        <div class="flex-box">
          <h5> &nbsp &nbsp SEUS PRODUTOS<br> <p>
          <form class="d-flex" action="cadastroproduto.php">
  
            <button class="btn btn-outline-warning" id="btn" type="submit" ><b>CADASTRAR PRODUTO</b></button> 
          </form> 

        </div>
          <div class="album py-5 bg-light">
  <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    <?php       
        $produtos = $dao->retornoprodutosloja($id_loja);

        foreach($produtos as $linha)
        {?>
          <div class="col">
        <div class="card shadow-sm">
          <div clas="header-inner">
            <center> <img src="<?php echo $linha['img_principal'] ?>" width='100%' height="300px"/> </center>
          </div>
          <div class="card-body">
            <p class="card-text" > <b> <?php echo $linha['titulo'] ?> </b> </p>
            <p class="card-text"> R$ <?php echo $linha['preco'] ?></p>
            <div class="d-flex justify-content-between align-items-center">
              <form action="atualizacaoProduto.php" method="post">
                <div class="btn-group">
                <input type="hidden" value="<?php echo $linha['id'] ?>" name="MLidProduto" > 
                <input type="hidden" value="<?php echo $linha['id_loja_fk'] ?>" name="MLid_Loja_Prod" >
                <input type="hidden" value="<?php echo $linha['img_principal'] ?>" name="MLimg" >
                <input type="hidden" value="<?php echo $linha['categoria'] ?>" name="MLcat" > 
                <input type="hidden" value="<?php echo $linha['descricao'] ?>" name="MLdesc" > 
                <input type="hidden" value="<?php echo $linha['preco'] ?>" name="MLpreco" > 
                <input type="hidden" value="<?php echo $linha['titulo'] ?>" name="MLtitulo" > 
                &nbsp &nbsp &nbsp &nbsp<button type="submit" class="btn btn-sm btn-outline-warning">Editar <br> Produto</button> &nbsp 
              </form>
              <form action="deletarProduto.php" method="POST">
              <input type="hidden" value="<?php echo $linha['id'] ?>" name="MLidProduto" > 
              &nbsp <button type="submit" class="btn btn-sm btn-outline-danger">Excluir <br> Produto</button> &nbsp 
              </form> 
              <form action="verifInteresse.php" method="POST">
                <input type="hidden" value="<?php echo $linha['id'] ?>" name="id_interesse"> 
              &nbsp<button type="submit" class="btn btn-sm btn-outline-success"> Ver <br> Interesses </button> &nbsp &nbsp
              </form>
              <form action="processaexibir.php" method="post">
                <div class="btn-group">
                  <input type="hidden" value="<?php echo $linha['id'] ?>" name="idProduto" > 
                  <input type="hidden" value="<?php echo $linha['id_loja_fk'] ?>" name="id_Loja_Prod" >
                  <input type="hidden" value="<?php echo $linha['img_principal'] ?>" name="img" >
                  <input type="hidden" value="<?php echo $linha['categoria'] ?>" name="cat" > 
                  <input type="hidden" value="<?php echo $linha['descricao'] ?>" name="desc" > 
                  <input type="hidden" value="<?php echo $linha['preco'] ?>" name="preco" > 
                  <input type="hidden" value="<?php echo $linha['titulo'] ?>" name="titulo" > 
                  <button type="submit" class="btn btn-sm btn-outline-primary">Exibir <br> Produto </button>
                </div> 
              </form>
              </div>
              
              
            
            </div>
          </div>
        </div>
      </div> 
        <?php } 
        
         ?>
    </div>
  </div>
</div>

          <?php include "rodape.php"?>

      </main>
    <?php
    } 
    else{ ?>
      <main>
<div class="card-body">
     <center> <h5 class="card-title">Você ainda não possui uma loja</h5> </center>
    <div id="cadastro">
     <div class="flex-box">
          <form class="d-flex" action="cadastroloja.php">
             <h5 class="card-title">CADASTRE A SUA LOJA AGORA E VENDA SEUS PRODUTOS <br> <p>
              </p> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<button class="btn btn-outline-warning" id="btn" type="submit" ><b>CADASTRAR LOJA</b></button> 
          </form> 
      
      </div>
    </div>
  
</div>


<?php include "rodape.php"?>


       </main>
    <?php
    } ?>
    
  




</body>
</html>