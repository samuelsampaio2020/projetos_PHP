<?php

$hostname = "localhost";
$bancodedados = "primeiro_site"; 
$usuario = "root";
$senha = "";

$conecxao = new mysqli($hostname,$usuario,$senha,$bancodedados);

if ($conecxao->connect_error){
    echo " Falha ao se conectar ".$conecxao->connect_errno."".$conecxao->connect_error;
}

$email = isset($_POST["Email"]) ? $_POST["Email"] :"";
$senha = isset($_POST["password"]) ? $_POST["password"] :"";

$sql = "SELECT Email,Senha FROM usuario WHERE Email= '$email' and Senha='$senha'";
$resultado = $conecxao->query($sql);



if ($resultado->num_rows > 0) {
    while($row = $resultado->fetch_assoc()) { #percorre resultado->fetch_assoc() e armazena na var row e utiliza ela como se fosse um Dicionario
      if($row["Email"] == $email && $email != 1 && $senha == $row["Senha"] && $senha != 1){
        header('Location: tela.html',true,301);
        exit();
      }
    }
  } else {
    header('Location:telaErro.php',true,301);
  }

  $conecxao->close();