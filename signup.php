<?php
//signup
session_start();
unset($_SESSION['user']);

//verificar se foram inseridos dados de utilizador
if (!isset($_POST['btn_submit'])) {
    ApresentarFormulario();
} else {
    RegistarUtilizador();
}
//funções
function ApresentarFormulario()
{
    //função para apresentar o formulário para adicional um novo user
    echo '<head><link rel="stylesheet" type="text/css" href="css/styles.css"></head>';

    echo '<form class="form_signup" method="POST" action="signup.php?a=signup" enctype="multipart/form-data">
            
    <div class="container">
    <div class="header">
        <h2>Dados de registo</h2>
    </div>
    <div class="main">
        <div class="content">
            <label for="email">E-mail</label>
            <input type="text" size="20" name="text_email" placeholder="Insira o seu E-mail" required>
        </div>
        <div class="content">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="name" autocomplete="off" required>
            </div>

            <div class="content">
                <label for="sobrenome">Sobrenome</label>
                <input type="text" id="sobrenome" name="sobrenome" autocomplete="off" required>
            </div>

        <div class="content">

            <label for="password">Palavra-Passe</label>
            <input type="password" size="20" name="text_password_1"placeholder="Insira a sua Palavra-Passe" required>
        </div>
        <div class="content">
            <label for="password">Reescrever Palavra-Passe</label>
            <input type="password" size="20" name="text_password_2" placeholder="Reescreva a Palavra-Passe" required>
        </div>
        </div>
    <div class="footer">
        <div class="content">
        <input type="submit"value="Registar" name="btn_submit" id="btn-login" >
            <span id="create-account">Já tem uma conta?<a href="login.php" id="link-register">Faça Login</a></span>
        </div>
    </div>
        </from>';
}
function RegistarUtilizador()
{
    //Operações para o registo de um novo utilizador.
    $utilizador = $_POST['text_email'];
    $password_1 = $_POST['text_password_1'];
    $password_2 = $_POST['text_password_2'];
    $nome = $_POST['name'];
    $sobrenome=$_POST['sobrenome'];


    $erro = false;

    //Verificação de erros do utilizador
    if ($utilizador == "" || $password_1 == "" || $password_2 == "") {
        echo '<div class="erro">Não foram preenchidos os campos necessários.</div>';
        $erro = true;
    } else if ($password_1 != $password_2) {
        echo '<div class="erro">As passwords não coincidem.</div>';
        $erro = true;
    }
    if ($erro) {
        ApresentarFormulario();
        exit;
    }
    //Verificar se já existe algum utilizador com o mesmo username.
    include 'config.php';
    $connection = new PDO("mysql:dbname=$data_base;host=$host", $user, $password);
    $engine = $connection->prepare("SELECT email FROM user where email = ?");
    $engine->bindParam(1, $utilizador, PDO::PARAM_STR);
    $engine->execute();

    if ($engine->rowCount() != 0) {
        //ERRO - Utilizador já se encontra registado
        echo '<div class="erro">Já existe um membro com o mesmo username.</div>';
        $connection = null;
        ApresentarFormulario();
        exit;
    }
    //Registo do utilizador.
    else {
        //Encripação de password.
        $passwordEncrip = password_hash($password_1, PASSWORD_DEFAULT);
        $engine = $connection->prepare("INSERT INTO user (name,surname,email,password_user) VALUES (?,?,?,?)");
        //("UPDATE user SET password_user= ? WHERE email = ?");
        //INSERT INTO mytable (col1, col2) VALUES (?,?),(?,?),(?,?)$passwordEncrip

        $engine->bindParam(1, $nome, PDO::PARAM_STR);
        $engine->bindParam(2, $sobrenome, PDO::PARAM_STR);
        $engine->bindParam(3, $utilizador, PDO::PARAM_STR);
        $engine->bindParam(4, $passwordEncrip, PDO::PARAM_STR);

        $engine->execute();
        $connection = null;

        $_SESSION['user'] = $utilizador;
        echo '<p> Registo efectuado com sucesso <br>'  .  'Bem vindo, ' .  $utilizador . '!<br>  <a href="reserva.php">Continuar</a>';
    }
}

?>