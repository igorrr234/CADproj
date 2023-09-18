<?php
session_start();
require_once('classes/metodos.php');
require_once('conexao/conexao.php');

$database = new Database();
$db = $database->Conexao();
$usuario = new Usuario($db);

if(isset($_POST['logar'])){
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if($usuario->logar($email,$senha)){
        $_SESSION['email']=$email;
        
        header("Location:index.php");
        exit();
    }else{
        print "<script>alert('Seu email e senha não correspondem.Tente novamente.')</script>";
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
    background-color: #DCDCDC;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    padding: 0;
}

.log {
    font-family: 'Nunito Sans', sans-serif;
    text-align: center;
    padding: 20px;
    margin-left: 400px;
    margin-top: 65px;
}

h1 {
    margin-top: 0;
}

input[type="text"],
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 20px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
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
#foto{
    position: absolute;
    top: 0;
    left: 0;
    border-top-right-radius: 90px;
    border-bottom-right-radius: 90px;
}
</style>
<body>
    <div class="log">
    <h1>Bem vindo ao nosso site!</h1>
    <img src="img/a.png" width="100hp" height="100hp">
    <img src="img/a2.jpeg"  width="500hp" height="750hp" id="foto">
    <form action="" method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <br>
        <br>
        <input type="password" name="senha" placeholder="Senha" required>
        <br>
        <br>
        <button type="submit" name="logar">Logar</button>
        <br>
        <br>
        Ainda não tem uma conta?
        <a href="cadastro.php">Cadastre-se</a>
    </form>
    </div>
</body>
</html>