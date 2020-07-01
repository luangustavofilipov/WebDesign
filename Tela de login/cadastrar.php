?php 
 ?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!--Link customizado-->
      <link rel="stylesheet" type="text/css" href="css/estilo.css">

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
      crossorigin="anonymous"
    />

    <title>Faça seu login</title>
  </head>
  <body>
    <div id="corpo-form-cad">
      <h1>Entrar</h1>
    <form method="POST">
      <div id="form">
        
      <input type="text" name="nome" placeholder="Nome..." maxlength="30">
      <input type="text" name="sobrenome" placeholder="Sobrenome..." maxlength="30">
      <input type="text" name="telefone" placeholder="Digite seu telefone..." maxlength="40">
      <input type="email" name="email" placeholder="Digite seu email..." maxlength="40">
      <input type="password" name="senha" placeholder="Digite uma senha..." maxlength="15">
      <input type="password" name="conf-senha" placeholder="Confirme sua senha...">
      <input type="submit" value="Cadastrar">

    </form>

      </div>
    </div>

    <?php

    require_once 'CLASSES/usuarios.php';
    $u = new Usuario;
    //verificar
    if (isset($_POST['nome']))
{
  $nome = addslashes($_POST['nome']);
  $telefone = addslashes($_POST['telefone']);
  $email = addslashes($_POST['email']);
  $senha = addslashes($_POST['senha']);
  $confirmarSenha = addslashes($_POST['conf-senha']);
  //verificar
  if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
  {
      $u->conectar("plogin", "localhost", "root", "");
      if($u->$msgERRO == "")
      {
        if($senha == $confirmarSenha)
        {
          if($u->cadstrar($nome, $telefone,$email,$senha));
          {
            echo "Cadstrado com sucesso!";
          }else
          {
              echo "Usuario já cadstrado!";
          }
        }else
        {
          echo "Senha e confirmar senha não correspondem!";
        }
        
      }else
      {
        echo "Erro: " .$u->$msgERRO;
      }
  }else
  {
    echo "Preencha todos os campos!";
  }
}


    ?>
  </body>
    <!--Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
      integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
      crossorigin="anonymous"
    ></script>
</html>
