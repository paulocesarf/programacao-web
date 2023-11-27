<?php

require 'config.php';

$type = $_GET['type'];

if ($type == 'login')
{

 $email       = $_POST['email'];
 $senha       = $_POST['senha'];

 if (empty($email) || empty($senha)) {
   die(error('Por favor, preencha todas as caixas...'));
 }

 $SQLChecarMail = $odb -> prepare("SELECT COUNT(*) FROM `usuarios` WHERE `email_usr` = :login AND `senha_usr` = :senha");
 $SQLChecarMail -> execute(array(':login' => $email, ':senha' => SHA1(md5($senha))));
 $checkMail = $SQLChecarMail -> fetchColumn(0);
 
 if ($checkMail == 1){
   $SQL = $odb -> prepare("SELECT * FROM `usuarios` WHERE `email_usr` = :login AND `senha_usr` = :senha");
   $SQL -> execute(array(':login' => $email, ':senha' => SHA1(md5($senha))));
   $infoUsuario = $SQL -> fetch();
   
   session_start();
   $_SESSION['id']             = $infoUsuario["ID_usr"];
   $_SESSION['nome']           = $infoUsuario["nome_usr"];
   $_SESSION['usuario']        = $infoUsuario["usuario_usr"];
   $_SESSION['email']          = $infoUsuario["email_usr"];

   echo ('Ola Bem Vindo');
   return;
 }
   echo ('Usuário/Senha Incorreta');

}

if ($type == 'cadastrar')
{
$currentDateTime = new DateTime('now');
$timezone = new DateTimeZone('America/Sao_Paulo');
$currentDateTime->setTimezone($timezone);
$currentDate = $currentDateTime->format('Y-m-d H:i:s');

$nome      = $_POST['nome'];
$usuario      = $_POST['usuario'];
$email        = $_POST['email'];
$senha        = $_POST['senha'];

 if (empty($nome) || empty($usuario) || empty($email) || empty($senha)) {
   die(error('Por favor, preencha todas as caixas...'));
 }

 $SQLChecarUser = $odb -> prepare("SELECT COUNT(*) FROM `usuarios` WHERE `usuario_usr` = :usuario");
 $SQLChecarUser -> execute(array(':usuario' => $usuario));
 $checkUser = $SQLChecarUser -> fetchColumn(0);

 $SQLChecarEmail = $odb -> prepare("SELECT COUNT(*) FROM `usuarios` WHERE `email_usr` = :email");
 $SQLChecarEmail -> execute(array(':email' => $email));
 $checkEmail = $SQLChecarEmail -> fetchColumn(0);

 if ($checkUser == 1)
 {
  die(error('Usuário ja registrado!'));
 }

 if ($checkEmail == 1)
 {
  die(error('E-mail ja registrado!'));
 }

 $SQLRegistro = $odb->prepare("INSERT INTO `usuarios` (`ID_usr`, `nome_usr`, `usuario_usr`, `email_usr`, `senha_usr`) VALUES (NULL, :nome, :usuario, :email, :senha);");
 $SQLRegistro->execute(array(':nome' => $nome, ':usuario' => $usuario, ':email' => $email, ':senha' => SHA1(md5($senha))));


  echo ('Registrado com Sucesso!');
}


if ($type == 'editar')
{
  session_start();
$id           = $_SESSION['id'];
$nome         = $_POST['nome'];
$usuario      = $_POST['usuario'];
$email        = $_POST['email'];
$senha        = $_POST['senha'];

 if (empty($nome) || empty($usuario) || empty($email)) {
   die(error('Por favor, preencha todas as caixas...'));
 }

 if (empty($senha)) {
      $SQLRegistro = $odb->prepare("UPDATE usuarios SET nome_usr = :nome, usuario_usr = :usuario, email_usr = :email WHERE ID_usr = :id;");
      $SQLRegistro->execute(array(':nome' => $nome, ':usuario' => $usuario, ':email' => $email, ':id' => $id));
  } else {
    $SQLRegistro = $odb->prepare("UPDATE usuarios SET nome_usr = :nome, usuario_usr = :usuario, email_usr = :email, senha_usr = :senha WHERE ID_usr = :id;");
    $SQLRegistro->execute(array(':nome' => $nome, ':usuario' => $usuario, ':email' => $email, ':id' => $id, ':senha' => SHA1(md5($senha))));
  }

 
  echo ('Alterado com Sucesso!');
}

if ($type == 'cadastrarprod')
{
$nome      = $_POST['nome'];
$imagem      = $_POST['imagem'];
$descricao        = $_POST['descricao'];
$valor        = $_POST['valor'];

 if (empty($nome) || empty($imagem) || empty($descricao) || empty($valor)) {
   die(error('Por favor, preencha todas as caixas...'));
 }

 $SQLRegistro = $odb->prepare("INSERT INTO `produtos` (`ID_prd`, `nome_prd`, `imagem_prd`, `descricao_prd`, `valor_prd`) VALUES (NULL, :nome, :imagem, :descricao, :valor);");
 $SQLRegistro->execute(array(':nome' => $nome, ':imagem' => $imagem, ':descricao' => $descricao, ':valor' => $valor));


  echo ('Registrado com Sucesso!');
}

if ($type == 'editarprod') {
  $id = $_POST['id']; // Suponha que você tenha um campo 'id' no formulário para identificar o registro a ser atualizado.
  $nome = $_POST['nome'];
  $imagem = $_POST['imagem'];
  $descricao = $_POST['descricao'];
  $valor = $_POST['valor'];

  if (empty($id) || empty($nome) || empty($imagem) || empty($descricao) || empty($valor)) {
      die(error('Por favor, preencha todas as caixas...'));
  }

  $SQLUpdate = $odb->prepare("UPDATE `produtos` SET `nome_prd` = :nome, `imagem_prd` = :imagem, `descricao_prd` = :descricao, `valor_prd` = :valor WHERE `ID_prd` = :id");
  $SQLUpdate->execute(array(':id' => $id, ':nome' => $nome, ':imagem' => $imagem, ':descricao' => $descricao, ':valor' => $valor));

  echo ('Atualizado com Sucesso!');
}


if ($type == 'apagar')
{
$id           = $_POST['id'];

 if (empty($id)) {
   die(error('Ocorreu um erro'));
 } else {
    $SQLDelete = $odb->prepare("DELETE FROM produtos WHERE ID_prd = :id;");
    $SQLDelete->execute(array(':id' => $id));

    echo ('Apagado com Sucesso!');
  }

}





?>