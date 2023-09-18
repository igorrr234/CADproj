<?php

require_once('classes/metodos.php');
require_once('conexao/conexao.php');

$database = new Database();
$db = $database->Conexao();
$usuario = new Usuario($db);

if(isset($_POST['cadastrar'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confSenha = $_POST['confSenha'];

   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $senha = $_POST["senha"];
    
    $limiteS = 8; 
    
    //caracteres especias, numeros e letras na senha
    $N = preg_match("/[0-9]/", $senha);
    $L= preg_match("/[a-zA-Z]/", $senha);
    $Ce = preg_match("/[!@#\$%^&*()_+{}\[\]:;<>,.?~\\-]/", $senha);
    
    
    if (strlen($senha) >= $limiteS) {
        if($usuario->cadastrar($nome,$email,$senha,$confSenha)){
            print "<script>alert('Cadastro efetuado com sucesso!')</script>";
        }else{
            print "";
        }
    }else {
        print "<script>alert('A senha deve ter no mínimo 8 caracteres')</script>";
        
    }
}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/a.png">
    <title>Aprenda Fácil</title>
</head>
<style>
    body {
    display:flex;
    justify-content: center;
    align-items: center;
    height: 70vh;
    background-color: #ccc;
    
}

.cad{
    background-image: url();
    font-family: 'Nunito Sans', sans-serif;
    text-align: center; 
    width: 505px;
    height: 550px;
    background-color: #DCDCDC;
    border: 2.5px solid #333;
    padding: 15px;
    margin-top:170px;
    border-radius: 70px;
    margin-bottom: 15px;

    
}
button{
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 7px;
    padding: 10px 20px;
    cursor: pointer;
}
a {
    text-decoration: none;
    color: #007bff;
}
input[type="text"],
input[type="email"],
input[type="password"] {
    width: 60%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}




</style>
<body>
    <div class="cad">
        <form action="" method="POST">
            <h1>Criar sua conta</h1>
            <img src="img/a.png" width="100hp" height="100hp" >
           
        <br>
        <br>
        <input type="text" name="nome" placeholder="Nome completo" required>
        <br>
        <br>
        <input type="email" name="email" placeholder="Email" required>
        <br>
        <br>
        <input type="password" name="senha" placeholder="Senha" required>
        <br>
        <br>
        <input type="password" name="confSenha" placeholder="Confirmar senha" required>
        <br>
        <br>
        <button type="submit" name="cadastrar" >Cadastrar</button>
        <br>
        <br>
        Já tem uma conta?
        <a href="login.php">Faça login</a>
    </form>
    </div>
</body>
</html>