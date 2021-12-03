<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sobre Nos</title>
    <?php include"bootstrap.php"?>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar navbar-dark fixed-top bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="./principal.php"><img src="imagens/buscaaiwhite.png" height="22,5" width="117"></a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="./principal.php">Principal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">Minha Loja</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./faleconosco.php">Fale Conosco</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active"  href="./sobrenos.php">Sobre Nós</a>
        </li>
      </ul>

    </div>
  </div>
</nav>
<br>
<br><br><br><center><h4>Nome da loja</h4></center>

<div id="ml">
  <center><h5>Descrição</h5></center>
  <p>ExemploExemploExemploExemploExemploExemploExemploExemploExemploExemploExemploExemplo<br>ExemploExemploExemplo</p>
  <p>ExemploExemploExemploExemploExemploExemploExemploExemploExemploExemploExemploExemplo<br>ExemploExemploExemplo</p>
</div>
<div id="ml1"><center><img src="imagens/mercado.png" height="117" width="117"></center>
<p><h5>Endereço:</h5>Rua, Cidade, Estado
(00000-000)</p> 
<p><h5>Exemplo:</h5>exemploexemploexemplo</p>
</div>

<?php include "rodape.php"?>

</body>
</html>