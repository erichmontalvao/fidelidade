<?php
//login_veriricação
session_start();
if (isset($_SESSION['user'])) {
    echo '<p>Já se encontra logado no site.<br><br><a href="reserva.php">PaginaInicial</a></p>';
    exit;
}
//ATENÇÃO: utilizador = EMAIL
$utilizador = "";
$password_utilizador = "";

if (isset($_POST['text_email'])) {
    $utilizador = $_POST['text_email'];
    $password_utilizador = $_POST['text_password'];
}

//verificar se os campos foram preenchidos
if ($utilizador == "" || $password_utilizador == "") {
    echo '<p>Não foram preenchidos os campos necessários.<p><br><br>
                    <a href="login.php">Tente novamente</a>';
    exit;
}


//Verificar os dados de login
include 'config.php';

$passwordEncrip = password_hash($password_utilizador, PASSWORD_DEFAULT);

$connection = new PDO("mysql:dbname=$data_base;host=$host", $user, $password);
$engine = $connection->prepare("SELECT * FROM user WHERE email = ?");
$engine->bindParam(1, $utilizador, PDO::PARAM_STR);
$engine->execute();
$connection = null;
//Verifica se os dados correspondem a valores da base de dados
if ($engine->rowCount() == 0) {
    echo '<p>Dados de login invalidos.<p/><br><br>
            <a href="login.php">Tente novamente</a>';
    exit;
} else {
    //definir os dados da sessão
    $dado_user = $engine->fetch(PDO::FETCH_ASSOC);
    $_SESSION['Id_user'] = $dado_user['Id_user'];
    $_SESSION['user'] = $dado_user['email'];

    $connection = new PDO("mysql:dbname=$data_base;host=$host", $user, $password);
    $engine = $connection->prepare("UPDATE user SET password_user= ? WHERE email = ?");
    $engine->bindParam(1, $passwordEncrip, PDO::PARAM_STR);
    $engine->bindParam(2, $utilizador, PDO::PARAM_STR);
    $engine->execute();
    $connection = null;
   echo 'Bem vindo, ' .  $_SESSION['user'] . '!<br>  <a href="reserva.php">Continuar</a>';
}

?>