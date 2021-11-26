<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>

<body>

  <nav class="navbar fixed-top navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#" id="navlogo"><img src="imagens/buscaaiwhite.png" height="22,5" width="117"></a>
      <a class="navbar-brand" face="Malgun Gothic" href="#">Sobre nós</a>
    </div>
  </nav>
  <div id="backimage"></div>
  <div id="login">
    <form action="processa_login.php" method="post">
      <br><br><br><br><br><br><br><br><br>
      <h1>
        <font size="6" face="Malgun Gothic" id="titulolog">Login</font>
      </h1>
      <center>
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
          <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
        </svg> <input type="email" minleght="1" maxleght="50" required="required" placeholder="E-mail" name="email" id="inputlog"><br>

        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
          <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
        </svg> <input type="password" minleght="1" maxleght="20" required="required" placeholder="Senha" name="senha" id="inputlog"><br>

        <input type="submit" value="Entrar" id="buttonlog"><br>
        <div><a href="cadastro.php">
            <font face="Malgun Gothic">Não tem uma conta? <strong>Cadastre-se!</font></strong>
          </a></div>
      </center>
    </form>
  </div>

</body>

</html>