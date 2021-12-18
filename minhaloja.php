<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    $id_user = $_SESSION['id'];
    $id_loja = $_SESSION['id_loja_fk'];
    $loja = $dao->retornoloja($id_user); 
    $id = $_SESSION['id_loja_fk'];
    $endereco = $dao->retornoendereco($id); 

    if(isset($loja['nome']))
    { ?>
      <main>
         <br>
  
        <br><br><br><center><h4><?php echo $loja['nome'] ?></h4></center>

         <div id='ml'>
            <center><h5>Descrição</h5></center>
            <?php echo $loja['descricao'] ?>
            <br><br><br>
           
          </div>
           <div id='ml1'>
             <center> <aside class="profile"> <img  src="<?php echo $loja['path_img'] ?>" height="234" width="100%"> </aside> </center>
            <p><h5>Endereço:</h5><?php echo $endereco['rua'] ?>, <?php echo $endereco['bairro'] ?>, <?php echo $endereco['uf'] ?> <p>
            <?php echo $endereco['cep'] ?></p> 
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
        { ?>
          <div class="col">
        <div class="card shadow-sm">
          <div clas="header-inner">
            <center> <img src="<?php echo $linha['img_principal'] ?>" width='100%' height="300px"/> </center>
          </div>
          <div class="card-body">
            <p class="card-text" > <b> <?php echo $linha['titulo'] ?> </b> </p>
            <p class="card-text"> R$ <?php echo $linha['preco'] ?></p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-primary">Exibir produto</button>
              </div>
              <small class="text-muted"><?php echo $linha['hora'] ?></small>
              <small class="text-muted"><?php echo $linha['datap'] ?></small>
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