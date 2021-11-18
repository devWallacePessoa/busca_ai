<!--**
 * @author Cesar Szpak - Celke -   cesar@celke.com.br
 * @pagina desenvolvida usando https://viacep.com.br,
 * webservice gratuito, acessado 15/07/2016.
 *-->
<html>
    <head>
    <title>ViaCEP Webservice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php include "bootstrap.php"?>
    </head>

    <body id="bodycad">
  <nav class="navbar fixed-top navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#" id="navlogo"><img src="imagens/buscaaiwhite.png" height="22,5" width="117"></a>
        <a class="navbar-brand" face="Malgun Gothic" href="#">Sobre nós</a>
      </div>
    </nav>

    <body id="bodycad">
  <nav class="navbar fixed-top navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#" id="navlogo"><img src="imagens/buscaaiwhite.png" height="22,5" width="117"></a>
        <a class="navbar-brand" face="Malgun Gothic" href="#">Sobre nós</a>
      </div>
    </nav>
<div id="cadastro">
      <form method="Post" action="processaCadastro.php">   
      <h1><font size="6" face="Malgun Gothic" id="titulocad"><center>Cadastro</center></font></h1><br>
        <font face="Malgun Gothic" size="4">Nome:</font><input type="text" placeholder="" name="nome" id="inputcadnome">
        &emsp;&emsp;<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
        </svg><input type="tel" placeholder="ex. (00)90000-0000" maxlength="11" name="telefone" id="inputcadtel">
        <br>
        <font face="Malgun Gothic" size="4">E-mail:</font> <input type="email" placeholder="ex. abcde@xxxx.com" name="email" id="inputcademail">
        &emsp;&emsp;
        <label><font face="Malgun Gothic" size="4">Data de Nascimento:</font> <input type="date" name="datanasc" id="inputcaddatanasc"></label> 
        <br>
        <label><font face="Malgun Gothic" size="4">CPF:</font> <input type="tel" id="cpf" name = "cpf" value="___.___.___-__" autocomplete="on"></label> 
        <script src="cpf.js"></script>
        
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<font face="Malgun Gothic" size="4">Senha:</font> <input type="password" placeholder="" name="senha" id="inputcadsenha">
        <input type="password" placeholder="Confirmar Senha" name="confsenha" id="inputcadsenha">
        
        <input type= "submit" value = "enviar">
      </form>
    </div>
    </body>
 
    </body>

    </html>
