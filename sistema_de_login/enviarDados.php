<?php

$hostname = "localhost";
$bancodedados = "primeiro_site"; 
$usuario = "root";
$senha = "";

$conecxao = new mysqli($hostname,$usuario,$senha,$bancodedados);

if ($conecxao->connect_error){
    echo " Falha ao se conectar ".$conecxao->connect_errno."".$conecxao->connect_error;
}

$nome = isset($_POST["nome"]) ? $_POST["nome"] :"";
$email = isset($_POST["Email"]) ? $_POST["Email"] :"";
$senha = isset($_POST["senha"]) ? $_POST["senha"] :"";


$sql = "insert into usuario(nome,Email,Senha) Values('$nome','$email','$senha')";

$resultado = $conecxao->query($sql) or trigger_error($conecxao->error);

if($resultado == true){
    echo ("Dados Enviado Com Sucesso");
    header("refresh:2;TelaLogin.html",true,301);
}else{
    echo "False";
}

$conecxao->close();

