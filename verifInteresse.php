<?php 
  require_once("./Dao.php");
  session_start();
  $dao = new Dao();

  $id_produto = $_POST['id_interesse'];
  $dados = $dao->retornoInteresse($id_produto);

  if(isset($dados['0']))
  {


?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="style.css">
      <?php include "bootstrap.php"; ?>
      <title>Interesses</title>
    </head>

    <body>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Telefone</th>
          <th scope="col">Email</th>
          <th scope="col">Produto</th>
          <th scope="col">Loja</th>
        </tr>
      </thead>
      <tbody>
        <?php  foreach($dados as $linhas) { ?>
        <tr>
          <th scope="row">1</th>
          <td> <?php echo $linhas['nome']; ?> </td>
          <td> <?php echo $linhas['telefone']; ?> </td>
          <td> <?php echo $linhas['email']; ?> </td>
          <td> <?php echo $linhas['titulo']; ?> </td>
          <td> <?php echo $linhas['nomeLoja']; ?> </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>

</body>

<?php } 
else{ ?>



<?php echo "Ops! <br>
            Esse produto ainda não recebeu interesse de nenhum usuário"; } ?>