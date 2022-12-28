<?php include "Dao.php"; 

$dao = new Dao(); 
session_start();


    $id_prod = $_SESSION['id_prod'];
    $imagens = $dao->retornoImagens($id_prod);

    foreach($imagens as $linhas ){
  ?>


 <?php  } ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "bootstrap.php";?>
    <title><?PHP echo $_SESSION['loja_nome'] ?> <?php echo $_SESSION['titulo'];?></title>
    
</head>
<body style= "padding-bottom: 124px;">

<nav class="navbar navbar-expand-lg navbar navbar-dark fixed-top bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="#"><img src="imagens/buscaaiwhite.png" height="22,5" width="117"></a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="./principal.php">Principal</a>
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

  <div class="card text-center">
    <div class="card-header">
      Destaque
    </div>
    <p></p>
    <div class="card-body">
    <h5 class="card-title">Busca Ai</h5>
      <div id="exibicao">
        <h1>Exibição de Produto!</h1>
        <p> <h2> Informações do produto: </h2>
        <div class="col">
          <div class="card shadow-sm">
            <div clas="header-inner">

                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="10000">
                      <img src="<?php echo $_SESSION['img']; ?>" width='500' height="100%"/>
                    </div>

                    <?php foreach($imagens as $linhas ){?>

                      <div class="carousel-item" data-bs-interval="10000">
                        <img src="<?php echo $linhas['path_img']; ?>" width='500' height="100%"/>
                      </div>

                    <?php  } ?>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div>
            </div>
            <p> <h5> Titulo: <?php echo $_SESSION['titulo'];?> </h5> </p> 
            <p> <h5> Categoria: <?php echo $_SESSION['cat'];?> </h5> </p>
            <p> <h5> Preço: <?php echo $_SESSION['preco'];?> </h5> </p>
            <p> <h5> Descrição: <br> <?php echo $_SESSION['descricao_prod'];?> </h5> </p> 
            <hr>
            <p> <h2> Informações da Loja: </h2> </p>
            <div id='header-inner'>
              <h5> <?PHP echo $_SESSION['loja_nome'] ?> </h5>
              <h5> CNPJ/CPF: <?PHP echo $_SESSION['loja_cnpj'] ?> </h5>
              <center>  <aside class="profile"> <img  src="<?php echo $_SESSION['loja_img'] ?>" height="400" width="500"> </aside> </center>
              <p><h5>Endereço:</h5> <h5> <?php echo $_SESSION['end_rua'] ?>, <?php echo $_SESSION['end_numero'] ?>, <?php echo $_SESSION['end_bairro'] ?>, <?php echo $_SESSION['end_uf'] ?> <p>
              <?php echo $_SESSION['end_cep'] ?></p>  </h5>
              <hr>
              <p> <h2> CONTATOS: </h2>
              <P> <H5>Email: <?php echo $_SESSION['contato_email'] ?> </H5>
              <P> <H5>Telefone: <?php echo $_SESSION['contato_telefone'] ?> </H5>
              <P> <H5>Celular Principal: <?php echo $_SESSION['contato_celular'] ?> </H5>
              <P> <H5>Celular 2: <?php echo $_SESSION['contato_celular2'] ?>  </H5>
              <p> <h2> Descrição da loja: </h2>
              <h5> <?php echo $_SESSION['loja_desc'];?></h5>
              <p>
              <div class="flex-box">
                <form class="d-flex" action="processainteresse.php">        
                <center> <button class="btn btn-outline-warning" id="btn" type="submit" ><b>TENHO INTERESSE</b></button> </center>
                </form> 
              </div>
            </div>
          </div>
        </div>
      </div>
      
       
      <p>.</p>
    </div>
  </div>
</div>

<?php include "rodape.php"?>

</body>
</html>