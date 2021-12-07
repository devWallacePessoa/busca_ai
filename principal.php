<?php include "Dao.php"; 

$dao = new Dao(); 
session_start();?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "bootstrap.php";?>
    <title>BuscaAi</title>
</head>
<body style= "padding-bottom: 200px; padding-top: 30px;">
<nav class="navbar navbar-expand-lg navbar navbar-dark fixed-top bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="#"><img src="imagens/buscaaiwhite.png" height="22,5" width="117"></a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./principal.php">Principal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="./minhaloja.php">Minha Loja</a>
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

    <main>

<section class="py-5 text-center container">
  <div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
      <h1 class="fw-light">LISTA DE PRODUTOS</h1>
      <p class="lead text-muted">Aqui você encontrará o seu produto desejado mais proximos a você!</p>
      <form class="form-inline my-2 my-lg-0" action="principalPesquisa.php" method="POST">
      <input class="form-control mr-sm-2"  type="search" placeholder="Pesquisar Produto" aria-label="Pesquisar" name="pesquisa">
     <p> <button class="btn btn-sm btn-outline-primary" type="submit">Pesquisar</button> </p>
    </form>
   
</div>

      </p>
    </div>
  </div>
</section>


<div class="album py-5 bg-light">
  <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    <?php
     //session_start();
    // $pesquisa = $_POST['pesquisa'];
        
        $produtos = $dao->retornoprodutos();

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
                <button type="button" class="btn btn-sm btn-outline-primary">Tenho Interesse</button>
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





</main>

<?php include "rodape.php"?>

</body>
</html>
